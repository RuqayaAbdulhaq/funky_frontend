<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lookup;
use Illuminate\Http\Request;

class LookupController extends Controller
{
    public function index()
    {
        $lookups = Lookup::with('image')->get();

        return view('admin.lookup.index', compact('lookups'));
    }

    public function create()
    {
        return view('admin.lookup.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'required|string|max:255',

            // ✅ UPDATED
            'img_id' => 'nullable|exists:media,media_id',

            'description' => 'nullable|string',
        ]);

        Lookup::create([
            'title' => $validated['title'],
            'type' => $validated['type'],
            'img_id' => $validated['img_id'] ?? null,
            'description' => $validated['description'] ?? null,
        ]);

        return redirect()
            ->route('admin.lookup.index')
            ->with('success', 'Created successfully');
    }

       public function edit($id)
    {
        $lookup = Lookup::findOrFail($id);

        return view('admin.lookup.edit', compact('lookup'));
    }

    public function update(Request $request, $id)
    {
        $lookup = Lookup::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'required|string|max:255',

            // ✅ UPDATED
            'img_id' => 'nullable|exists:media,media_id',

            'description' => 'nullable|string',
        ]);

        $lookup->update([
            'title' => $validated['title'],
            'type' => $validated['type'],
            'img_id' => $validated['img_id'] ?? null,
            'description' => $validated['description'] ?? null,
        ]);

        return redirect()
            ->route('admin.lookup.index')
            ->with('success', 'Updated successfully');
    }

    public function destroy($id)
    {
        $lookup = Lookup::findOrFail($id);
        $lookup->delete();

        return redirect()
            ->route('admin.lookup.index')
            ->with('success', 'Deleted successfully');
    }
}