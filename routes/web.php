<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/tickets', [TicketController::class, 'index'])->name('tickets.index'); // List tickets
Route::get('/tickets/create', [TicketController::class, 'create'])->name('tickets.create'); // Form for creating a ticket
Route::post('/tickets', [TicketController::class, 'store'])->name('tickets.store'); // Store new ticket
Route::get('/tickets/{id}/edit', [TicketController::class, 'edit'])->name('tickets.edit'); // Edit ticket status
Route::put('/tickets/{id}', [TicketController::class, 'update'])->name('tickets.update'); // Update ticket
