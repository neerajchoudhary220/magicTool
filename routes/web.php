<?php

use App\Http\Controllers\Tools\ToolsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::controller(ToolsController::class)->prefix('tools')->group(function(){
    Route::get('/','index')->name('tools.video_downloader');
    Route::get('/translation','translation')->name('tools.translation');
});


Route::get('test',function(){
    return "Working";
});