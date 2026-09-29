<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainsliderController;
use App\Http\Controllers\LgaController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\AcademicsessionController;
use App\Http\Controllers\ClassnameController;
use App\Http\Controllers\AlmController;





Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('mainslider/viewslider', [MainsliderController::class, 'viewmainsliders']);
Route::get('blog/viewblog', [BlogController::class, 'viewblogs']);
Route::get('blog/viewdetails/{slug}', [BlogController::class, 'viewsingleblogs']);
Route::post('results/check-results', [ResultController::class, 'checkresultsbyportal']);
Route::get('sessions/viewacademicsession', [AcademicsessionController::class, 'viewmainsessions']);
Route::get('clasess/viewmallclassname', [ClassnameController::class, 'viewmallclassnames']);
Route::get('alm/viewalm', [AlmController::class, 'viewmallalms']);

Route::get('lga/viewlgas', [LgaController::class, 'viewallga']);
Route::get('lga/viewprimaryschoolsinsinglelga/{lga}', [LgaController::class, 'viewprimaryschoolsinsinglelgas']);
Route::get('lga/viewsecondaryschoolsinsinglelga/{lga}', [LgaController::class, 'viewsecondaryschoolsinsinglelgas']);


