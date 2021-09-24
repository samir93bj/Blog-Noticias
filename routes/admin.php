<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\admin\TagController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;


Route::get('', [HomeController::class,'index'] )->middleware('can:admin.home')->name('admin.home');

Route::resource('categories', CategoryController::class)->except('show')->names('admin.categories');

Route::resource('tags', TagController::class)->names('admin.tags');

Route::resource('posts', PostController::class )->except('show')->names('admin.posts');

Route::resource('roles', RoleController::class)->names('admin.roles');

Route::resource('users', UserController::class)->only(['index','edit','update'])->names('admin.users');



 