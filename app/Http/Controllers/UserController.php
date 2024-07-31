<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Ticket; // Assuming you have a Ticket model

class UserController extends Controller
{
    public function index()
    {
        return view('user');
    }

    public function showBuyTickets()
    {
        $events = Event::all(); // Fetch all events
        return view('user.buy-tickets', compact('events'));
    }

    // public function registerEvent(Request $request, $eventId)
    // {
    //     // Logic to register the user for the event
    //     $event = Event::find($eventId);
    //     // Register user for the event
    //     return redirect()->route('user.buy-tickets')->with('success', 'Registered successfully!');
    // }

    // public function viewTickets()
    // {
    //     // Logic to view the tickets
    //     $tickets = Ticket::where('user_id', auth()->id())->get();
    //     return view('view-tickets', compact('tickets'));
    // }
}
