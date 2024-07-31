@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2 sidebar">
            <div class="current-plan">Dashboard</div>
            <a href="{{ route('admin.view-users') }}" class="list-group-item list-group-item-action">
                <i class="fas fa-users"></i> View Users
            </a>
            <a href="{{ route('admin.add-event') }}" class="list-group-item list-group-item-action active">
                <i class="fas fa-calendar-plus"></i> Add Event
            </a>
            <a href="{{ route('admin.view-events') }}" class="list-group-item list-group-item-action">
                <i class="fas fa-calendar"></i> View Events
            </a>
            <a href="#" class="list-group-item list-group-item-action">
                <i class="fas fa-user-check"></i> View Event Booker
            </a>
        </div>
        <div class="col-md-10 main-panel">
            <div class="card">
                <div class="card-header">Add New Event</div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <form id="add-event-form" action="{{ route('admin.store-event') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="eventName" class="form-label">Event Name</label>
                            <input type="text" class="form-control" id="eventName" name="eventName" required>
                        </div>
                        <div class="mb-3">
                            <label for="eventAuthor" class="form-label">Event Author</label>
                            <input type="text" class="form-control" id="eventAuthor" name="eventAuthor" required>
                        </div>
                        <div class="mb-3">
                            <label for="eventOrganizer" class="form-label">Event Organizer</label>
                            <input type="text" class="form-control" id="eventOrganizer" name="eventOrganizer" required>
                        </div>
                        <div class="mb-3">
                            <label for="eventType" class="form-label">Event Type</label>
                            <input type="text" class="form-control" id="eventType" name="eventType" required>
                        </div>
                        <div class="mb-3">
                            <label for="ticketPrice" class="form-label">Ticket Price</label>
                            <input type="number" class="form-control" id="ticketPrice" name="ticketPrice" step="0.01" required>
                        </div>
                        <div class="mb-3">
                            <label for="membersLimit" class="form-label">Members Limit</label>
                            <input type="number" class="form-control" id="membersLimit" name="membersLimit" required>
                        </div>
                        <div class="mb-3">
                            <label for="eventImage" class="form-label">Event Image</label>
                            <input type="file" class="form-control" id="eventImage" name="eventImage" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Add Event</button>
                    </form>
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
    .card {
        background-color: #2C2C2C;
        border: none;
        border-radius: 10px;
        margin-bottom: 20px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        color: #ffffff;
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
    .form-label {
        font-weight: bold;
    }
    .form-control {
        border-radius: 5px;
        background-color: #2C2C2C;
        color: #FFFFFF;
        border: 1px solid #555;
    }
    .form-control:focus {
        background-color: #333333;
        color: #FFFFFF;
        border-color: #e51a80;
        box-shadow: none;
    }
    .btn-primary {
        background-color: #e51a80;
        border-color: #e51a80;
    }
    .btn-primary:hover {
        background-color: #d41b6b;
        border-color: #d41b6b;
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
<script>
    $(document).ready(function() {
        $("#add-event-form").validate({
            rules: {
                eventName: "required",
                eventAuthor: "required",
                eventOrganizer: "required",
                eventType: "required",
                ticketPrice: {
                    required: true,
                    number: true,
                    min: 0
                },
                membersLimit: {
                    required: true,
                    number: true,
                    min: 1
                },
                eventImage: {
                    required: true,
                    extension: "jpg|jpeg|png|gif|svg"
                }
            },
            messages: {
                eventName: "Please enter the event name",
                eventAuthor: "Please enter the event author",
                eventOrganizer: "Please enter the event organizer",
                eventType: "Please enter the event type",
                ticketPrice: {
                    required: "Please enter the ticket price",
                    number: "Please enter a valid number",
                    min: "Ticket price must be at least 0"
                },
                membersLimit: {
                    required: "Please enter the members limit",
                    number: "Please enter a valid number",
                    min: "Members limit must be at least 1"
                },
                eventImage: {
                    required: "Please upload an event image",
                    extension: "Please upload a valid image file (jpg, jpeg, png, gif, svg)"
                }
            }
        });
    });
</script>
@endsection
