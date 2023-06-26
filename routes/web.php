<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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
//products
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');
Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::put('/products/{product}', [ProductController::class,'update'])->name('products.update');
Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');


Route::get('/', function () {
    return view('page');
});


//login 
Route::get('superadmin',function(){
    return view('superadmin');
})->name('superadmin')->middleware('superadmin');

Route::get('admin',function(){
    return view('admin');
})->name('admin')->middleware('multirest');

Route::get('depthead',function(){
    return view('depthead');
})->name('depthead')->middleware('rest');

Route::get('staff',function(){
    return view('staff');
})->name('staff')->middleware('staff');

Route::get('client',function(){
    return view('client');
})->name('client')->middleware('client');





Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



//order
Route::get('/orders', function () {
    return view('orders.orders');
});