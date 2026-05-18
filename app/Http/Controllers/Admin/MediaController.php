<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MediaController extends Controller
{
    public function index()
    {
        $media = Media::latest()->get();

        return view('admin.media.index', compact('media'));
    }
    public function create()
    {
        return view('admin.media.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'nullable|string|max:255',
            'file' => 'required|file|max:20480',
        ]);

        $file = $request->file('file');

        $fileName = time() . '_' . Str::random(10) . '.' .
            $file->getClientOriginalExtension();

        $path = $file->storeAs(
            'media',
            $fileName,
            'public'
        );

        Media::create([
            'title' => $validated['title'] ?? null,
            'file_name' => $fileName,
            'file_path' => $path,
            'file_type' => 'IMAGE',
            'mime_type' => $file->getMimeType(),
            'file_size' => $file->getSize(),
        ]);

        return redirect()
            ->route('admin.media.index')
            ->with('success', 'Media uploaded successfully');
    }

    public function show($id)
    {
        $item = Media::findOrFail($id);

        return view('admin.media.show', compact('item'));
    }

    public function edit($id)
    {
        $item = Media::findOrFail($id);

        return view('admin.media.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = Media::findOrFail($id);

        $validated = $request->validate([
            'title' => 'nullable|string|max:255',
        ]);

        $item->update($validated);

        return redirect()
            ->route('admin.media.index')
            ->with('success', 'Media updated successfully');
    }

    public function destroy($id)
    {
        $item = Media::findOrFail($id);

        if (file_exists(storage_path('app/public/' . $item->file_path))) {
            unlink(storage_path('app/public/' . $item->file_path));
        }

        $item->delete();

        return redirect()
            ->route('admin.media.index')
            ->with('success', 'Media deleted successfully');
    }
}