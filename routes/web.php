<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SubCategoryController;
use Illuminate\Support\Facades\Route;

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





// Dashboard Page
Route::get('/dashboard', function () {
    return view('admin.overview');
})->name('dashboard');
// Login Page
Route::get('/admin', function () {
    return view('admin.login');
})->name('adminLogin');
// Categories 
Route::get('categories', [CategoryController::class, 'index'])->name('categories');
Route::get('category/{id}', [CategoryController::class, 'show'])->name('showCategory');
Route::post('categories/add', [CategoryController::class, 'store'])->name('addCategory');
Route::post('category/edit/{id}', [CategoryController::class, 'update'])->name('editCategory');
Route::delete('categories/delete/{id}', [CategoryController::class, 'destroy'])->name('deleteCategory');
// Sub Categories
Route::post('subcategory/add', [SubCategoryController::class, 'store'])->name('addSubCategory');
Route::post('subcategory/edit/{id}', [SubCategoryController::class, 'update'])->name('editSubCategory');
Route::delete('subcategory/delete/{id}', [SubCategoryController::class, 'destroy'])->name('deleteSubCategory');
Route::get('subcategory/show/{id}', [SubCategoryController::class, 'show'])->name('showSubCategory');
// Products
Route::get('products', [ProductController::class, 'index'])->name('products');
Route::get('product/add', [ProductController::class, 'create'])->name('addProduct');
Route::get('product/{id}', [ProductController::class, 'show'])->name('showProduct');
Route::post('product/store', [ProductController::class, 'store'])->name('storeProduct');
Route::delete('product/{id}', [ProductController::class, 'destroy'])->name('deleteProduct');
Route::get('product/edit/{id}', [ProductController::class, 'edit'])->name('editProduct');
Route::post('product/update/{id}', [ProductController::class, 'update'])->name('updateProduct');
// Orders

Route::get('/orders', function () {
    return view('admin.orders.orders');
})->name('orders');


// Customer Pages

Route::get('/', function () {
    return view('customer.home');
})->name('home');

Route::get('/collection', [ProductController::class, 'collection'])->name('collection');