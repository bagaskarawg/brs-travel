<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index()
    {
        $tickets = Ticket::with('route', 'schedule')->latest()->paginate();

        return view('tickets.index', compact('tickets'));
    }
}
