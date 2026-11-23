<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Http\Requests\OrderRequest;
use App\Notifications\PlaceOrder;
use Illuminate\Support\Facades\Auth;
use App\Mail\ContactUs;
use App\Models\User;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use Stripe;

class HomeController extends Controller
{
    // Private method to get the count of items in the user's cart
    private function get_count(){
        // If the user is authenticated, get the cart count; otherwise, return an empty string
        Auth::user()? $count = Cart::where('user_id', Auth::user()->id)->count() : $count='';
        return $count;
    }

    // Private method to compute the cart total on the server from current product prices,
    // summed in integer cents to avoid float-sum rounding issues.
    // The charged amount must never come from the URL or any other client input.
    private function cartTotalInCents(): int{
        return (int) Cart::with('product')
            ->where('user_id', Auth::user()->id)
            ->get()
            ->sum(fn ($cart) => (int) round(((float) $cart->product->price) * 100));
    }


    // Method to display the home page with products and categories
    public function home(){
        $products = Product::orderBy('created_at', 'desc')->paginate(6);
        $categories = Category::all();
        $count = $this->get_count();
        return view('home.index', compact('products', 'count', 'categories'));
    }

    // Method to display the shop page with all products and categories
    public function shop(){
        $products = Product::all();
        $categories = Category::all();
        $count = $this->get_count();
        return view('home.shop', compact('products', 'count', 'categories'));
    }

    // Method to display the 'Why Us' page
    public function why(){
        $count = $this->get_count();
        return view('home.why', compact('count'));
    }

    // Method to display the contact page
    public function contact(){
        $count = $this->get_count();
        return view('home.contact', compact('count'));
    }

    // Method to handle sending a contact form
    public function send(ContactRequest $request){
        $data = $request;
        Mail::to(config('mail.mailers.smtp.username'))->send(new ContactUs($data));
        flash()->options(['timeout' => 5000, 'position' => 'top-center',])->success('Message sent Successfully.');
        return back();
    }

    // Method to display the details of a specific product
    public function product_details($slug){
        $product = Product::where('slug', $slug)->first();
        $count = $this->get_count();
        return view('home.product-details', compact('product', 'count'));
    }

    // Method to handle search functionality on the home page
    public function search(Request $request){
        $search = $request->input('search');
        empty($search)? $products = Product::orderBy('created_at', 'desc')->paginate(6) : $products = Product::whereAny(['title','category'], 'LIKE', "%$search%")->get();
        $categories = Category::all();
        $count = $this->get_count();
        return view('home.index', compact('products', 'count', 'categories'));
    }

    // Method to filter products by category on the home page
    public function filter($category){
        $products = Product::where('category', $category)->get();
        $categories = Category::all();
        $count = $this->get_count();
        return view('home.index', compact('products', 'count', 'categories'));
    }

    // Method to handle search functionality on the shop page
    public function shop_search(Request $request){
        $search = $request->input('search');
        empty($search)? $products = Product::all() : $products = Product::whereAny(['title','category'], 'LIKE', "%$search%")->get();
        $categories = Category::all();
        $count = $this->get_count();
        return view('home.shop', compact('products', 'count', 'categories'));
    }

    // Method to filter products by category on the shop page
    public function shop_filter($category){
        $products = Product::where('category', $category)->get();
        $categories = Category::all();
        $count = $this->get_count();
        return view('home.shop', compact('products', 'count', 'categories'));
    }

    // Method to add a product to the cart
    public function add_cart($id){
        $product_id = $id;
        $user_id = Auth::user()->id;
        Cart::create(['user_id' => $user_id, 'product_id' => $product_id]);
        flash()->options(['timeout' => 5000, 'position' => 'top-center',])->success('Added To Cart Successfully.');
        return redirect(route('dashboard'));
    }

 // Method to display the user's cart
    public function my_cart(){
        $carts = Cart::where('user_id', Auth::user()->id)->get();
        $count = $this->get_count();
        $total = $this->cartTotalInCents() / 100;  // Total computed server-side from the user's cart
        return view('home.myCart', compact('carts', 'count', 'total'));
    }

 // Method to delete a product from the cart
    public function delete_cart($id){
        // Scoped to the authenticated user so one user cannot delete another user's cart row
        $cart = Cart::where('user_id', Auth::user()->id)->findOrFail($id);
        $cart->delete();
        return redirect()->back();
    }

    // Method to place an order
    public function place_order(OrderRequest $request){
        $carts = Cart::where('user_id', Auth::user()->id)->get();
        foreach($carts as $cart){
            Order::create([
                'user_id' => Auth::user()->id,
                'product_id' => $cart->product_id,
                'rec_name' => $request->name,
                'rec_address' => $request->address,
                'rec_phone' => $request->phone,
            ]);
        }
        $user = Auth::user();
        Notification::send($user, new PlaceOrder());
        $admins = User::where('usertype', 'admin')->get();
        Notification::send($admins, new PlaceOrder());
        Cart::where('user_id', Auth::user()->id)->delete();
        flash()->options(['timeout' => 5000, 'position' => 'top-center',])->success('Placed Order Successfully.');
        return redirect()->route('dashboard');
    }

    // Method to display the user's orders
    public function my_order(){
        $orders = Order::orderBy('created_at', 'desc')->where('user_id', Auth::user()->id)->paginate(10);
        $count = $this->get_count();
        return view('home.myOrder', compact('orders', 'count'));
    }

 // Method to display the Stripe payment page
    public function stripe(){
        $totalCents = $this->cartTotalInCents();
        if ($totalCents <= 0) {
            flash()->options(['timeout' => 5000, 'position' => 'top-center',])->error('Your cart is empty.');
            return redirect()->route('myCart');
        }
        $total = $totalCents / 100;
        return view('home.stripe', compact('total'));
    }

 // Method to handle Stripe payment processing
    public function stripePost(Request $request){
        $request->validate([
            'stripeToken' => ['required', 'string'],
        ]);

        // Recalculate the total on the server right before charging
        $totalCents = $this->cartTotalInCents();
        if ($totalCents <= 0) {
            flash()->options(['timeout' => 5000, 'position' => 'top-center',])->error('Your cart is empty.');
            return redirect()->route('myCart');
        }

        Stripe\Stripe::setApiKey(config('services.stripe.secret'));

        try {
            // Create a charge using Stripe API with the server-side total
            Stripe\Charge::create ([
                "amount" => $totalCents,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Gift Shop order payment."
            ]);
        } catch (Stripe\Exception\CardException $e) {
            flash()->options(['timeout' => 5000, 'position' => 'top-center',])->error($e->getMessage());
            return redirect()->route('stripe');
        }

        // After successful payment, create orders for the user
        $carts = Cart::where('user_id', Auth::user()->id)->get();
        foreach($carts as $cart){
            Order::create([
                'user_id' => Auth::user()->id,
                'product_id' => $cart->product_id,
                'rec_name' => Auth::user()->name,
                'rec_address' => Auth::user()->address,
                'rec_phone' => Auth::user()->phone,
                'payment_status' => 'paid',
            ]);
        }
        // Clear the user's cart after placing the order
        Cart::where('user_id', Auth::user()->id)->delete();

        $user = Auth::user();
        Notification::send($user, new PlaceOrder());//send email for user
        $admins = User::where('usertype', 'admin')->get();
        Notification::send($admins, new PlaceOrder());//send email for admins

        flash()->options(['timeout' => 5000, 'position' => 'top-center',])->success('Payment successful!');
        return redirect(route('myOrder'));
    }
}
