<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\APIController;

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

 Route::post("/uploadReel",[APIController::class,"uploadReel"])->name('uploadReel');
 Route::get('/playReel/{reelId}/getReel',[APIController::class,'playReel'])->name('playReel');