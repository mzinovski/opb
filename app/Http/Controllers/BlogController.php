<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use App\Models\Blog;

use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Gate;

use App\Models\Settings;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Gate::denies('edit_blogs')) {
            return redirect()->route('dashboard');
        }

        $settings = Settings::first();
        
        return view('blogs.index', ['settings' => $settings]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(Gate::denies('edit_blogs')) {
            return redirect()->route('dashboard');
        }
        
        return view('blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBlogRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        if(Gate::denies('edit_blogs')) {
            return redirect()->route('dashboard');
        }

        return view('blogs.show', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        if(Gate::denies('edit_blogs')) {
            return redirect()->route('dashboard');
        }
        
        return view('blogs.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBlogRequest $request, Blog $blog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        //
    }
}
