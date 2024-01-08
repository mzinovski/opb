<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function approval()
	{
		if(auth()->user()->approved == 0) {
			return view('approval');
		}
	    
	    if(auth()->user()->approved == 1) {
			return redirect('/');
		}
	}
}
