<?php

use App\Http\Controllers\ImagePortfolioController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\FilterController;
use App\Http\Controllers\ImageController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('portfolios', PortfolioController::class);

Route::apiResource('filters', FilterController::class);
Route::get('filters/{filter}/edit', [FilterController::class, 'edit']);

Route::apiResource('images',ImageController::class);

Route::post('images/{image}/portfolios/{portfolio}', [ImagePortfolioController::class, 'store'])
    ->name('images.portfolios.store');
Route::delete('images/{image}/portfolios/{portfolio}', [ImagePortfolioController::class, 'delete'])
    ->name('images.portfolios.delete');
