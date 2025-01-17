<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\User\DashboardController as UserDashboard;
use App\Http\Controllers\Admin\{
    GaleriPhotoController, NewsPortalController
};
use App\Models\Post;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome', [
        'listPost'  => Post::with('image')->get()
    ]);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    //ADMIN
    Route::get('admin-dashboard', [AdminDashboard::class, 'index'])->name('admin-dashboard');
    Route::get('admin-galeri-photo', [GaleriPhotoController::class, 'index'])->name('admin-galeri-photo');
    Route::get('admin-create-galeri-photo', [GaleriPhotoController::class, 'create'])->name('admin-create-galeri-photo');
    Route::post('admin-store-galeri-photo', [GaleriPhotoController::class, 'store'])->name('admin-store-galeri-photo');
    Route::get('admin-edit-galeri-photo/{post:slug}', [GaleriPhotoController::class, 'edit'])->name('admin-edit-galeri-photo');
    Route::get('admin-show-galeri-photo/{post:slug}', [GaleriPhotoController::class, 'show'])->name('admin-show-galeri-photo');
    Route::delete('admin-delete-album/{post}', [GaleriPhotoController::class, 'destroy'])->name('admin-delete-album');
    Route::put('admin-update-galeri-photo/{post:slug}', [GaleriPhotoController::class, 'updategaleri'])->name('admin-update-galeri-photo');
    
    route::get('admin-newsportal', [NewsPortalController::class, 'index'])->name('admin-newsportal');
    Route::get('admin-create-news-portal', [NewsPortalController::class, 'create'])->name('admin-create-news-portal');
    Route::post('admin-store-news-portal', [NewsPortalController::class, 'store'])->name('admin-store-news-portal');

    //USER
    Route::get('user-dashboard', [UserDashboard::class, 'index'])->name('user-dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController ::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
