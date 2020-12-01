<?php

namespace App\Http\Controllers;

use App\Models\Route;
use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index()
    {
        $schedules = Schedule::paginate();

        return view('schedules.index', compact('schedules'));
    }

    public function create()
    {
        $routes = Route::all();

        return view('schedules.create', compact('routes'));
    }

    public function store(Request $request)
    {
        $attributes = $this->validate($request, [
            'route_id' => ['required', 'exists:routes,id'],
            'day' => ['required', 'numeric', 'in:0,1,2,3,4,5,6'],
            'departure' => ['required'],
            'arrival' => ['required'],
            'passenger_capacity' => ['required', 'numeric', 'min:1'],
        ]);

        Schedule::create($attributes);

        $request->session()->flash('success', 'Jadwal berhasil ditambahkan.');
        return redirect()->route('schedules.index');
    }

    public function edit(Schedule $schedule)
    {
        $routes = Route::all();

        return view('schedules.edit', compact('schedule', 'routes'));
    }

    public function update(Request $request, Schedule $schedule)
    {
        $attributes = $this->validate($request, [
            'route_id' => ['required', 'exists:routes,id'],
            'day' => ['required', 'numeric', 'in:0,1,2,3,4,5,6'],
            'departure' => ['required'],
            'arrival' => ['required'],
            'passenger_capacity' => ['required', 'numeric', 'min:1'],
        ]);

        $schedule->update($attributes);

        $request->session()->flash('success', 'Jadwal telah berhasil diperbarui.');
        return redirect()->route('schedules.index');
    }

    public function destroy(Request $request, Schedule $schedule)
    {
        $schedule->delete();

        $request->session()->flash('success', 'Jadwal berhasil dihapus.');
        return redirect()->back();
    }
}
