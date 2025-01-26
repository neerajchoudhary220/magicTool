<?php

namespace App\Http\Controllers\Tools;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ToolsController extends Controller
{
    public function index(){
        return view('tools.video-downloader');
    }
    public function translation(){
        return view('tools.translation');
    }
}
