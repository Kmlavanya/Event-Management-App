@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2 sidebar">
            <div class="current-plan">User Dashboard</div>
            <a href="{{ route('user.buy-tickets') }}" class="list-group-item list-group-item-action">
                <i class="fas fa-ticket-alt"></i> Buy Tickets
            </a>
            {{-- <a href="{{ route('user.view-tickets') }}" class="list-group-item list-group-item-action">
                <i class="fas fa-eye"></i> View Tickets
            </a> --}}
        </div>
        <div class="col-md-10 main-panel">
            <div class="card">
                <div class="card-header">User Dashboard</div>
                <div class="card-body">
                    Welcome to the User Dashboard!
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
    }
</style>
@endsection
