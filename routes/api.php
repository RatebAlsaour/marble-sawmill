<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\v1\Common\{ResourceController, UserController, ReviewController, ReferralController, WalletController};
use App\Http\Controllers\Api\v1\Common\Chatting\{DmController, SessionController, SessionDmController, SessionUserController};
use App\Http\Controllers\Admin\ClientInvoiceDetailController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('co', [ClientInvoiceDetailController::class,'stor']);
