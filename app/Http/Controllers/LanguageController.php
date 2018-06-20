<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use App;
Use lang;

class LanguageController extends Controller
{
    public function changeLanguage(Request $request) {
    	if($request->ajax()){
    		$request->session()->put('locale', $request->'locale');
    		$request->session()->flash('alert-success', ('app.Local_Change_Success'));
    	}
    }
}
