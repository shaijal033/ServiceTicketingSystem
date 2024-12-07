<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class ServiceTicket extends Model
{
    use HasFactory;
    protected $fillable = [
        'ticket_number',
        'customer_name',
        'service_type',
        'appointment_datetime',
        'contact_number',
        'description',
        'status',
    ];
}
