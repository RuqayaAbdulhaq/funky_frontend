<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class ContentController extends Controller
{
    private const TYPES = [
        'text',
        'code',
        'executable',
        'image',
        'link',
        'file',
        'embed',   // external website / video iframe
    ];

    private function dataRules(string $type): array
    {
        return match ($type) {
            'text' => [
                'data.html' => ['required', 'string'],
            ],
            'code' => [
                'data.language' => ['required', 'string', 'max:50'],
                'data.code'     => ['required', 'string'],
                'data.filename' => ['nullable', 'string', 'max:255'],
            ],
            'executable' => [
                'data.html'   => ['required', 'string'],  
                'data.label'  => ['nullable', 'string', 'max:255'],
                'data.style'  => ['nullable', 'string'],
            ],
            'image' => [
                'data.url'     => ['required', 'string', 'url'],
                'data.alt'     => ['nullable', 'string', 'max:255'],
                'data.caption' => ['nullable', 'string', 'max:500'],
            ],
            'link' => [
                'data.url'   => ['required', 'string', 'url'],
                'data.label' => ['required', 'string', 'max:255'],
                'data.title' => ['nullable', 'string', 'max:255'],
            ],
            'file' => [
                'data.url'       => ['required', 'string', 'url'],
                'data.filename'  => ['required', 'string', 'max:255'],
                'data.mime_type' => ['nullable', 'string', 'max:100'],
                'data.size'      => ['nullable', 'integer'],   // bytes
            ],
            'embed' => [
                'data.url'     => ['required', 'string', 'url'],
                'data.title'   => ['nullable', 'string', 'max:255'],
                'data.height'  => ['nullable', 'integer'],
            ],
            default => [],
        };
    }

    private function layoutRules(): array
    {
        return [
            'position'  => ['required', 'integer', 'min:0'],
            'width'     => ['nullable', 'integer', 'min:1'],
            'height'    => ['nullable', 'integer', 'min:1'],
            'alignment' => ['nullable', Rule::in(['left', 'center', 'right', 'justify'])],
        ];
    }

    public function index(Post $post): View
    {
        $contents = $post->contents()->orderBy('position')->get();

        return view('contents.index', compact('post', 'contents'));
    }

    public function create(Post $post): View
    {
        return view('contents.create', [
            'post'  => $post,
            'types' => self::TYPES,
        ]);
    }

    public function store(Request $request, Post $post): RedirectResponse
    {
        $base = $request->validate([
            'type' => ['required', Rule::in(self::TYPES)],
        ]);

        $validated = $request->validate(
            array_merge($this->layoutRules(), $this->dataRules($base['type']))
        );
 
        DB::transaction(function () use ($post, $base, $validated) {
            $position = $validated['position']
                ?? $post->contents()->max('position') + 1;

            $post->contents()
                ->where('position', '>=', $position)
                ->increment('position');

            $post->contents()->create([
                'type'      => $base['type'],
                'position'  => $position,
                'width'     => $validated['width']     ?? null,
                'height'    => $validated['height']    ?? null,
                'alignment' => $validated['alignment'] ?? null,
                'data'      => $validated['data'],
            ]);
        });

        return redirect()
            ->route('posts.contents.index', $post)
            ->with('success', 'Block added.');
    }

    // -------------------------------------------------------------------------
    // Edit — show the edit form for a single block
    // -------------------------------------------------------------------------

    public function edit(Post $post, Content $content): View
    {
        return view('contents.edit', [
            'post'    => $post,
            'content' => $content,
            'types'   => self::TYPES,
        ]);
    }

    public function update(Request $request, Post $post, Content $content): RedirectResponse
    {
        $base = $request->validate([
            'type' => ['required', Rule::in(self::TYPES)],
        ]);

        $validated = $request->validate(
            array_merge($this->layoutRules(), $this->dataRules($base['type']))
        );

        $content->update([
            'type'      => $base['type'],
            'position'  => $validated['position'],
            'width'     => $validated['width']     ?? null,
            'height'    => $validated['height']    ?? null,
            'alignment' => $validated['alignment'] ?? null,
            'data'      => $validated['data'],
        ]);

        return redirect()
            ->route('posts.contents.index', $post)
            ->with('success', 'Block updated.');
    }

    public function destroy(Post $post, Content $content): RedirectResponse
    {
        DB::transaction(function () use ($post, $content) {
            $deletedPosition = $content->position;
            $content->delete();

            $post->contents()
                ->where('position', '>', $deletedPosition)
                ->decrement('position');
        });

        return redirect()
            ->route('posts.contents.index', $post)
            ->with('success', 'Block deleted.');
    }

    public function reorder(Request $request, Post $post): \Illuminate\Http\JsonResponse
    {
        $validated = $request->validate([
            'order'   => ['required', 'array'],
            'order.*' => ['integer', 'exists:contents,id'],
        ]);

        DB::transaction(function () use ($post, $validated) {
            foreach ($validated['order'] as $position => $contentId) {
                $post->contents()
                    ->where('id', $contentId)
                    ->update(['position' => $position]);
            }
        });

        return response()->json(['message' => 'Order saved.']);
    }
}