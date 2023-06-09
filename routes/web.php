<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AttributeController;



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
// php artisan serve

Route::group(['prefix' => ''], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home.index');
    Route::get('/about-us', [HomeController::class, 'about'])->name('home.about');
    Route::get('/contact-us', [HomeController::class, 'contact'])->name('home.contact');
    Route::get('/category/{cat}', [HomeController::class, 'category'])->name('home.category');
    Route::get('/product', [HomeController::class, 'product'])->name('home.product');
    Route::get('/product-detail/{product}', [HomeController::class, 'productDetail'])->name('home.productDetail');
    Route::get('/logout', [HomeController::class, 'logout'])->name('home.logout');
    Route::get('/login', [HomeController::class, 'login'])->name('home.login');
    Route::get('/register', [HomeController::class, 'register'])->name('home.register');
    Route::get('/logout', [HomeController::class, 'logout'])->name('home.logout');
    Route::get('/profile', [HomeController::class, 'profile'])->name('home.profile')->middleware('cus');
    Route::post('/login', [HomeController::class, 'checkLogin']);
    Route::post('/register', [HomeController::class, 'check_register'])->name('home.register');
    Route::get('/verify-account/{token}', [HomeController::class, 'verifyAccount'])->name('index.verify_account');
    Route::get('/search-products', [HomeController::class, 'search'])->name('home.search');
    Route::get('/checkout', [HomeController::class, 'checkout'])->name('home.checkout');
});

Route::group(['prefix' => 'cart'], function () {
    Route::get('/view', [CartController::class, 'cart'])->name('cart.view');
    Route::get('/add/{product}', [CartController::class, 'add'])->name('cart.add');
    Route::get('/delete/{cartItem}', [CartController::class, 'delete'])->name('cart.delete');
    Route::get('/update/{id}/{quantity?}', [CartController::class, 'update'])->name('cart.update');
    Route::post('/update-all', [CartController::class, 'updateAll'])->name('cart.updateAll');
    Route::get('/clear', [CartController::class, 'clear'])->name('cart.clear');
    Route::post('/update-quantity/{cartItem}', [CartController::class, 'updateQuantity'])->name('cart.update_quantity');
   
});

Route::group(['prefix' => 'admin'], function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');

    Route::resource('category', CategoryController::class);
    Route::resource('product', ProductController::class);
    Route::resource('attribute', SizeController::class);

    Route::group(['prefix' => 'category'], function () {

        Route::get('/', [CategoryController::class, 'index'])->name('category.index');

        Route::get('/create', [CategoryController::class, 'create'])->name('category.create');

        Route::post('/create', [CategoryController::class, 'store']);

        Route::get('/edit/{cat}', [CategoryController::class, 'edit'])->name('category.edit');

        Route::put('/update/{cat}', [CategoryController::class, 'update'])->name('category.update');

        Route::delete('/delete/{cat}', [CategoryController::class, 'delete'])->name('category.delete');
    });

    Route::group(['prefix' => 'attribute'], function () {

        Route::get('/', [AttributeController::class, 'index'])->name('attribute.index');

        Route::get('/create', [AttributeController::class, 'create'])->name('attribute.create');

        Route::post('/create', [AttributeController::class, 'store']);

        Route::get('/edit/{attr}', [AttributeController::class, 'edit'])->name('attribute.edit');

        Route::put('/update/{attr}', [AttributeController::class, 'update'])->name('attribute.update');

        Route::delete('/delete/{attr}', [AttributeController::class, 'delete'])->name('attribute.delete');
    });

    Route::group(['prefix' => 'product'], function () {

        Route::get('/', [ProductController::class, 'index'])->name('product.index');

        Route::get('/create', [ProductController::class, 'create'])->name('product.create');

        Route::post('/create', [ProductController::class, 'store']);

        Route::get('/edit/{product}', [ProductController::class, 'edit'])->name('product.edit');

        Route::put('/update/{product}', [ProductController::class, 'update'])->name('product.update');

        Route::delete('/delete/{product}', [ProductController::class, 'delete'])->name('product.delete');
    });
});
