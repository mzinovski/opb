<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Gate;

class ClientsController extends Controller
{
    public function index()
    {
    	if(Gate::denies('edit_users')) {
            return redirect()->route('dashboard');
        }
        return view('clients.index');
    }

    public function create()
    {
    	if(Gate::denies('edit_users')) {
            return redirect()->route('dashboard');
        }
        return view('clients.create');
    }

    public function baned_clients()
    {
        if(Gate::denies('edit_users')) {
            return redirect()->route('dashboard');
        }
        return view('clients.baned');
    }
}
