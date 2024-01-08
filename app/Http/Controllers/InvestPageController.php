<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\InvestitorUser;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Gate;

class InvestPageController extends Controller
{
    public function index($project_slug = null) {
    	if($project_slug == null) {
    		return redirect()->route('index');
    	}

    	$selected_project = Project::where('slug', $project_slug)->first();
    	if(!isset($selected_project)) {
    		return redirect()->route('index');
    	}

    	$projects = Project::orderBy('name', 'asc')->get();
        return view("landing.pages.invest-page.index", ['selected_project' => $selected_project, 'projects' => $projects]);
    }

    public function started_investments_page()
    {
    	$projects = Project::orderBy('name', 'asc')->get();
    	$investor_users = InvestitorUser::where('user_id', Auth::user()->id)->get();
    	return view("landing.pages.invest-page.started_investments_page", ['projects' => $projects, 'investor_users' => $investor_users]);
    }

    public function admin_started_investments()
    {
        if(Gate::denies('edit_users')) {
            return redirect()->route('dashboard');
        }
        return view('clients.started_investments');
    }

    public function admin_signed_investments()
    {
        if(Gate::denies('edit_users')) {
            return redirect()->route('dashboard');
        }
        return view('clients.signed_investments');
    }

    public function admin_payed_investments()
    {
        if(Gate::denies('edit_users')) {
            return redirect()->route('dashboard');
        }
        return view('clients.payed_investments');
    }

    public function admin_investor_profile($id = null)
    {
        if(Gate::denies('edit_users')) {
            return redirect()->route('dashboard');
        }
        if($id == null) {
            return redirect()->route('dashboard');
        }
        $user = User::where('id', $id)->first();
        if($user == null) {
            return redirect()->route('dashboard');
        }
        return view('clients.admin_investor_profile_page', ['user' => $user]);
    }
}
