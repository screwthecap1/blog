<?php

use App\Http\Controllers\Admin\Category\IndexController as CategoryIndexController;
use App\Http\Controllers\Admin\Category\CreateController as CategoryCreateController;
use App\Http\Controllers\Admin\Category\StoreController as CategoryStoreController;
use App\Http\Controllers\Admin\Category\ShowController as CategoryShowController;
use App\Http\Controllers\Admin\Category\EditController as CategoryEditController;
use App\Http\Controllers\Admin\Category\UpdateController as CategoryUpdateController;
use App\Http\Controllers\Admin\Category\DeleteController as CategoryDeleteController;

use App\Http\Controllers\Admin\Tag\IndexController as TagIndexController;
use App\Http\Controllers\Admin\Tag\CreateController as TagCreateController;
use App\Http\Controllers\Admin\Tag\StoreController as TagStoreController;
use App\Http\Controllers\Admin\Tag\ShowController as TagShowController;
use App\Http\Controllers\Admin\Tag\EditController as TagEditController;
use App\Http\Controllers\Admin\Tag\UpdateController as TagUpdateController;
use App\Http\Controllers\Admin\Tag\DeleteController as TagDeleteController;

use App\Http\Controllers\Admin\Main\IndexController as AdminIndexController;
use App\Http\Controllers\Main\IndexController;
use Illuminate\Support\Facades\Route;

Route::get('/', IndexController::class);

Route::prefix('admin')->group(function () {
    Route::get('/', AdminIndexController::class);

    Route::prefix('categories')->name('admin.category.')->group(function () {
        Route::get('/', CategoryIndexController::class)->name('index');
        Route::get('/create', CategoryCreateController::class)->name('create');
        Route::post('/', CategoryStoreController::class)->name('store');
        Route::get('/{category}', CategoryShowController::class)->name('show');
        Route::get('/{category}/edit', CategoryEditController::class)->name('edit');
        Route::patch('/{category}', CategoryUpdateController::class)->name('update');
        Route::delete('/{category}', CategoryDeleteController::class)->name('delete');
    });

    Route::prefix('tags')->name('admin.tag.')->group(function () {
        Route::get('/', TagIndexController::class)->name('index');
        Route::get('/create', TagCreateController::class)->name('create');
        Route::post('/', TagStoreController::class)->name('store');
        Route::get('/{tag}', TagShowController::class)->name('show');
        Route::get('/{tag}/edit', TagEditController::class)->name('edit');
        Route::patch('/{tag}', TagUpdateController::class)->name('update');
        Route::delete('/{tag}', TagDeleteController::class)->name('delete');
    });
});

Auth::routes();

