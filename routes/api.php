<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\UsersController;
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

Route::group(
    [
        'prefix' => 'users'
    ],
    function () {
        Route::get('/{vkId}', UsersController::class);
        Route::group(
            ['prefix' => '/{vkId}'],
            function () {
                Route::get('activity', [ActivityController::class, 'activity']);
                Route::post('activity', [ActivityController::class, 'saveActivity']);
                Route::post('/', [UsersController::class, 'voiceControl']);
            }
        );
    }
);

Route::get('courses', CourseController::class);
