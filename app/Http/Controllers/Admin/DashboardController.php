<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Lookup;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $blogCount = Blog::count();
        $lookupCount = Lookup::count();

        return view('admin.dashboard', compact('blogCount', 'lookupCount'));
    }

}