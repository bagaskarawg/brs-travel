<?php

namespace App\Http\Controllers;

use App\Models\Facility;
use Illuminate\Http\Request;

class FacilityController extends Controller
{
    public function index()
    {
        $facilities = Facility::paginate();

        return view('facilities.index', compact('facilities'));
    }

    public function create()
    {
        return view('facilities.create');
    }

    public function store(Request $request)
    {
        $attributes = $this->validate($request, [
            'image' => ['required', 'image'],
            'caption' => ['required'],
        ]);

        $attributes['image'] = $request->file('image')->storeAs('facilities', md5(time()), 'public');

        Facility::create($attributes);

        $request->session()->flash('success', 'Berhasil menambahkan fasilitas.');
        return redirect()->route('facilities.index');
    }

    public function edit(Facility $facility)
    {
        return view('facilities.edit', compact('facility'));
    }

    public function update(Request $request, Facility $facility)
    {
        $attributes = $this->validate($request, [
            'image' => ['nullable', 'image'],
            'caption' => ['required'],
        ]);

        if ($request->hasFile('image')) {
            $attributes['image'] = $request->file('image')->storeAs('facilities', md5(time()), 'public');
        }

        $facility->update($attributes);

        $request->session()->flash('success', 'Berhasil memperbarui fasilitas.');
        return redirect()->route('facilities.index');
    }

    public function destroy(Facility $facility)
    {
        $facility->delete();

        return redirect()->route('facilities.index');
    }
}
