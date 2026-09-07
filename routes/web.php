<?php
// routes/web.php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ContactMessageController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\OrganigramController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ActivityLogController;
use App\Http\Controllers\AdminAccountController;
use App\Http\Controllers\GoogleAuthController;

// ==================== PUBLIC ROUTES ====================
Route::get('/', [PublicController::class, 'home'])->name('home');
Route::get('/profil', [PublicController::class, 'profile'])->name('public.profile');
Route::get('/layanan', [PublicController::class, 'services'])->name('public.services');
Route::get('/layanan/{service}', [PublicController::class, 'serviceShow'])->name('public.services.show');
Route::get('/fasilitas', [PublicController::class, 'facilities'])->name('public.facilities');
Route::get('/berita', [PublicController::class, 'news'])->name('public.news');
Route::get('/berita/{slug}', [PublicController::class, 'newsShow'])->name('public.news.show');
Route::get('/organigram', [PublicController::class, 'organigram'])->name('public.organigram');

// Contact Routes
Route::get('/kontak', [ContactMessageController::class, 'showContactForm'])->name('public.contact');
Route::post('/kontak', [ContactMessageController::class, 'store'])->name('public.contact.store');

// ==================== AUTH ROUTES ====================
Route::get('/auth/google', [GoogleAuthController::class, 'redirect'])->name('auth.google');
Route::get('/auth/google/callback', [GoogleAuthController::class, 'callback'])->name('auth.google.callback');
Route::get('/google/complete-profile', [GoogleAuthController::class, 'showCompleteProfile'])->name('google.complete-profile');
Route::post('/google/complete-profile', [GoogleAuthController::class, 'completeProfile'])->name('google.complete-profile.store');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// Password Reset Routes
Route::get('/lupa-password', [AuthController::class, 'showForgotPasswordForm'])->name('password.request');

// ==================== ADMIN ROUTES ====================
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // User Management
    Route::resource('users', UserController::class);
    Route::patch('/users/{user}/toggle-active', [UserController::class, 'toggleActive'])->name('users.toggle-active');
    Route::patch('/users/{user}/role', [UserController::class, 'updateRole'])->name('users.update-role');
    
    // Profile BLUD
    Route::resource('profiles', ProfileController::class);
    
    // Organigram
    Route::resource('organigrams', OrganigramController::class);
    Route::get('/organigrams-tree', [OrganigramController::class, 'getTree'])->name('organigrams.tree');
    
    // Facilities
    Route::resource('facilities', FacilityController::class);
    Route::patch('/facilities/{facility}/status', [FacilityController::class, 'updateStatus'])->name('facilities.status');
    
    // Services
    Route::resource('services', ServiceController::class);
    Route::patch('/services/{service}/status', [ServiceController::class, 'toggleStatus'])->name('services.status');
    
    // News
    Route::resource('news', NewsController::class);
    Route::post('/news/{news}/publish', [NewsController::class, 'publish'])->name('news.publish');
    Route::post('/news/{news}/archive', [NewsController::class, 'archive'])->name('news.archive');
    
    // Contact Messages
    Route::resource('contact-messages', ContactMessageController::class);
    Route::patch('/contact-messages/{contactMessage}/read', [ContactMessageController::class, 'markAsRead'])->name('contact-messages.read');
    Route::patch('/contact-messages/{contactMessage}/replied', [ContactMessageController::class, 'markAsReplied'])->name('contact-messages.replied');
    
    // Activity Logs
    Route::resource('activity-logs', ActivityLogController::class);
    Route::delete('/activity-logs/clear', [ActivityLogController::class, 'clear'])->name('activity-logs.clear');


});
