<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ConsultationController;
use App\Http\Controllers\Api\SpotController;
use App\Http\Controllers\Api\VaccinationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::prefix('v1')->namespace('App\Http\Controllers\Api')->group(function () {
    Route::prefix('auth')->group(function () {
        Route::post('login', [AuthController::class, 'login']);
        Route::post('logout', [AuthController::class, 'logout']);
    });

    Route::prefix('consultations')->group(function () {
        Route::post('/', [ConsultationController::class, 'reqConsultation']);
        Route::get('/', [ConsultationController::class, 'getConsultation']);
    });

    Route::prefix('spots')->group(function () {
        Route::get('/', [SpotController::class, 'spotsByRegion']);
        Route::get('{spot_id}', [SpotController::class, 'spotByIdAndDate']);
    });

    Route::prefix('vaccinations')->group(function () {
        Route::post('/', [VaccinationController::class, 'registrationVaccination']);
        Route::get('/', [VaccinationController::class, 'getVaccinations']);
    });
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});