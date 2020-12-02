<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::paginate();

        return view('galleries.index', compact('galleries'));
    }

    public function create()
    {
        return view('galleries.create');
    }

    public function store(Request $request)
    {
        $attributes = $this->validate($request, [
            'path' => ['required', 'image'],
            'url' => ['nullable', 'url'],
            'placement' => [
                'required',
                Rule::in(Gallery::PLACEMENTS)
            ],
            'order' => ['required', 'numeric', 'min:0'],
        ]);

        $attributes['path'] = $request->file('path')->storeAs('galleries', md5(time()), 'public');

        Gallery::create($attributes);

        $request->session()->flash('success', 'Berhasil menambahkan galeri.');
        return redirect()->route('galleries.index');
    }

    public function edit(Gallery $gallery)
    {
        return view('galleries.edit', compact('gallery'));
    }

    public function update(Request $request, Gallery $gallery)
    {
        $attributes = $this->validate($request, [
            'path' => ['nullable', 'image'],
            'url' => ['nullable', 'url'],
            'placement' => [
                'required',
                Rule::in(Gallery::PLACEMENTS)
            ],
            'order' => ['required', 'numeric', 'min:0'],
        ]);

        if ($request->hasFile('path')) {
            $attributes['path'] = $request->file('path')->storeAs('galleries', md5(time()), 'public');
        }

        $gallery->update($attributes);

        $request->session()->flash('success', 'Berhasil memperbarui galeri.');
        return redirect()->route('galleries.index');
    }

    public function destroy(Gallery $gallery)
    {
        $gallery->delete();

        return redirect()->route('galleries.index');
    }
}
