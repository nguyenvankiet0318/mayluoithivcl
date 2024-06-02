<?php

use Illuminate\Support\Facades\Route;
// Site
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\frontend\ProductController as SanPhamController;
use App\Http\Controllers\frontend\ContactController as LienHeController;
// Admin
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\backend\ProductController;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\PostController;
use App\Http\Controllers\backend\BrandController;
use App\Http\Controllers\backend\BannerController;
use App\Http\Controllers\backend\ContactController;





Route::get('/', [HomeController::class, 'index'])->name('site.home');
Route::get('san-pham', [SanPhamController::class, 'index'])->name('site.product');
Route::get('chi-tiet-san-pham/{slug}', [SanPhamController::class, 'detail'])->name('site.product.detail');
Route::get('lien-he', [LienHeController::class, 'index'])->name('site.contact');

// Admin
Route::prefix("admin")->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard.index');

    //Product
    Route::prefix("product")->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('admin.product.index');
        Route::get('trash', [ProductController::class, 'trash'])->name('admin.product.trash');
        Route::get('show/{id}', [ProductController::class, 'show'])->name('admin.product.show');
        Route::get('create', [ProductController::class, 'create'])->name('admin.product.store');
        Route::post('store', [ProductController::class, 'store'])->name('admin.product.store');
        Route::get('edit/{id}', [ProductController::class, 'edit'])->name('admin.product.edit');
        Route::put('update/{id}', [ProductController::class, 'update'])->name('admin.product.update');
        Route::get('delete/{id}', [ProductController::class, 'delete'])->name('admin.product.delete');
        Route::get('restore/{id}', [ProductController::class, 'restore'])->name('admin.product.restore');
        Route::get('destroy/{id}', [ProductController::class, 'destroy'])->name('admin.product.destroy');
    });

     //Category
     Route::prefix("category")->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('admin.category.index');
        Route::get('trash', [CategoryController::class, 'trash'])->name('admin.category.trash');
        Route::get('show/{id}', [CategoryController::class, 'show'])->name('admin.category.show');
        Route::get('create', [CategoryController::class, 'create'])->name('admin.category.store');
        Route::post('store', [CategoryController::class, 'store'])->name('admin.category.store');
        Route::get('edit/{id}', [CategoryController::class, 'edit'])->name('admin.category.edit');
        Route::put('update/{id}', [CategoryController::class, 'update'])->name('admin.category.update');
        Route::get('delete/{id}', [CategoryController::class, 'delete'])->name('admin.category.delete');
        Route::get('restore/{id}', [CategoryController::class, 'restore'])->name('admin.category.restore');
        Route::get('destroy/{id}', [CategoryController::class, 'destroy'])->name('admin.category.destroy');
    });
    
     //Post
     Route::prefix("post")->group(function () {
        Route::get('/', [PostController::class, 'index'])->name('admin.post.index');
        Route::get('trash', [PostController::class, 'trash'])->name('admin.post.trash');
        Route::get('show/{id}', [PostController::class, 'show'])->name('admin.post.show');
        Route::get('create', [PostController::class, 'create'])->name('admin.post.store');
        Route::post('store', [PostController::class, 'store'])->name('admin.post.store');
        Route::get('edit/{id}', [PostController::class, 'edit'])->name('admin.post.edit');
        Route::put('update/{id}', [PostController::class, 'update'])->name('admin.post.update');
        Route::get('delete/{id}', [PostController::class, 'delete'])->name('admin.post.delete');
        Route::get('restore/{id}', [PostController::class, 'restore'])->name('admin.post.restore');
        Route::get('destroy/{id}', [PostController::class, 'destroy'])->name('admin.post.destroy');
    });

     //Brand
     Route::prefix("brand")->group(function () {
        Route::get('/', [BrandController::class, 'index'])->name('admin.brand.index');
        Route::get('trash', [BrandController::class, 'trash'])->name('admin.brand.trash');
        Route::get('show/{id}', [BrandController::class, 'show'])->name('admin.brand.show');
        Route::get('create', [BrandController::class, 'create'])->name('admin.brand.store');
        Route::post('store', [BrandController::class, 'store'])->name('admin.brand.store');
        Route::get('edit/{id}', [BrandController::class, 'edit'])->name('admin.brand.edit');
        Route::put('update/{id}', [BrandController::class, 'update'])->name('admin.brand.update');
        Route::get('delete/{id}', [BrandController::class, 'delete'])->name('admin.brand.delete');
        Route::get('restore/{id}', [BrandController::class, 'restore'])->name('admin.brand.restore');
        Route::get('destroy/{id}', [BrandController::class, 'destroy'])->name('admin.brand.destroy');
    });
     //Banner
     Route::prefix("banner")->group(function () {
        Route::get('/', [BannerController::class, 'index'])->name('admin.banner.index');
        Route::get('trash', [BannerController::class, 'trash'])->name('admin.banner.trash');
        Route::get('show/{id}', [BannerController::class, 'show'])->name('admin.banner.show');
        Route::get('create', [BannerController::class, 'create'])->name('admin.banner.store');
        Route::post('store', [BannerController::class, 'store'])->name('admin.banner.store');
        Route::get('edit/{id}', [BannerController::class, 'edit'])->name('admin.banner.edit');
        Route::put('update/{id}', [BannerController::class, 'update'])->name('admin.banner.update');
        Route::get('delete/{id}', [BannerController::class, 'delete'])->name('admin.banner.delete');
        Route::get('restore/{id}', [BannerController::class, 'restore'])->name('admin.banner.restore');
        Route::get('destroy/{id}', [BannerController::class, 'destroy'])->name('admin.banner.destroy');
    });
    //Contact
    Route::prefix("contact")->group(function () {
        Route::get('/', [ContactController::class, 'index'])->name('admin.contact.index');
        Route::get('trash', [ContactController::class, 'trash'])->name('admin.contact.trash');
        Route::get('show/{id}', [ContactController::class, 'show'])->name('admin.contact.show');
        Route::get('create', [ContactController::class, 'create'])->name('admin.contact.store');
        Route::post('store', [ContactController::class, 'store'])->name('admin.contact.store');
        Route::get('edit/{id}', [ContactController::class, 'edit'])->name('admin.contact.edit');
        Route::put('update/{id}', [ContactController::class, 'update'])->name('admin.contact.update');
        Route::get('delete/{id}', [ContactController::class, 'delete'])->name('admin.contact.delete');
        Route::get('restore/{id}', [ContactController::class, 'restore'])->name('admin.contact.restore');
        Route::get('destroy/{id}', [ContactController::class, 'destroy'])->name('admin.contact.destroy');
    });

});