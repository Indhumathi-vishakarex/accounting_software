<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;

Route::prefix('admin')->group(function () {

    // Use guest:admin instead of just guest
    Route::middleware('guest:admin')->group(function () {
        Route::get('register', [RegisteredUserController::class, 'create'])->name('admin.register');
        Route::post('register', [RegisteredUserController::class, 'store']);

        Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('admin.login');
        Route::post('login', [AuthenticatedSessionController::class, 'store']);

        Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])->name('admin.password.request');
        Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])->name('admin.password.email');

        Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])->name('admin.password.reset');
        Route::post('reset-password', [NewPasswordController::class, 'store'])->name('admin.password.store');
    });

    // Use auth:admin instead of just auth
    Route::middleware('auth:admin')->group(function () {
        Route::get('verify-email', EmailVerificationPromptController::class)->name('admin.verification.notice');
        Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
            ->middleware(['signed', 'throttle:6,1'])->name('admin.verification.verify');

        Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
            ->middleware('throttle:6,1')->name('admin.verification.send');

        Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])->name('admin.password.confirm');
        Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

        Route::put('password', [PasswordController::class, 'update'])->name('admin.password.update');

        Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('admin.logout');
    });
});
