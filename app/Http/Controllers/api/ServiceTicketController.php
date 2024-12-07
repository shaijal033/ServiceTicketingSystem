<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ServiceTicket;
use App\Http\Resources\ServiceResource;

class ServiceTicketController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');

    $tickets = ServiceTicket::when($search, function ($query, $search) {
        $query->where('customer_name', 'like', "%$search%")
              ->orWhere('ticket_number', 'like', "%$search%");
    })->get();

    return response()->json($tickets, 200);
    }

    public function show($id)
{
    $ticket = ServiceTicket::findOrFail($id);
    return response()->json($ticket, 200);
}

    public function store(Request $request)
    {
        $request->validate([
            'customer_name' => 'required',
            'service_type' => 'required',
            'appointment_datetime' => 'required|date',
            'contact_number' => 'required|digits:10',
            'description' => 'required',
        ]);

        $ticket = ServiceTicket::create([
            'ticket_number' => uniqid('TICKET-'),
            ...$request->all(),
        ]);

        return response()->json($ticket, 201);
    }

    public function update(Request $request, $id)
    {
        $ticket = ServiceTicket::findOrFail($id);
        $ticket->update($request->all());

        return response()->json($ticket, 200);
    }

    public function destroy($id)
    {
        ServiceTicket::destroy($id);
        return response()->json(null, 204);
    }
}
