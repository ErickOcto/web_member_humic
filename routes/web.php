<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/statistics', [HomeController::class, 'statistics'])->name('statistics');

// Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

// Admin Panel routes
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/create-member', [DashboardController::class, 'memberCreate'])->name('member.create');
    //Route::post('/create-member', [DashboardController::class, 'memberStore'])->name('member.store');
    Route::get('/create-announcement', [DashboardController::class, 'announcementCreate'])->name('announcement.create');
    Route::get('/project-gallery', [DashboardController::class, 'projectGallery'])->name('projectGallery.list');
    Route::get('/project-gallery/approval', [DashboardController::class, 'projectGalleryApproval'])->name('projectGallery.approval');
    Route::get('/member-history', [DashboardController::class, 'memberHistory'])->name('member.history');
});

// Member panel routes
//Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/member/dashboard', [MemberController::class, 'dashboard'])->name('member.dashboard');
    Route::get('/member/edit', [MemberController::class, 'edit'])->name('member.edit');
    Route::put('/member/put', [MemberController::class, 'put'])->name('member.put');
    Route::get('member/pg', [MemberController::class, 'pg'])->name('member.pg');
    Route::get('member/pgAdd', [MemberController::class, 'pgAdd'])->name('member.pgAdd');
    Route::get('member/announcement', [MemberController::class, 'announcement'])->name('member.announcement');
//});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
