<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\pagescontroller;
use App\Http\Controllers\dashboardcontroller;
use App\Http\Controllers\editorcontroller;

Auth::routes();

Route::get('/',[pagescontroller::class, 'index'])->name('landing');
Route::get('/article/{category}', [pagescontroller::class, 'category'])->name('category');
Route::get('/article/{category}/{year}/{month}/{slug}', [pagescontroller::class, 'single_blog'])->name('single_blog');
// Route::get('/cat', [pagescontroller::class, 'cat']);
// Route::get('/catt', [pagescontroller::class, 'cat_']);
Route::prefix('dashboard')->group(function() {
    Route::get('/', [dashboardcontroller::class, 'index'])->name('dashboard.index');
    Route::get('/users', [dashboardcontroller::class, 'users'])->name('dashboard.users');
    Route::post('/suspend/{id}', [dashboardcontroller::class, 'suspend_user'])->name('dashboard.suspend_user');
    Route::post('/unsuspend/{id}', [dashboardcontroller::class, 'unsuspend_user'])->name('dashboard.unsuspend_user');
    Route::post('/add/editor', [dashboardcontroller::class, 'add_editor'])->name('dashboard.add_editor');
    Route::get('/categories', [dashboardcontroller::class, 'categories'])->name('dashboard.categories');
    Route::post('/add/category', [dashboardcontroller::class, 'add_category'])->name('dashboard.add_category');
    Route::post('/add/tag', [dashboardcontroller::class, 'add_tag'])->name('dashboard.add_tag');
    Route::post('/cat/suspend/{id}', [dashboardcontroller::class, 'suspend_cat'])->name('dashboaard.category_suspend');
    Route::post('/cat/unsuspend/{id}', [dashboardcontroller::class, 'unsuspend_cat'])->name('dashboaard.category_unsuspend');
    Route::post('/event/add', [dashboardcontroller::class, 'add_event'])->name('dashboard.add_event');
    Route::get('/event/view/{id}', [dashboardcontroller::class, 'view_event'])->name('dashboard.view_event');
    Route::get('/sms', [dashboardcontroller::class, 'sms'])->name('dashboard.sms');
    Route::post('/sms/edit/{id}', [dashboardcontroller::class, 'edit_sms'])->name('dashboard.edit_sms');
    Route::post('/event/approve/{id}', [dashboardcontroller::class, 'approve_event'])->name('dashboard.approve_event');
    Route::post('/event/hold/{id}', [dashboardcontroller::class, 'hold_event'])->name('dashboard.hold_event');
    Route::post('/make_active/{id}', [dashboardcontroller::class, 'make_active'])->name('dashboard.make_active');
});
Route::prefix('admin')->group(function() {
    Route::get('/', [editorcontroller::class, 'index'])->name('editor.index');
});
Route::get('/account', [dashboardcontroller::class, 'account'])->name('account');
Route::post('/account/edit/{id}', [dashboardcontroller::class, 'update_account'])->name('update_account');
Route::get('/blogs', [dashboardcontroller::class, 'blogs'])->name('admins.blogs');
Route::get('/blogs/add', [dashboardcontroller::class, 'add_blog'])->name('add_blog');
Route::post('/blogs/post', [dashboardcontroller::class, 'post_blog'])->name('post_blog');
Route::get('/blog/edit/{id}', [dashboardcontroller::class, 'blog_edit'])->name('blog_edit');
Route::post('/post_edit_blog/{id}', [dashboardcontroller::class, 'post_edit_blog'])->name('post_edit_blog');
Route::post('/blog_verify/{id}', [dashboardcontroller::class, 'blog_verify'])->name('blog_verify');
Route::post('/blog_unverify/{id}', [dashboardcontroller::class, 'blog_unverify'])->name('blog_unverify');
Route::get('/blog/view/{id}', [dashboardcontroller::class, 'view_blog'])->name('view_blog');