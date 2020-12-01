<?php

namespace App\Http\Controllers;

use App\Models\Pool;
use App\Models\Route;
use Illuminate\Http\Request;

class RouteController extends Controller
{
    public function index()
    {
        $routes = Route::paginate();

        return view('routes.index', compact('routes'));
    }

    public function create()
    {
        $pools = Pool::all();

        return view('routes.create', compact('pools'));
    }

    public function store(Request $request)
    {
        $attributes = $this->validate($request, [
            'source_pool_id' => ['required', 'exists:pools,id'],
            'destination_pool_id' => ['required', 'exists:pools,id', 'different:source_pool_id'],
            'price' => ['required', 'numeric', 'min:0'],
            'package_delivery_price' => ['required', 'numeric', 'min:0'],
            'package_delivery_price_next_kg' => ['required', 'numeric', 'min:0'],
        ]);

        Route::create($attributes);

        $request->session()->flash('success', 'Rute berhasil ditambahkan.');
        return redirect()->route('routes.index');
    }

    public function edit(Route $route)
    {
        $pools = Pool::all();

        return view('routes.edit', compact('route', 'pools'));
    }

    public function update(Request $request, Route $route)
    {
        $attributes = $this->validate($request, [
            'source_pool_id' => ['required', 'exists:pools,id'],
            'destination_pool_id' => ['required', 'exists:pools,id', 'different:source_pool_id'],
            'price' => ['required', 'numeric', 'min:0'],
            'package_delivery_price' => ['required', 'numeric', 'min:0'],
            'package_delivery_price_next_kg' => ['required', 'numeric', 'min:0'],
        ]);

        $route->update($attributes);

        $request->session()->flash('success', 'Rute telah berhasil diperbarui.');
        return redirect()->route('routes.index');
    }

    public function destroy(Request $request, Route $route)
    {
        $route->delete();

        $request->session()->flash('success', 'Rute berhasil dihapus.');
        return redirect()->back();
    }
}
