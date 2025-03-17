<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\PostController;
use App\Http\Controllers\Frontend\AgencyController;
use App\Http\Controllers\Frontend\HistoryController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\CourseController;
use App\Http\Controllers\Frontend\JobController;
use App\Http\Controllers\Frontend\OrderController;
use App\Http\Controllers\Frontend\ProductController;
use App\Http\Controllers\Frontend\ServiceController;
use App\Http\Controllers\Frontend\SitemapController;
use App\Http\Controllers\Frontend\PolicyController;
use App\Http\Controllers\Frontend\ResourceController;
use Inertia\Inertia;


Route::get('sitemap.xml', [SitemapController::class, 'index']);

Route::get(Lang::uri('search-v2'), [HomeController::class, 'searchV2'])->name('api.search');

Route::get(Lang::uri('search'), [HomeController::class, 'search'])->name('search');
Route::get(Lang::uri('/contact'), [AgencyController::class, 'index'])->name('contact');


Route::controller(ProductController::class)->group(function () {
    Route::get(Lang::uri('products'), 'index')->name('products.index');
    Route::get(Lang::uri('products') . '/{slug}', 'show')->name('products.show');
});


Route::middleware(['meta_seo'])->group(function () {
    Route::localized(function () {
        Route::get(Lang::uri('/'), [HomeController::class, 'index'])->name('home');


        Route::controller(ServiceController::class)->group(function () {
            Route::get(Lang::uri('services'), 'index')->name('services.index');
            Route::get(Lang::uri('services') . '/{slug}', 'show')->name('services.show');
        });

        Route::controller(PostController::class)->group(function () {
            Route::get(Lang::uri('posts'), 'index')->name('posts');
            Route::get(Lang::uri('posts') . '/{slug}', 'show')->name('posts.show');
        });
    });
});
Route::dynamicRedirect();
