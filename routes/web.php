<?php

use App\Http\Controllers\LogController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProxyController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/temp', function () {
    return view('temp');
});

Route::post('/attendances', [LogController::class, 'store']);
// Route definition in web.php or api.php
Route::get('/getStudentByRFID/{rfid_no}/{status}', [LogController::class, 'getStudentByRFID']);

// Proxy for sending SMS
Route::post('/proxy-login', [ProxyController::class, 'proxyLogin']);
Route::post('/proxy-send-sms', [ProxyController::class, 'proxySendSms']);
Route::get('/proxy-get-message-id', [ProxyController::class, 'proxyGetMessageId']);
Route::post('/proxy-delete-message', [ProxyController::class, 'proxyDeleteMessage']);
