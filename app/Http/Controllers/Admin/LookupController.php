<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lookup;
use Illuminate\Http\Request;

class LookupController extends Controller
{
    public function index()
    {
        $items = Lookup::all();
        return view('admin.lookup.index', compact('items'));
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
            'img' => 'nullable|string',
            'description' => 'nullable|string',
        ]);

        Lookup::create($validated);

        return redirect()
            ->route('admin.lookup.index')
            ->with('success', 'Created successfully');
    }

    public function show($id)
    {
        $item = Lookup::findOrFail($id);
        return view('admin.lookup.show', compact('item'));
    }

    public function edit($id)
    {
        $item = Lookup::findOrFail($id);
        return view('admin.lookup.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = Lookup::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'img' => 'nullable|string',
            'description' => 'nullable|string',
        ]);

        $item->update($validated);

        return redirect()
            ->route('admin.lookup.index')
            ->with('success', 'Updated successfully');
    }

    public function destroy($id)
    {
        $item = Lookup::findOrFail($id);
        $item->delete();

        return redirect()
            ->route('admin.lookup.index')
            ->with('success', 'Deleted successfully');
    }
}