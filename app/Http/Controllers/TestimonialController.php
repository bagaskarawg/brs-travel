<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::paginate();

        return view('testimonials.index', compact('testimonials'));
    }

    public function create()
    {
        return view('testimonials.create');
    }

    public function store(Request $request)
    {
        $attributes = $this->validate($request, [
            'name' => ['required'],
            'content' => ['required'],
            'image' => ['required', 'image'],
        ]);

        $attributes['image'] = $request->file('image')->storeAs('testimonials', md5(time()), 'public');

        Testimonial::create($attributes);

        $request->session()->flash('success', 'Berhasil menambahkan testimonial.');
        return redirect()->route('testimonials.index');
    }

    public function edit(Testimonial $testimonial)
    {
        return view('testimonials.edit', compact('testimonial'));
    }

    public function update(Request $request, Testimonial $testimonial)
    {
        $attributes = $this->validate($request, [
            'name' => ['required'],
            'content' => ['required'],
            'image' => ['nullable', 'image'],
        ]);

        if ($request->hasFile('image')) {
            $attributes['image'] = $request->file('image')->storeAs('testimonials', md5(time()), 'public');
        }

        $testimonial->update($attributes);

        $request->session()->flash('success', 'Berhasil memperbarui testimonial.');
        return redirect()->route('testimonials.index');
    }

    public function destroy(Testimonial $testimonial)
    {
        $testimonial->delete();

        return redirect()->route('testimonials.index');
    }
}
