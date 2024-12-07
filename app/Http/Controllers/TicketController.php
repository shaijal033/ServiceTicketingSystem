<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ServiceTicket;

class TicketController extends Controller
{
    public function index()
    {
        $tickets = ServiceTicket::all();
        return view('tickets.index', compact('tickets'));
    }

    public function create()
    {
        return view('tickets.create');
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

        ServiceTicket::create([
            'ticket_number' => uniqid('TICKET-'),
            ...$request->all(),
        ]);

        return redirect()->route('tickets.index')->with('success', 'Ticket created successfully.');
    }

    public function edit($id)
    {
        $ticket = ServiceTicket::findOrFail($id);
        return view('tickets.edit', compact('ticket'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:Open,Closed',
        ]);

        $ticket = ServiceTicket::findOrFail($id);
        $ticket->update($request->all());

        return redirect()->route('tickets.index')->with('success', 'Ticket updated successfully.');
    }
}
