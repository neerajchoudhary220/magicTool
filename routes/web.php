<?php

use App\Http\Controllers\Tools\ToolController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::controller(ToolController::class)->prefix('tools')->group(function(){
    Route::get('/','index')->name('tools');
});