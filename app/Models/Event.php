<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'author', 'organizer', 'type', 'ticket_price', 'members_limit', 'image',
    ];

    public function registrations()
    {
        return $this->hasMany(Registration::class);
    }
    
    public function getAvailableTicketsAttribute()
{
    $totalTickets = $this->members_limit;
    $bookedTickets = $this->registrations()->count(); // Count the number of booked registrations
    return max($totalTickets - $bookedTickets, 0); // Ensure no negative ticket count
}
}

