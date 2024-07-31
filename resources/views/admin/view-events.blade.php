@extends('layouts.app')

@section('content')
<div class="container-fluid explore-events">
    <div class="row">
        <div class="col-md-2 sidebar">
            <div class="current-plan">Dashboard</div>
            <a href="{{ route('admin.view-users') }}" class="list-group-item list-group-item-action">
                <i class="fas fa-users"></i> View Users
            </a>
            <a href="{{ route('admin.add-event') }}" class="list-group-item list-group-item-action">
                <i class="fas fa-calendar-plus"></i> Add Event
            </a>
            <a href="{{ route('admin.view-events') }}" class="list-group-item list-group-item-action active">
                <i class="fas fa-calendar"></i> View Events
            </a>
            <a href="#" class="list-group-item list-group-item-action">
                <i class="fas fa-user-check"></i> View Event Booker
            </a>
        </div>
        <div class="col-md-10 main-panel">
            <div class="explore-header">
                <h2>Explore Events</h2>
                
            </div>
            <div class="card popular-events">
                <div class="card-header">Popular</div>
                <div class="card-body d-flex flex-wrap">
                    @foreach ($events as $event)
                        <div class="event-card">
                            <img src="{{ asset('images/' . $event->image) }}" class="img-fluid event-img" alt="{{ $event->name }}">
                            <div class="event-info">
                                <h5 class="event-title">{{ $event->name }}</h5>
                                <p class="event-author">Author: {{ $event->author }}</p>
                                <p class="event-organizer">Organizer: {{ $event->organizer }}</p>
                                <p class="event-type">Type: {{ $event->type }}</p>
                                <p class="event-price">Cash: ${{ $event->ticket_price }}</p>
                                <p class="event-members">Total Members: {{ $event->members_limit }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    body, html {
        height: 100%;
        margin: 0;
        font-family: Arial, sans-serif;
        background-color: #121212; /* Dark background color */
        color: #FFFFFF; /* Light text color */
    }
    .container-fluid {
        height: 100%;
    }
    .sidebar {
        background-color: #1F1F1F;
        padding: 20px;
        height: 100vh;
        box-shadow: 2px 0 5px rgba(0,0,0,0.1);
        border-radius: 5px;
        position: absolute;
        overflow-y: auto;
    }
    .current-plan {
        background-color: #e51a80;
        color: #ffffff;
        padding: 10px;
        margin-bottom: 20px;
        text-align: center;
        border-radius: 5px;
    }
    .sidebar .list-group-item {
        color: #ffffff;
        border: none;
        padding: 10px;
        margin: 5px 0;
        border-radius: 5px;
        display: flex;
        align-items: center;
        background-color: transparent;
    }
    .sidebar .list-group-item i {
        margin-right: 10px;
    }
    .sidebar .list-group-item:hover, .sidebar .list-group-item.active {
        background-color: #e51a80;
        color: #ffffff;
    }
    .main-panel {
        padding: 20px;
        background-color: #121212;
        margin-left: 17%;
        height: 100vh;
        overflow-y: auto;
    }
    .explore-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    }
    .search-bar {
        width: 300px;
        border-radius: 20px;
        padding: 10px;
        border: none;
        outline: none;
    }
    .card {
        background-color: #1F1F1F;
        border: none;
        border-radius: 10px;
        margin-bottom: 20px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }
    .card-header {
        background-color: transparent;
        border-bottom: none;
        color: #e51a80;
        font-size: 1.5rem;
        padding: 20px;
    }
    .card-body {
        padding: 20px;
    }
    .event-card {
        background-color: #2C2C2C;
        border-radius: 10px;
        margin: 10px;
        padding: 15px;
        width: 200px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        text-align: center;
    }
    .event-img {
        border-radius: 10px;
        margin-bottom: 10px;
    }
    .event-info {
        color: #e5e5e5;
    }
    .event-title {
        font-size: 1.2rem;
        margin-bottom: 10px;
    }
    .event-author, .event-organizer, .event-type, .event-price, .event-members {
        font-size: 0.9rem;
        margin-bottom: 5px;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .sidebar {
            position: relative;
            height: auto;
            margin-bottom: 20px;
        }
        .main-panel {
            margin-left: 0;
        }
        .explore-header {
            flex-direction: column;
            align-items: flex-start;
        }
        .search-bar {
            width: 100%;
            margin-top: 10px;
        }
    }
</style>
@endsection
