<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class reportController extends Controller
{
    public function downloadrepo(Request $request){
        return view('downloadrepo');
    }
}
