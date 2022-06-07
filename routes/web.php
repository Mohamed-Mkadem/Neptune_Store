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
Route::get('/', function () {
    return view('admin.overview');
})->name('dashboard');




// Categories
Route::get('categories', [CategoryController::class, 'index'])->name('categories');
Route::get('category/{id}', [CategoryController::class, 'show'])->name('showCategory');
Route::post('categories/add', [CategoryController::class, 'store'])->name('addCategory');
Route::post('category/edit/{id}', [CategoryController::class, 'update'])->name('editCategory');
Route::delete('categories/delete/{id}', [CategoryController::class, 'destroy'])
    ->name('deleteCategory');


// Sub Categories
Route::post('subcategory/add', [SubCategoryController::class, 'store'])->name('addSubCategory');
Route::post('subcategory/edit/{id}', [SubCategoryController::class, 'update'])->name('editSubCategory');
Route::delete('subcategory/delete/{id}', [SubCategoryController::class, 'destroy'])->name('deleteSubCategory');
Route::get('subcategory/show/{id}', [SubCategoryController::class, 'show'])->name('showSubCategory');
// Products
Route::get('products', [ProductController::class, 'index'])->name('products');
Route::get('product/add', [ProductController::class, 'create'])->name('addProduct');
Route::post('product/store', [ProductController::class, 'store'])->name('storeProduct');