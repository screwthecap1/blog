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

use App\Http\Controllers\Admin\Post\IndexController as PostIndexController;
use App\Http\Controllers\Admin\Post\CreateController as PostCreateController;
use App\Http\Controllers\Admin\Post\StoreController as PostStoreController;
use App\Http\Controllers\Admin\Post\ShowController as PostShowController;
use App\Http\Controllers\Admin\Post\EditController as PostEditController;
use App\Http\Controllers\Admin\Post\UpdateController as PostUpdateController;
use App\Http\Controllers\Admin\Post\DeleteController as PostDeleteController;

use App\Http\Controllers\Admin\User\IndexController as UserIndexController;
use App\Http\Controllers\Admin\User\CreateController as UserCreateController;
use App\Http\Controllers\Admin\User\StoreController as UserStoreController;
use App\Http\Controllers\Admin\User\ShowController as UserShowController;
use App\Http\Controllers\Admin\User\EditController as UserEditController;
use App\Http\Controllers\Admin\User\UpdateController as UserUpdateController;
use App\Http\Controllers\Admin\User\DeleteController as UserDeleteController;

use App\Http\Controllers\Admin\Main\IndexController as AdminIndexController;
use App\Http\Controllers\Main\IndexController;
use Illuminate\Support\Facades\Route;

Route::get('/', IndexController::class);

Route::prefix('admin')->middleware(['auth', 'admin', 'verified'])->group(function () {
    Route::get('/', AdminIndexController::class);

    Route::prefix('categories')->name('admin.categories.')->group(function () {
        Route::get('/', CategoryIndexController::class)->name('index');
        Route::get('/create', CategoryCreateController::class)->name('create');
        Route::post('/', CategoryStoreController::class)->name('store');
        Route::get('/{category}', CategoryShowController::class)->name('show');
        Route::get('/{category}/edit', CategoryEditController::class)->name('edit');
        Route::patch('/{category}', CategoryUpdateController::class)->name('update');
        Route::delete('/{category}', CategoryDeleteController::class)->name('delete');
    });

    Route::prefix('tags')->name('admin.tags.')->group(function () {
        Route::get('/', TagIndexController::class)->name('index');
        Route::get('/create', TagCreateController::class)->name('create');
        Route::post('/', TagStoreController::class)->name('store');
        Route::get('/{tag}', TagShowController::class)->name('show');
        Route::get('/{tag}/edit', TagEditController::class)->name('edit');
        Route::patch('/{tag}', TagUpdateController::class)->name('update');
        Route::delete('/{tag}', TagDeleteController::class)->name('delete');
    });

    Route::prefix('posts')->name('admin.posts.')->group(function () {
        Route::get('/', PostIndexController::class)->name('index');
        Route::get('/create', PostCreateController::class)->name('create');
        Route::post('/', PostStoreController::class)->name('store');
        Route::get('/{post}', PostShowController::class)->name('show');
        Route::get('{post}/edit', PostEditController::class)->name('edit');
        Route::patch('/{post}', PostUpdateController::class)->name('update');
        Route::delete('/{post}', PostDeleteController::class)->name('delete');
    });

    Route::prefix('users')->name('admin.users.')->group(function () {
        Route::get('/', UserIndexController::class)->name('index');
        Route::get('/create', UserCreateController::class)->name('create');
        Route::post('/', UserStoreController::class)->name('store');
        Route::get('/{user}', UserShowController::class)->name('show');
        Route::get('/edit/{user}', UserEditController::class)->name('edit');
        Route::patch('/{user}', UserUpdateController::class)->name('update');
        Route::delete('/{user}', UserDeleteController::class)->name('delete');
    });
});

Auth::routes(['verify' => true]);
