@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tickets</h2>
    <a href="{{ route('tickets.create') }}" class="btn btn-success mb-3">New Ticket</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>Ticket Number</th>
                <th>Customer Name</th>
                <th>Service Type</th>
                <th>Appointment Date & Time</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tickets as $ticket)
            <tr>
                <td>{{ $ticket->ticket_number }}</td>
                <td>{{ $ticket->customer_name }}</td>
                <td>{{ $ticket->service_type }}</td>
                <td>{{ $ticket->appointment_datetime }}</td>
                <td>{{ $ticket->status }}</td>
                <td>
                    <a href="{{ route('tickets.edit', $ticket->id) }}" class="btn btn-primary">Edit</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
