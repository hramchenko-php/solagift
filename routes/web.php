<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\MailSendController;

Route::post('/subscription', [SubscriptionController::class,'store']);
Route::get('/send',[MailSendController::class,'send']);
Route::get('/unsubscribe/{mail}',[SubscriptionController::class,'unsubscribe'])->name('unsubscribe');
