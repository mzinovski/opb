<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class PageController extends Controller
{
    public function index() {
    	$projects = Project::orderBy('name', 'asc')->get();
        return view("landing.pages.index", ['projects' => $projects]);
    }
}
