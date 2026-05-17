<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Lookup;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::with('categories')->get();

        return view('admin.blog.index', compact('blogs'));
    }

    public function create()
    {
        $categories = Lookup::where(
            'type',
            'BLOG_CATEGORY'
        )->get();

        return view('admin.blog.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'thumb_img' => 'nullable',
            'main_img' => 'nullable',
            'text' => 'required',
            'categories' => 'nullable|array'
        ]);

        $blog = Blog::create([
            'title' => $validated['title'],
            'thumb_img' => $validated['thumb_img'] ?? null,
            'main_img' => $validated['main_img'] ?? null,
            'text' => $validated['text'],
        ]);

        if (!empty($validated['categories'])) {
            $blog->categories()->attach(
                $validated['categories']
            );
        }

        return redirect()
            ->route('admin.blog.index')
            ->with('success', 'Blog created');
    }

    public function show($id)
    {
        $blog = Blog::with('categories')
            ->findOrFail($id);

        return view('admin.blog.show', compact('blog'));
    }

    public function edit($id)
    {
        $blog = Blog::with('categories')
            ->findOrFail($id);

        $categories = Lookup::where(
            'type',
            'BLOG_CATEGORY'
        )->get();

        return view(
            'admin.blog.edit',
            compact('blog', 'categories')
        );
    }

    public function update(Request $request, $id)
    {
        $blog = Blog::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required',
            'thumb_img' => 'nullable',
            'main_img' => 'nullable',
            'text' => 'required',
            'categories' => 'nullable|array'
        ]);

        $blog->update([
            'title' => $validated['title'],
            'thumb_img' => $validated['thumb_img'] ?? null,
            'main_img' => $validated['main_img'] ?? null,
            'text' => $validated['text'],
        ]);

        $blog->categories()->sync(
            $validated['categories'] ?? []
        );

        return redirect()
            ->route('admin.blog.index')
            ->with('success', 'Blog updated');
    }

    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);

        $blog->delete();

        return redirect()
            ->route('admin.blog.index')
            ->with('success', 'Blog deleted');
    }
}