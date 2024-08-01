<?php

// RegisterController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Registration;
use Illuminate\Support\Facades\Log;

class Registerusercontroller extends Controller
{
    public function showForm($eventId)
    {
        $event = Event::findOrFail($eventId);
        $totalRegisteredTickets = Registration::where('event_id', $eventId)->count();
        return view('user.register', compact('event', 'totalRegisteredTickets'));
    }

    public function store(Request $request)
    {
        Log::info('Store method hit with request: ', $request->all());

        // Validate the request
        $request->validate([
            'event_id' => 'required|exists:events,id',
            'persons' => 'required|array|min:1',
            'persons.*.name' => 'required|string|max:255',
            'persons.*.email' => 'required|email|max:255|unique:registrations,email',
            'persons.*.gender' => 'required|in:Male,Female',
            'persons.*.age' => 'required|integer|min:1',
        ]);

        $event = Event::findOrFail($request->event_id);

        // Check if the total tickets exceed the available tickets
        $totalRegisteredTickets = Registration::where('event_id', $event->id)->count();
        $requestedTickets = count($request->input('persons'));
        $availableTickets = $event->members_limit - $totalRegisteredTickets;

        if (($totalRegisteredTickets + $requestedTickets) > $event->members_limit) {
            dd('Not enough tickets available.');
            // Or use Log::debug()
            Log::debug('Error condition met: Not enough tickets available.');
            return redirect()->back()->with('error', 'Not enough tickets available.');
        }

        foreach ($request->input('persons') as $person) {
            Registration::create([
                'event_id' => $event->id,
                'name' => $person['name'],
                'email' => $person['email'],
                'gender' => $person['gender'],
                'age' => $person['age'],
                'cash' => $event->ticket_price
            ]);
        }

        return redirect()->route('user.register', ['eventId' => $event->id])
                         ->with('success', 'Registration successful!');
    }
}
