@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Update Ticket Status</h2>
    <form method="POST" action="{{ route('tickets.update', $ticket->id) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-select" id="status" name="status" required>
                <option value="Open" {{ $ticket->status == 'Open' ? 'selected' : '' }}>Open</option>
                <option value="Closed" {{ $ticket->status == 'Closed' ? 'selected' : '' }}>Closed</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update Status</button>
    </form>
</div>
@endsection
