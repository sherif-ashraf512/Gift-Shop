<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\ProductRequest;
use App\Models\Order;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    // Dashboard index method to count and display users, products, orders, and delivered orders
    public function index(){
        $users = User::where('usertype','user')->get()->count(); // Count users with type 'user'
        $products = Product::all()->count(); // Count all products
        $orders = Order::all()->count(); // Count all orders
        $delivered = Order::where('status','delivered')->get()->count(); // Count delivered orders
        return view('admin.index', compact('users', 'products', 'orders', 'delivered'));
    }

    // Method to view all categories
    public function view_category(){
        $categories = Category::all(); // Get all categories
        return view('admin.category' , compact('categories'));
    }

    // Method to add a new category
    public function add_category(CategoryRequest $request){
        $category = new Category();
        $category->create(['category_name'=>$request->name]); // Create a new category with the provided name
        flash()->options(['timeout' => 5000, 'position' => 'top-center',])->success('Category Added Successfully.');
        return redirect()->back();
    }

    // Method to view the edit form for a specific category
    public function edit_category($categoryId){
        $category = Category::find($categoryId); // Find category by ID
        return view('admin.edit-category', compact('category'));
    }

    // Method to update a specific category
    public function update_category(CategoryRequest $request, $categoryId){
        $category = Category::find($categoryId); // Find category by ID
        $category->update(['category_name'=>$request->name]); // Update the category name
        flash()->options(['timeout' => 5000, 'position' => 'top-center',])->success('Category Updated Successfully.');
        return redirect(route('admin.category'));
    }

    // Method to delete a specific category
    public function destroy_category($categoryId){
        $category = Category::find($categoryId); // Find category by ID
        $category->delete(); // Delete the category
        flash()->options(['timeout' => 5000, 'position' => 'top-center',])->success('Category Deleted Successfully.');
        return redirect()->back();
    }

    // Method to view the product creation form
    public function product(){
        $categories = Category::all(); // Get all categories for the product form
        return view('admin.product' , compact('categories'));
    }

    // Method to view all products with pagination
    public function view_products(){
        $products = Product::paginate(3); // Paginate products by 3 per page
        return view('admin.view-products' , compact('products'));
    }

    // Method to add a new product
    public function add_product(ProductRequest $request){
        // Handle image upload if present
        if($request->file('image')){
            $request->file('image')->getSize() > 0 ? $path = Storage::disk('public')->put('products',$request->file('image')) : $path = null;
        }else{
            $path = null;
        }
        // Create a new product with the provided details
        Product::create([
            'title'=>$request->title,
            'description'=>$request->description,
            'quantity'=>$request->quantity,
            'price'=>$request->price,
            'category'=>$request->category,
            'image'=>$path,
        ]);
        flash()->options(['timeout' => 5000, 'position' => 'top-center',])->success('Product Added Successfully.');
        return redirect()->back();
    }

    // Method to view the edit form for a specific product
    public function edit_product($slug){
        $product = Product::where('slug',$slug)->first(); // Find product by slug
        $categories = Category::all(); // Get all categories for the product form
        return view('admin.edit-product', compact('product','categories'));
    }

    // Method to update a specific product
    public function update_product(ProductRequest $request, $slug){
        $product = Product::where('slug',$slug)->first(); // Find product by slug
        // Update the product with the new details
        $product->update([
            'title'=>$request->title,
            'description'=>$request->description,
            'quantity'=>$request->quantity,
            'category'=>$request->category,
            'price'=>$request->price,
        ]);

        // Handle image upload if present
        if($request->file('image')){
            $image = Storage::disk('public')->put('products',$request->file('image'));
            Storage::disk('public')->delete($product->image);
            $product->update(['image'=>$image]);
        }
        flash()->options(['timeout'=>5000 , 'position'=>'top-center'])->success('Product Updated Successfully');
        return redirect(route('admin.products'));
    }

    // Method to delete a specific product
    public function destroy_product($id){
        $product = Product::find($id); // Find product by ID
        $image = $product->image; // Get the image path
        $product->delete(); // Delete the product
        if($image){
            Storage::disk('public')->delete($image); // Delete the image file from storage
        }
        flash()->options(['timeout'=>5000 , 'position'=>'top-center'])->success('Product Deleted Successfully');
        return redirect()->back();
    }

    // Method to search for products based on title or category
    public function search_product(Request $request){
        $search = $request->input('search'); // Get search input
        empty($search)? $products = Product::paginate(3) : $products = Product::whereAny(['title','category'],'LIKE',"%$search%")->paginate(3);
        return view('admin.view-products', compact('products'));
    }

    // Method to view all orders with pagination, ordered by creation date
    public function view_orders(){
        $orders = Order::orderBy('created_at', 'desc')->paginate(10); // Paginate orders by 10 per page, ordered by creation date
        return view('admin.orders' , compact('orders'));
    }

    // Method to update order status to 'on the way'
    public function on_the_way($id){
        $order = Order::findOrFail($id); // Find order by ID
        $order->status = 'on the way'; // Update status to 'on the way'
        $order->save(); // Save changes
        return redirect()->back();
    }

    // Method to update order status to 'delivered'
    public function delivered($id){
        $order = Order::findOrFail($id); // Find order by ID
        $order->status = 'delivered'; // Update status to 'delivered'
        $order->save(); // Save changes
        return redirect()->back();
    }

    // Method to generate a PDF invoice for an order and download it
    public function print_order($id){
        $order = Order::findOrFail($id); // Find order by ID
        $pdf = Pdf::loadView('admin.invoice', compact('order')); // Load view into PDF
        return $pdf->download("$order->rec_name-order.pdf"); // Download the generated PDF with the order recipient's name
    }

    // Method to view users and set them as admins
    public function set_admin(){
        $users = User::where('ability',0)->paginate(10); // Paginate users with ability set to 0 (non-admins)
        return view('admin.set-admin' , compact('users'));
    }

    // Method to change a user to an admin
    public function change_to_admin($member){
        $member = User::findOrFail($member); // Find user by ID
        $member->usertype = 'admin'; // Change usertype to 'admin'
        $member->save(); // Save changes
        return redirect()->back();
    }

    // Method to change an admin to a regular user
    public function change_to_user($member){
        $member = User::findOrFail($member); // Find user by ID
        $member->usertype = 'user'; // Change usertype to 'user'
        $member->save(); // Save changes
        return redirect()->back();
    }
}
