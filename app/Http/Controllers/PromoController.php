<?php

namespace App\Http\Controllers;

use App\Models\Promo;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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
            'path' => ['required', 'image'],
            'url' => ['nullable', 'url'],
            'code' => ['nullable', 'unique:promos'],
            'discount_type' => ['nullable', 'in:nominal,persentase'],
            'discount_value' => ['nullable', 'numeric', 'min:0']
        ]);

        $attributes['path'] = $request->file('path')->storeAs('promos', md5(time()), 'public');

        Promo::create($attributes);

        $request->session()->flash('success', 'Berhasil menambahkan promo.');
        return redirect()->route('promos.index');
    }

    public function edit(Promo $promo)
    {
        return view('promos.edit', compact('promo'));
    }

    public function update(Request $request, Promo $promo)
    {
        $attributes = $this->validate($request, [
            'path' => ['nullable', 'image'],
            'url' => ['nullable', 'url'],
            'code' => [
                'nullable',
                Rule::unique('promos')->ignoreModel($promo)
            ],
            'discount_type' => ['nullable', 'in:nominal,persentase'],
            'discount_value' => ['nullable', 'numeric', 'min:0']
        ]);

        if ($request->hasFile('path')) {
            $attributes['path'] = $request->file('path')->storeAs('promos', md5(time()), 'public');
        }

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
