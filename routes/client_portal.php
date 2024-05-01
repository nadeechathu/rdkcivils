<?php

use Illuminate\Support\Facades\Route;


//client auth
Route::get('/client-login', [App\Http\Controllers\Frontend\ClientController::class, 'clientLogin'])->name('clients.login');
Route::get('/client-registration', [App\Http\Controllers\Frontend\ClientController::class, 'clientRegister'])->name('clients.registrationUI');
Route::post('/client-registration', [App\Http\Controllers\Frontend\ClientController::class, 'registerClient'])->name('clients.registration');

//client dashboard
Route::get('/client-dashboard', [App\Http\Controllers\Client_Portal\ClientController::class, 'clientDashboard'])->middleware(['client.auth'])->name('clients.dashboard');

//single project view
Route::get('/clients/projects/{slug}', [App\Http\Controllers\Client_Portal\ClientController::class, 'showSingleProject'])->middleware(['client.auth'])->name('clients.projects.single');
Route::post('/update-documents', [App\Http\Controllers\Client_Portal\ClientController::class, 'updateDocments'])->middleware(['client.auth'])->name('clients.update.documents');

//user profile
Route::get('/user-profile', [App\Http\Controllers\Client_Portal\ClientController::class, 'userProfileUI'])->name('clients.user.profile');
Route::post('/user-profile-update', [App\Http\Controllers\Client_Portal\ClientController::class, 'updateUserDetails'])->name('client.profile.update');

//testimonials
Route::post('/add-testimonial', [App\Http\Controllers\Client_Portal\ClientController::class, 'addTestimonial'])->name('client.add.review');
Route::post('/guest/testimonial', [App\Http\Controllers\Frontend\ClientController::class, 'addTestimonial'])->name('guest.add.review');

Route::get('/progress-percentage', [App\Http\Controllers\Client_Portal\ClientController::class, 'getProgress'])->name('clients.progress');
