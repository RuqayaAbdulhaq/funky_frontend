<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Lookup;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $blogs = Blog::with(['categories', 'thumbImage', 'mainImage'])
            ->when($request->search, function ($query) use ($request) {
                $query->where('title', 'like', '%' . $request->search . '%');
            })
            ->orderBy('blog_id', 'desc')
            ->simplePaginate(10);

        return view('admin.blog.index', compact('blogs'));
    }

    public function create()
    {
        $categories = Lookup::where('type', 'BLOG_CATEGORY')->get();

        return view('admin.blog.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'text' => 'required',

            // ✅ NEW MEDIA IDS
            'thumb_img_id' => 'nullable|exists:media,media_id',
            'main_img_id' => 'nullable|exists:media,media_id',

            'categories' => 'nullable|array'
        ]);

        $blog = Blog::create([
            'title' => $validated['title'],
            'text' => $validated['text'],

            // ✅ UPDATED FIELDS
            'thumb_img_id' => $validated['thumb_img_id'] ?? null,
            'main_img_id' => $validated['main_img_id'] ?? null,
        ]);

        if (!empty($validated['categories'])) {
            $blog->categories()->attach($validated['categories']);
        }

        return redirect()
            ->route('admin.blog.index')
            ->with('success', 'Blog created');
    }

    public function show($id)
    {
        $blog = Blog::with(['categories', 'thumbImage', 'mainImage'])
            ->findOrFail($id);

        return view('admin.blog.show', compact('blog'));
    }

    public function edit($id)
    {
        $blog = Blog::with(['categories', 'thumbImage', 'mainImage'])
            ->findOrFail($id);

        $categories = Lookup::where('type', 'BLOG_CATEGORY')->get();

        return view('admin.blog.edit', compact('blog', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $blog = Blog::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required',
            'text' => 'required',

            // ✅ NEW MEDIA IDS
            'thumb_img_id' => 'nullable|exists:media,media_id',
            'main_img_id' => 'nullable|exists:media,media_id',

            'categories' => 'nullable|array'
        ]);

        $blog->update([
            'title' => $validated['title'],
            'text' => $validated['text'],

            // ✅ UPDATED FIELDS
            'thumb_img_id' => $validated['thumb_img_id'] ?? null,
            'main_img_id' => $validated['main_img_id'] ?? null,
        ]);

        $blog->categories()->sync($validated['categories'] ?? []);

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