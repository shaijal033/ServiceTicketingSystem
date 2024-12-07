@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Create New Ticket</h2>
    <form method="POST" action="{{ route('tickets.store') }}">
        @csrf
        <div class="mb-3">
            <label for="customer_name" class="form-label">Customer Name</label>
            <input type="text" class="form-control" id="customer_name" name="customer_name" required>
        </div>
        <div class="mb-3">
            <label for="service_type" class="form-label">Service Type</label>
            <select class="form-select" id="service_type" name="service_type" required>
                <option value="Electrical">Electrical</option>
                <option value="Plumbing">Plumbing</option>
                <option value="HVAC">HVAC</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="appointment_datetime" class="form-label">Appointment Date & Time</label>
            <input type="datetime-local" class="form-control" id="appointment_datetime" name="appointment_datetime" required>
        </div>
        <div class="mb-3">
            <label for="contact_number" class="form-label">Contact Number</label>
            <input type="text" class="form-control" id="contact_number" name="contact_number" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Create Ticket</button>
    </form>
</div>
@endsection
