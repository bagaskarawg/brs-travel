<?php

namespace App\Http\Controllers;

use App\Models\Pool;
use Illuminate\Http\Request;

class PoolController extends Controller
{
    public function index()
    {
        $pools = Pool::paginate();

        return view('pools.index', compact('pools'));
    }

    public function create()
    {
        return view('pools.create');
    }

    public function store(Request $request)
    {
        $attributes = $this->validate($request, [
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'whatsapp' => 'nullable',
            'map_link' => 'nullable',
            'photo' => 'nullable|image'
        ]);

        $attributes['photo'] = $request->file('photo')->storeAs('pools', $request->user()->id, 'public');

        Pool::create($attributes);

        $request->session()->flash('success', __('Pool has been created.'));
        return redirect()->route('pools.index');
    }

    public function edit(Pool $pool)
    {
        return view('pools.edit', compact('pool'));
    }

    public function update(Request $request, Pool $pool)
    {
        $attributes = $this->validate($request, [
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'whatsapp' => 'nullable',
            'map_link' => 'nullable',
            'photo' => 'nullable|image'
        ]);

        if ($request->hasFile('photo')) {
            $attributes['photo'] = $request->file('photo')->storeAs('pools', $request->user()->id, 'public');
        }

        $pool->update($attributes);

        $request->session()->flash('success', 'Pool telah berhasil diperbarui.');
        return redirect()->route('pools.index');
    }

    public function destroy(Request $request, Pool $pool)
    {
        $pool->delete();

        $request->session()->flash('success', 'Pool berhasil dihapus.');
        return redirect()->back();
    }
}
