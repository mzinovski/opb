<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Gate;

class ProjectsController extends Controller
{
    public function index()
    {
        if(Gate::denies('edit_users')) {
            return redirect()->route('dashboard');
        }
        return view('projects.index');
    }

    public function create()
    {
        if(Gate::denies('edit_users')) {
            return redirect()->route('dashboard');
        }
        return view('projects.create');
    }

    public function edit($project)
    {
        if(Gate::denies('edit_users')) {
            return redirect()->route('dashboard');
        }
        $pp = Project::where('id', $project)->first();
        return view('projects.edit', ['project' => $pp]);
    }
}
