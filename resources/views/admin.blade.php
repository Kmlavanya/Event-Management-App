@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2 sidebar">
            <div class="current-plan">Dashboard</div>
            <a href="{{ route('admin.view-users') }}" class="list-group-item list-group-item-action">
                <i class="fas fa-users"></i> View Users
            </a>
            <a href="{{ route('admin.add-event') }}" class="list-group-item list-group-item-action">
                <i class="fas fa-calendar-plus"></i> Add Event
            </a>            
            <a href="{{ route('admin.view-events') }}" class="list-group-item list-group-item-action">
                <i class="fas fa-calendar"></i> View Event
            </a>
            {{-- <a href="{{ route('admin.viewEventBooker', ['eventId' => 1]) }}" class="list-group-item list-group-item-action">
                <i class="fas fa-user-check"></i> View Event Booker
            </a> --}}
        </div>
        <div class="col-md-10 main-panel">
            <div class="card">
                <div class="card-header">Admin Dashboard</div>
                <div class="card-body">
                    <div id="admin-content">
                        Welcome to the Admin Dashboard!
                    </div>
                </div>
            </div>
            <div class="stats">
                <div class="stat">
                    <h3>7</h3>
                    <p>Total Events</p>
                </div>
                <div class="stat">
                    <h3>49</h3>
                    <p>Total Speakers</p>
                </div>
                <div class="stat">
                    <h3>20</h3>
                    <p>Total Sponsors</p>
                </div>
                <div class="stat">
                    <h3>2.75 Hrs</h3>
                    <p>Total Time Savings</p>
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
        background-color: #f0f2f5; /* Light background color */
    }
    .container-fluid {
        height: 100%;
    }
    .sidebar {
        background-color: #343a40;
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
        background-color: #ffffff;
        margin-left: 17%;
        height: 100vh;
        overflow-y: auto;
    }
    .card {
        margin-bottom: 20px;
    }
    .stats {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
    }
    .stat {
        flex: 1;
        background-color: #887b7b4d;
        padding: 20px;
        margin: 10px 0;
        border-radius: 5px;
        text-align: center;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .stat h3 {
        margin: 0;
        font-size: 36px;
        color: #333333;
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
        .stats {
            flex-direction: column;
        }
    }
</style>
@endsection
