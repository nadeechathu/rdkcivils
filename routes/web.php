<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Auth::routes();

Route::get('/', [App\Http\Controllers\Frontend\HomeController::class, 'index'])->name('web.home');
Route::post('/subscribe', [App\Http\Controllers\Frontend\HomeController::class, 'subscribe'])->name('web.subscribe');


Route::get('/forgot-password', [App\Http\Controllers\Frontend\AuthController::class, 'forgotPasswordUI'])->name('web.password.forgot');
Route::post('/forgot-password', [App\Http\Controllers\Frontend\AuthController::class, 'forgotPassword'])->name('web.password.reset');
Route::get('/reset-password/{token}', [App\Http\Controllers\Frontend\AuthController::class, 'resetPassword'])->name('web.password.resetUI');
Route::post('/reset-password', [App\Http\Controllers\Frontend\AuthController::class, 'changePassword'])->name('web.password.change');

// services pages
Route::get('/services', [App\Http\Controllers\Frontend\PageController::class, 'loadServicesArchive'])->name('web.services.archive');
Route::get('/services/{slug}', [App\Http\Controllers\Frontend\PageController::class, 'loadServices'])->name('web.services.type.archive');

Route::get('/services/view/{slug}', [App\Http\Controllers\Frontend\PageController::class, 'loadServicesSingle'])->name('web.services.single');

// projects pages
Route::get('/projects', [App\Http\Controllers\Frontend\PageController::class, 'loadProjectsArchive'])->name('web.projects.archive');
Route::get('/projects/{slug}', [App\Http\Controllers\Frontend\PageController::class, 'loadProjectsSingle'])->name('web.projects.single');



Route::get('/resources', [App\Http\Controllers\Frontend\PageController::class, 'loadBlogsArchive'])->name('web.blogs.archive');
Route::get('/resources/{slug}', [App\Http\Controllers\Frontend\PageController::class, 'loadBlogsSingle'])->name('web.blogs.single');

//contact us
Route::get('/contact-us', [App\Http\Controllers\Frontend\PageController::class, 'loadContactUs'])->name('web.contact');
Route::post('/contact-us', [App\Http\Controllers\Frontend\PageController::class, 'submitContactUs'])->name('web.contact.submit');

//about
Route::get('/our-story', [App\Http\Controllers\Frontend\PageController::class, 'loadOurStory'])->name('web.story');

// FAQs
Route::get('/faqs', [App\Http\Controllers\Frontend\PageController::class, 'loadFaq'])->name('web.faq');

// Terms and Conditons
Route::get('/terms-and-conditions', [App\Http\Controllers\Frontend\PageController::class, 'loadTermsConditions'])->name('web.terms.conditions');

// Privacy Policy
Route::get('/privacy-policy', [App\Http\Controllers\Frontend\PageController::class, 'loadPrivacyPolicy'])->name('web.privacy.policy');

// Get a quotation
Route::get('/quotation', [App\Http\Controllers\Frontend\QuotationController::class, 'loadQuotation'])->name('web.quotation');
//  submit quotation form
Route::post('/quotation/form/submit', [App\Http\Controllers\Frontend\QuotationController::class, 'submitQuotation'])->name('web.submit.quotation');
//  Booking Appointment
Route::get('/book/an/appointment/{slug}', [App\Http\Controllers\Frontend\QuotationController::class, 'bookingAppointment'])->name('web.book.appointment');

// Submit review
Route::post('/review/submit', [App\Http\Controllers\Frontend\PageController::class, 'submitReview'])->name('web.submit.review');
