<?php

use App\Http\Controllers\CategoryController;
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

Route::get('/', function () {
    return view('admin.overview');
})->name('dashboard');
Route::get('/orders', function () {
    return view('admin.orders');
})->name('orders');

// Route::get('/categories', function(){
//     return view('admin.categories');
// })->name('categories');
Route::get('/products', function () {
    return view('admin.products');
})->name('products');

Route::get('categories', [CategoryController::class, 'index'])->name('categories');
Route::get('category/{id}', [CategoryController::class, 'show'])->name('showCategory');
Route::post('categories/add', [CategoryController::class, 'store'])->name('addCategory');
Route::post('category/edit/{id}', [CategoryController::class, 'update'])->name('editCategory');
Route::delete('categories/delete/{id}', [CategoryController::class, 'destroy'])
    ->name('deleteCategory');





require __DIR__ . '/auth.php';
