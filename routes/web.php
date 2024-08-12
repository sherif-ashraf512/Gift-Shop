<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AvatarController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Routes For Authentication
require __DIR__.'/auth.php'; // Include the authentication routes

// Routes For Guest (unauthenticated users)
Route::controller(HomeController::class)->group(function(){
    Route::get('/','home')->name('home'); // Home page
    Route::get('/product_details/{slug}','product_details')->name('product.details'); // Product details page
    Route::get('/shop','shop')->name('shop'); // Shop page
    Route::get('/search','search')->name('search'); // Search functionality on the home page
    Route::get('/filter/{filter}','filter')->name('filter'); // Filter products by category on the home page
    Route::get('/shop/search','shop_search')->name('shop.search'); // Search functionality on the shop page
    Route::get('/shop/filter/{filter}','shop_filter')->name('shop.filter'); // Filter products by category on the shop page
    Route::get('/why_us','why')->name('why'); // "Why Us" page
    Route::get('/contact','contact')->name('contact'); // Contact page
    Route::post('/contact','send')->name('send'); // Handle contact form submissions
});

// Route For Profile Info (authenticated users)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit'); // Edit profile page
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update'); // Update profile information
    Route::patch('/profile/avatar', [AvatarController::class , 'update'])->name('profile.avatar'); // Update profile avatar
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy'); // Delete user profile
    Route::get('/back', [ProfileController::class, 'back'])->name('back'); // Redirect user based on user type (admin or user)
});

// Routes For User (authenticated and verified users)
Route::middleware(['auth','verified'])->group(function () {
    Route::get('/dashboard',[HomeController::class,'home'])->name('dashboard'); // Dashboard page for users
    Route::get('/cart/{id}',[HomeController::class,'add_cart'])->name('cart.add'); // Add item to cart
    Route::get('/myCart',[HomeController::class,'my_cart'])->name('myCart'); // View user's cart
    Route::get('/myCart/{cart}',[HomeController::class,'delete_cart'])->name('cart.delete'); // Delete item from cart
    Route::post('/order',[HomeController::class,'place_order'])->name('order.place'); // Place an order
    Route::get('/myOrder',[HomeController::class,'my_order'])->name('myOrder'); // View user's orders
    Route::get('/stripe/{value}',[HomeController::class,'stripe'])->name('stripe'); // Stripe payment page
    Route::post('/stripe/{value}',[HomeController::class,'stripePost'])->name('stripe.post'); // Handle Stripe payment
});

// Routes For Admin (authenticated and admin users)
Route::middleware(['auth' ,'admin'])->group(function () {
    Route::get('/admin/dashboard',[AdminController::class,'index'])->name('admin.home'); // Admin dashboard
    Route::get('/category',[AdminController::class , 'view_category'])->name('admin.category'); // View categories
    Route::post('/category',[AdminController::class , 'add_category'])->name('category.add'); // Add a new category
    Route::get('/category/edit/{category}',[AdminController::class , 'edit_category'])->name('category.edit'); // Edit a category
    Route::post('/category/{category}',[AdminController::class , 'update_category'])->name('category.update'); // Update a category
    Route::get('/category/delete/{category}',[AdminController::class , 'destroy_category'])->name('category.delete'); // Delete a category
    Route::get('/product',[AdminController::class , 'product'])->name('admin.product'); // View product page
    Route::get('/products',[AdminController::class , 'view_products'])->name('admin.products'); // View all products
    Route::post('/product',[AdminController::class , 'add_product'])->name('product.add'); // Add a new product
    Route::get('/product/delete/{product}',[AdminController::class , 'destroy_product'])->name('product.delete'); // Delete a product
    Route::get('/product/edit/{product}',[AdminController::class , 'edit_product'])->name('product.edit'); // Edit a product
    Route::post('/product/{product}',[AdminController::class , 'update_product'])->name('product.update'); // Update a product
    Route::get('/product/search',[AdminController::class , 'search_product'])->name('product.search'); // Search for a product
    Route::get('/orders',[AdminController::class , 'view_orders'])->name('admin.order'); // View all orders
    Route::get('/orders/on_the_way/{order}',[AdminController::class , 'on_the_way'])->name('on_way'); // Update order status to "on the way"
    Route::get('/orders/delivered/{order}',[AdminController::class , 'delivered'])->name('delivered'); // Update order status to "delivered"
    Route::get('/orders/print/{order}',[AdminController::class , 'print_order'])->name('order.print'); // Print an order
    Route::get('/set_admin',[AdminController::class , 'set_admin'])->name('admin.set'); // View all users who can be set as admins
    Route::get('/user/search',[AdminController::class , 'search_user'])->name('user.search'); // Search for a user
    Route::get('/set/admin/{member}',[AdminController::class , 'change_to_admin'])->name('set.admin'); // Set a user as an admin
    Route::get('/set/user/{member}',[AdminController::class , 'change_to_user'])->name('set.user'); // Set a user back to regular user status
});
