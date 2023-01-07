<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BiographyController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\MailController;
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

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::get('users',   [UserController::class, 'index']);
Route::post('sendmail', [MailController::class, 'send']);
Route::get('portfolios', [PortfolioController::class, 'index']);
Route::get('portfolios/{id}', [PortfolioController::class, 'show']);

Route::group(['middleware' => ['auth:sanctum', 'role:Super-Admin']], function () {
    Route::patch('admin/biography/{id}', [AdminController::class, 'update_biography']);
    Route::patch('admin/education/{id}', [AdminController::class, 'update_education']);
});

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/create-portfolio', [PortfolioController::class, 'create']); //->middleware('permission:Create-Portfolio');
    Route::post('/login', [UserController::class, 'login']);
    Route::post('/add-user', [UserController::class, 'add']);
    Route::patch('/update-portfolio/', [PortfolioController::class, 'update']); //->middleware('permission:Update-Portfolio');
    Route::delete('/delete-portfolio/{id}', [PortfolioController::class, 'destroy']); //->middleware('permission:Delete-Portfolio');



    Route::post('/biography/{portfolio}/create', [BiographyController::class, 'store']);
    Route::patch('/biography/update',            [BiographyController::class, 'update']);

    Route::post('/education/{portfolio}/create', [EducationController::class, 'store']);
    Route::patch('/education/update',            [EducationController::class, 'update']);

    Route::post('/skill/{portfolio}/create',     [SkillController::class,     'store']);
    Route::post('/experience/{portfolio}/create', [ExperienceController::class, 'store']);
    Route::post('/contact/{portfolio}/create',   [ContactController::class,   'store']);
});
