<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', // Name of the sender
        'email', // Email of the sender
        'message', // Message of the sender
        'extras', // Extra data

        'app_name', // App name
        'send_to', // Email address to send to
        'honeypot', // Honeypot field

        'host', // Host of the request
        'origin', // Origin of the request
        'ip', // IP of the request
    ];

    protected $casts = [
        'honeypot' => 'boolean',
        'extras' => 'array',
    ];
}
