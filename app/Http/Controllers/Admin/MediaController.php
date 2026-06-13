<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class MediaController extends Controller
{
    public function index()
    {
        $media = Media::latest('media_id')->paginate(12);

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
            'file' => 'required|file|mimes:jpg,jpeg,png,webp,gif,svg,pdf|max:20480',
        ]);

        $file = $request->file('file');

        $fileName = time() . '_' . Str::random(10) . '.' . $file->getClientOriginalExtension();

        $path = $file->storeAs('media', $fileName, 'public');

        Media::create([
            'title' => $validated['title'] ?? null,
            'original_name' => $file->getClientOriginalName(),
            'file_name' => $fileName,
            'file_path' => $path,
            'file_type' => str_starts_with($file->getMimeType(), 'image/') ? 'IMAGE' : 'FILE',
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

        if ($item->file_path) {
            Storage::disk('public')->delete($item->file_path);
        }

        $item->delete();

        return redirect()
            ->route('admin.media.index')
            ->with('success', 'Media deleted successfully');
    }

    public function modalList(Request $request)
    {
        $query = Media::where('file_type', 'IMAGE');

        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('original_name', 'like', "%{$search}%")
                    ->orWhere('file_name', 'like', "%{$search}%");
            });
        }

        $media = $query
            ->latest('media_id')
            ->paginate(12);

        return response()->json($media);
    }

    public function modalUpload(Request $request)
    {
        $validated = $request->validate([
            'title' => 'nullable|string|max:255',
            'file' => 'required|file|mimes:jpg,jpeg,png,webp,gif,svg,avif|max:20480',
        ]);

        $file = $request->file('file');

        $fileName = time() . '_' . Str::random(10) . '.' . $file->getClientOriginalExtension();

        $path = $file->storeAs('media', $fileName, 'public');

        $media = Media::create([
            'title' => $validated['title'] ?? null,
            'original_name' => $file->getClientOriginalName(),
            'file_name' => $fileName,
            'file_path' => $path,
            'file_type' => str_starts_with($file->getMimeType(), 'image/') ? 'IMAGE' : 'FILE',
            'mime_type' => $file->getMimeType(),
            'file_size' => $file->getSize(),
        ]);

        return response()->json($media->fresh());
    }
}