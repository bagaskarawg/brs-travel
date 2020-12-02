<?php

namespace App\Http\Controllers;

use App\Models\Promo;
use App\Models\Route;
use App\Models\Schedule;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class ReservationController extends Controller
{
    public function index()
    {
        $tickets = Ticket::with('route', 'schedule')->where('user_id', Auth::user()->id)->latest()->paginate();

        return view('reservations.index', compact('tickets'));
    }

    public function create()
    {
        $routes = Route::all();
        $schedules = Schedule::all();

        return view('reservations.create', compact('routes', 'schedules'));
    }

    public function store(Request $request)
    {
        $attributes = $this->validate($request, [
            'date' => ['required', 'date', 'after_or_equal:today'],
            'route_id' => ['required', 'exists:routes,id'],
            'schedule_id' => [
                'required',
                Rule::exists('schedules', 'id')->where('route_id', $request->get('route_id')),
            ],
            'type' => ['required', 'in:penumpang,barang']
        ]);

        $route = Route::find($attributes['route_id']);
        $priceField = $attributes['type'] == 'penumpang' ? 'price' : 'package_delivery_price';
        $price = $route->{$priceField};

        if ($promoCode = $request->get('promo_code')) {
            if ($promo = Promo::where('code', $promoCode)->first()) {
                $attributes['promo_id'] = $promo->id;
                $attributes['promo_code'] = $promo->code;
                $attributes['discount'] = $promo->discount_type == 'nominal' ? $promo->discount_value : $promo->discount_value * $price / 100;
            } else {
                $attributes['promo_code'] = null;
            }
        }

        $attributes['ticket_number'] = Str::random();
        $attributes['user_id'] = Auth::user()->id;
        $attributes['price'] = $price;

        Ticket::create($attributes);

        return redirect()->route('reservations.index');
    }
}
