<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminLinkController;
use App\Http\Controllers\AdminNoteController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\AdminRoleController;
use App\Http\Controllers\AdminSizeController;
use App\Http\Controllers\AdminTypeController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\ErrorController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;




Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/products', [ProductController::class, 'index'])->name('productsHome');
Route::post('/getPrice', [ProductController::class, 'getPrice']);

Route::middleware('isGuest')->group(function()
{
    Route::post('/login', [FrontendController::class, 'login'])->name('login');
    Route::post('/register', [FrontendController::class, 'register'])->name('register');
});
Route::get('/proba', [FrontendController::class, 'proba'])->name('proba');
Route::middleware('isLoggedIn')->group(function()
{
    Route::get('/logout', [FrontendController::class, 'logout'])->name('logout');
    Route::get('/cart', [BasketController::class, 'index'])->name('cart.index');
    Route::post('/cart', [BasketController::class, 'add'])->name('cart.add');
    Route::delete('/cart', [BasketController::class, 'remove'])->name('cart.delete');
    Route::post('/purchase', [BasketController::class, 'purchase'])->name('cart.purchase');
});
Route::middleware('isAdmin')->group(function()
{
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
    Route::get('/admin/products/restore', [AdminProductController::class, 'showDeleted'])->name('products.showDeleted');
    Route::get('/admin/users/restore', [AdminUserController::class, 'showDeleted'])->name('users.showDeleted');
    Route::get('/admin/notes/restore', [AdminNoteController::class, 'showDeleted'])->name('notes.showDeleted');
    Route::get('/admin/sizes/restore', [AdminSizeController::class, 'showDeleted'])->name('sizes.showDeleted');
    Route::get('/admin/types/restore', [AdminTypeController::class, 'showDeleted'])->name('types.showDeleted');
    Route::get('/admin/links/restore', [AdminLinkController::class, 'showDeleted'])->name('links.showDeleted');
    Route::get('/admin/roles/restore', [AdminRoleController::class, 'showDeleted'])->name('roles.showDeleted');
    Route::get('/admin/products/addProductSize', [AdminProductController::class, 'addSizeView'])->name('products.addProductSizeView');
    Route::get('/admin/products/deleteProductSize', [AdminProductController::class, 'deleteProductSizeView'])->name('products.deleteProductSizeView');


    Route::post('/admin/products/addProductSize', [AdminProductController::class, 'addSize'])->name('products.addProductSize');
    Route::post('/admin/products/deleteProductSize', [AdminProductController::class, 'deleteProductSize'])->name('products.deleteProductSize');

    Route::post('/admin/products/restore/{id}', [AdminProductController::class, 'restoreDeleted'])->name('products.restoreDeleted');
    Route::post('/admin/users/restore/{id}', [AdminUserController::class, 'restoreDeleted'])->name('users.restoreDeleted');
    Route::post('/admin/notes/restore/{id}', [AdminNoteController::class, 'restoreDeleted'])->name('notes.restoreDeleted');
    Route::post('/admin/sizes/restore/{id}', [AdminSizeController::class, 'restoreDeleted'])->name('sizes.restoreDeleted');
    Route::post('/admin/types/restore/{id}', [AdminTypeController::class, 'restoreDeleted'])->name('types.restoreDeleted');
    Route::post('/admin/links/restore/{id}', [AdminLinkController::class, 'restoreDeleted'])->name('links.restoreDeleted');
    Route::post('/admin/roles/restore/{id}', [AdminRoleController::class, 'restoreDeleted'])->name('roles.restoreDeleted');

    Route::resource('/admin/users', AdminUserController::class);
    Route::resource('/admin/products', AdminProductController::class);
    Route::resource('/admin/notes', AdminNoteController::class);
    Route::resource('/admin/sizes', AdminSizeController::class);
    Route::resource('/admin/types', AdminTypeController::class);
    Route::resource('/admin/links', AdminLinkController::class);
    Route::resource('/admin/roles', AdminRoleController::class);
    Route::get('/error', [ErrorController::class, 'index'])->name('error');

    //Slanje e-maila.
    Route::get('/email', function()
    {
        \Illuminate\Support\Facades\Mail::to('email@email.com')->send(new \App\Mail\Purchase_Mail());
        return new \App\Mail\Purchase_Mail();
    });
});



