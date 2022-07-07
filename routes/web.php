<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboradController;
use App\Http\Controllers\ComingSoonController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\WishListController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

require __DIR__ . '/auth.php';





// Admin Login Page
Route::get('/admin/login/neptune', function () {
    return view('admin.login');
})
->middleware('guest')
->name('adminLogin');
// Dashboard Pages
Route::prefix('dashboard')->middleware(['auth', 'role'])->group(function () {
    Route::get('/overview', [DashboradController::class, 'index'])->name('dashboard');

    // Categories 
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
    Route::get('categories/show/{id}', [CategoryController::class, 'show'])->name('showCategory');
    Route::post('/store', [CategoryController::class, 'store'])->name('addCategory');
    Route::post('/edit/{id}', [CategoryController::class, 'update'])->name('editCategory');
    Route::delete('/delete/{id}', [CategoryController::class, 'destroy'])->name('deleteCategory');

    // Sub Categories
    Route::post('subcategory/add', [SubCategoryController::class, 'store'])->name('addSubCategory');
    Route::post('subcategory/edit/{id}', [SubCategoryController::class, 'update'])->name('editSubCategory');
    Route::delete('subcategory/delete/{id}', [SubCategoryController::class, 'destroy'])->name('deleteSubCategory');
    Route::get('subcategory/show/{id}', [SubCategoryController::class, 'show'])->name('showSubCategory');
    // Products
    Route::get('products', [ProductController::class, 'index'])->name('products');
    Route::get('product/add', [ProductController::class, 'create'])->name('addProduct');
    Route::get('/product/{slug}', [ProductController::class, 'show'])->name('showAdminProduct');
    Route::post('product/store', [ProductController::class, 'store'])->name('storeProduct');
    Route::delete('/product/{id}', [ProductController::class, 'destroy'])->name('deleteProduct');
    Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('editProduct');
    Route::post('/product/update/{id}', [ProductController::class, 'update'])->name('updateProduct');
    // Orders
    Route::get('/orders', [OrderController::class, 'adminIndex'])->name('orders');
    Route::get('/order/{id}', [OrderController::class, 'adminShow'])->name('show');
    Route::post('/order/update', [OrderController::class, 'update'])->name('updateOrder');
});
// Customer Pages
Route::get('/', [CategoryController::class, 'home'])->name('home');
Route::middleware('auth')->group(function () {
    Route::get('cart', [CartController::class, 'index'])->name('cart');
    Route::post('cartadd/', [CartController::class, 'store'])->name('addToCart');
    Route::post('cartupdate/', [CartController::class, 'update'])->name('updateCartItem');
    Route::get('cartremove/{id}', [CartController::class, 'destroy'])->name('removeItem');
    // Order Logic
    Route::get('/orders', [OrderController::class, 'customerIndex'])->name('customerOrders');
    Route::get('checkout', [OrderController::class, 'create'])->name('checkout');
    Route::post('order/new', [OrderController::class, 'store'])->name('newOrder');
    Route::get('/order/{id}', [OrderController::class, 'customerShow'])->name('showOrder');
    // WishList Logic
    Route::get('wishlist', [WishListController::class, 'index'])->name('wishlist');
    Route::post('whishlist/store', [WishListController::class, 'store'])->name('addWishlist');
    Route::post('whishlist/remove/', [WishListController::class, 'destroy'])->name('removeWishlist');
});
// Products Logic
Route::get('collection', [ProductController::class, 'collection'])->name('collection');
Route::get('collection/category/{slug}', [ProductController::class, 'showCategoryProducts'])->name('showCategoryProducts');
Route::get('product/{slug}', [ProductController::class, 'showProduct'])->name('showProduct');
Route::get('filter/{id}', [ProductController::class, 'filter']);
Route::get('product/', [ProductController::class, 'formSearch'])->name('formSearch');
Route::get('filter-products', [ProductController::class, 'filter'])->name('filterProducts');

// Coming Soon Pages

Route::get('about', [ComingSoonController::class, 'about'])->name('about');
Route::get('settings', [ComingSoonController::class, 'settings'])->name('settings');
Route::get('statistics', [ComingSoonController::class, 'statistics'])->name('statistics');
Route::get('customers', [ComingSoonController::class, 'customers'])->name('customers');
Route::get('tasks', [ComingSoonController::class, 'tasks'])->name('tasks');
Route::get('tickets', [ComingSoonController::class, 'tickets'])->name('tickets');
Route::get('faqs', [ComingSoonController::class, 'faqs'])->name('faqs');
