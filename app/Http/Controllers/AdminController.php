<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Event;
use Yajra\DataTables\Facades\DataTables;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin');
    }


    public function viewUsers(Request $request)
    {
        if ($request->ajax()) {
            $data = User::where('role', 'user')->select(['id', 'name', 'email', 'role']);
            return DataTables::of($data)
                ->addIndexColumn()
                ->make(true);
        }

        return view('admin.view-users');
    }

    public function showAddEventForm()
    {
        return view('admin.add-event'); // Adjust if you place it in a different folder
    }

    public function storeEvent(Request $request)
    {
        // Validate the request
        $request->validate([
           'eventName' => 'required|string|max:255',
            'eventAuthor' => 'required|string|max:255',
            'eventOrganizer' => 'required|string|max:255',
            'eventType' => 'required|string|max:255',
            'ticketPrice' => 'required|numeric|min:0',
            'membersLimit' => 'required|integer|min:1',
            'eventImage' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

         // Handle the image upload
         if ($request->hasFile('eventImage')) {
            $imageName = time().'.'.$request->eventImage->extension();
            $request->eventImage->move(public_path('images'), $imageName);
        }
        
        // Create a new event
        Event::create([
            'name' => $request->input('eventName'),
            'author' => $request->input('eventAuthor'),
            'organizer' => $request->input('eventOrganizer'),
            'type' => $request->input('eventType'),
            'ticket_price' => $request->input('ticketPrice'),
            'members_limit' => $request->input('membersLimit'),
            'image' => $imageName ?? null,
        ]);

        return redirect()->route('admin.add-event')->with('success', 'Event added successfully!');
    }
}

