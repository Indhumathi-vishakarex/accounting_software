<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\StaffController;
use App\Http\Controllers\Admin\SubscriptionController;


use App\Models\Admin;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\Profiler\Profile;

Route::get('/admin/login', function () {
    return view('auth.login');
});
Route::get('/admin', [AdminController::class, 'admin']);



// Route::get('/admin-profile', function () {
    //     return view('dashboard.admin-profile');
    // })->name('admin-profile');
    
Route::get('/admin/admin-dashboard', [AdminController::class, 'adminDashboard'])->name('admin-dashboard');
Route::get('/admin/admin-profile',[AdminController::class, 'adminProfile'])->name('admin-profile');


Route::get('/admin/create-roles', [AdminController::class, 'createRole'])->name('create-roles');
Route::post('/admin/store-role', [AdminController::class, 'storeRole'])->name('store-role');
Route::get('/admin/manage-roles',[AdminController::class, 'manageRoles'])->name('manage-roles');
Route::get('/admin/edit-roles/{id}', [AdminController::class, 'editRoles'])->name('edit-role');

Route::put('/admin/roles/update/{id}', [AdminController::class, 'updateRole'])->name('roles.update');
Route::delete('/admin/roles/{id}', [AdminController::class, 'destroyRole'])->name('roles.destroy');

Route::get('/admin/manage-plans', [AdminController::class, 'subscription'])->name('manage-plans');
Route::get('/admin/create-plan',[AdminController::class, 'createPlan'])->name('create-plan');
Route::get('/admin/invoice-view',[AdminController::class, 'invoiceView'])->name('invoice-view');
Route::get('/admin/bill-oversights',[AdminController::class, 'billsOversight'])->name('bill-oversights');
Route::get('/admin/bill-types',[AdminController::class, 'billTypes'])->name('bill-types');
Route::get('/admin/auto-category',[AdminController::class, 'autoCategory'])->name('auto-category');









Route::get('/admin/client-registration',[ClientController::class,'clientRegistration'])->name('client-registration');
Route::get('/admin/clients-list',[ClientController::class,'clientList'])->name('client-list');
Route::get('/admin/client-profile/{id}', [ClientController::class, 'clientProfile'])->name('client-profile');
Route::post('/admin/client-store', [ClientController::class, 'storeClient'])->name('client-store');
Route::get('/admin/client-edit/{id}', [ClientController::class, 'editClient'])->name('client-edit');
Route::post('admin/client/preview', [ClientController::class, 'previewStore'])->name('client.preview');

Route::get('/client/verify/{email}/{code}', [ClientController::class, 'activateClient'])->name('client.activate');




Route::get('/admin/sample', function () {
    return view('sample');
})->name('sample');



Route::get('/admin/payments', function () {
    return view('payments.payments');
})->name('payments');





Route::get('/admin/staff-registration', [StaffController::class, 'staffRegistration'])->name('staff-registration');

Route::get('/admin/staff-profile/{id}', [StaffController::class, 'staffProfile'])->name('staff-profile');
Route::post('/admin/store-staff', [StaffController::class, 'storeStaff'])->name('store-staff');
Route::put('/admin/staff-update/{id}', [StaffController::class, 'updateProfile'])->name('staff-update');
Route::delete('/admin/staff-delete/{id}', [StaffController::class, 'staffDestroy'])->name('staff-destroy');
Route::put('/staff/{id}/update-password', [StaffController::class, 'updatePassword'])->name('staff.updatePassword');
// Route::get('/search-staff', [StaffController::class, 'search'])->name('search-staff');
Route::get('/admin/staff-list',[StaffController::class, 'staffList'])->name('staff-list');
Route::get('/admin/staff-list', [StaffController::class, 'searchStaff'])->name('staff-list');




Route::post('/admin/store-plans',[SubscriptionController::class,'storePlans'])->name('store-plans');


Route::get('/admin/manage-faq',[FaqController::class, 'manageFaq'])->name('manage-faq');
Route::get('/admin/create-faq',[FaqController::class, 'createFaq'])->name('create-faq');
Route::get('/admin/manage-about',[FaqController::class, 'manageAbout'])->name('manage-about');
Route::get('/admin/manage-terms',[FaqController::class, 'manageTerms'])->name('manage-terms');
Route::get('/admin/manage-news',[FaqController::class, 'manageNews'])->name('manage-news');

Route::post('/admin/store-faqs', [FaqController::class, 'storeFaq'])->name('faqs-store');

Route::get('/faq-edit/{id}', [FaqController::class, 'editFaq'])->name('faq-edit');

Route::delete('/faq-delete/{id}', [FaqController::class, 'deleteFaq'])->name('faq-delete');
Route::put('/faq/update/{id}', [FaqController::class, 'updateFaq'])->name('faq.update');


Route::get('/admin/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth:admin')->group(function () {
    Route::get('/admin/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/admin/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/admin/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
