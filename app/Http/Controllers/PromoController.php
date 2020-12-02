<?php

namespace App\Http\Controllers;

use App\Models\Promo;
use Illuminate\Http\Request;

class PromoController extends Controller
{
    public function index()
    {
        $promos = Promo::paginate();

        return view('promos.index', compact('promos'));
    }

    public function create()
    {
        return view('promos.create');
    }

    public function store(Request $request)
    {
        $attributes = $this->validate($request, [
            'user_id' => ['required', 'exists:users,id'],
            'title' => ['required'],
            'body' => ['required'],
            'published_at' => ['nullable']
        ]);

        $attributes['slug'] = Str::slug($attributes['title']);

        Promo::create($attributes);

        $request->session()->flash('success', 'Berhasil menambahkan promo.');
        return redirect()->route('promos.index');
    }

    public function edit(Promo $promo)
    {
        $users = User::admin()->get();

        return view('promos.edit', compact('promo', 'users'));
    }

    public function update(Request $request, Promo $promo)
    {
        $attributes = $this->validate($request, [
            'user_id' => ['required', 'exists:users,id'],
            'title' => ['required'],
            'body' => ['required'],
            'published_at' => ['nullable']
        ]);

        $attributes['slug'] = Str::slug($attributes['title']);

        $promo->update($attributes);

        $request->session()->flash('success', 'Berhasil memperbarui promo.');
        return redirect()->route('promos.index');
    }

    public function destroy(Promo $promo)
    {
        $promo->delete();

        return redirect()->route('promos.index');
    }
}
