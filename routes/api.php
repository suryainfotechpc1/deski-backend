<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\MenuControllerAPI;
use App\Http\Controllers\API\HomeControllerAPI;
use App\Http\Controllers\API\ContactControllerAPI;
use App\Http\Controllers\API\RegisterControllerAPI;
use App\Http\Controllers\API\LoginControllerAPI;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
    // return $request->user();
// });

Route::middleware('jwt.auth')->get('/user', function(Request $request) {
    return auth()->user();
});

Route::group(['middleware' => 'jwt.auth'], function () {
	// Route::post('getMenu_API',[MenuControllerAPI::class, 'getMenu']);
});

Route::post('register_API',[RegisterControllerAPI::class, 'register']);
Route::post('login_API',[LoginControllerAPI::class, 'login']);


Route::post('getMenu_API',[MenuControllerAPI::class, 'getMenu']);
Route::post('getSlider_API',[HomeControllerAPI::class, 'getSlider']);

Route::post('addContactForm_API',[ContactControllerAPI::class, 'addContactForm']);
Route::post('getContact_API',[ContactControllerAPI::class, 'getContact']);

Route::get('homesSection_API',[HomeControllerAPI::class, 'homesSection']);
Route::get('getContent/{page}/{id}',[HomeControllerAPI::class, 'getContent']);


Route::get('getCategory/{port}',[HomeControllerAPI::class, 'getCategory']);
Route::get('getPortfolios',[HomeControllerAPI::class, 'getPortfolios']);
Route::get('getSinglePortfolio/{id}',[HomeControllerAPI::class, 'getSinglePortfolio']);




