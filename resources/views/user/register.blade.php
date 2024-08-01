@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2 sidebar">
            <div class="current-plan">User Dashboard</div>
            <a href="{{ route('user.buy-tickets') }}" class="list-group-item list-group-item-action">
                <i class="fas fa-spinner fa-pulse"></i> Buy Tickets
            </a>
            {{-- <a href="{{ route('user.view-tickets') }}" class="list-group-item list-group-item-action">
                <i class="fas fa-eye"></i> View Tickets
            </a> --}}
        </div>
        <div class="col-md-10 main-panel">
            <div class="card">
                <div class="card-header">Register for {{ $event->name }}</div>
                <div class="card-body">

                    <!-- Display Error Messages -->
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    <!-- Display Success Messages -->
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form id="registrationForm" method="POST" action="{{ route('register.store') }}">
                        @csrf
                        <input type="hidden" name="event_id" value="{{ $event->id }}">

                        <div class="mb-3">
                            <label for="eventName" class="form-label">Event Name</label>
                            <input type="text" class="form-control" id="eventName" value="{{ $event->name }}" readonly>
                        </div>

                        <div class="mb-3">
                            <label for="cash" class="form-label">Cash (per ticket)</label>
                            <input type="text" class="form-control" id="cash" value="{{ $event->ticket_price }}" readonly>
                        </div>

                        <div class="mb-3">
                            <label for="availableTickets" class="form-label">Available Tickets</label>
                            <input type="text" class="form-control" id="availableTickets" value="{{ $event->available_tickets }}" readonly>
                        </div>

                        <div id="personsContainer">
                            <div class="person-group mb-3">
                                <h5>Person 1</h5>
                                <div class="mb-3">
                                    <label for="name_1" class="form-label">Name</label>
                                    <input type="text" class="form-control" name="persons[0][name]" id="name_1" required>
                                </div>

                                <div class="mb-3">
                                    <label for="email_1" class="form-label">Email ID</label>
                                    <input type="email" class="form-control" name="persons[0][email]" id="email_1" required>
                                </div>

                                <div class="mb-3">
                                    <label for="gender_1" class="form-label">Gender</label>
                                    <select class="form-select" name="persons[0][gender]" id="gender_1" required>
                                        <option value="" selected disabled>Select Gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="age_1" class="form-label">Age</label>
                                    <input type="number" class="form-control" name="persons[0][age]" id="age_1" min="1" required>
                                </div>
                            </div>
                        </div>

                        <button type="button" id="addPerson" class="btn btn-primary">Add Another Person</button>
                        <div class="mt-3">
                            <label for="totalCash" class="form-label">Total Cash</label>
                            <input type="text" class="form-control" id="totalCash" value="{{ $event->ticket_price }}" readonly>
                        </div>

                        <button type="submit" class="btn btn-success mt-3">Submit</button>
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
    .person-group h5 {
    font-weight: bold;
    color: #e51a80; /* Adjust the color if needed */
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
        background-color: #1F1F1F;
        border: none;
        border-radius: 10px;
        margin-bottom: 20px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        color: white;
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

<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
<script>
    $(document).ready(function () {
        let personCount = 1;
        const ticketPrice = parseFloat($('#cash').val());
        const maxTickets = {{ $event->members_limit }};

        $('#addPerson').on('click', function () {
            personCount++;
            const personHtml = `
                <div class="person-group mb-3">
                    <h5>Person ${personCount}</h5>
                    <div class="mb-3">
                        <label for="name_${personCount}" class="form-label">Name</label>
                        <input type="text" class="form-control" name="persons[${personCount - 1}][name]" id="name_${personCount}" required>
                    </div>

                    <div class="mb-3">
                        <label for="email_${personCount}" class="form-label">Email ID</label>
                        <input type="email" class="form-control" name="persons[${personCount - 1}][email]" id="email_${personCount}" required>
                    </div>

                    <div class="mb-3">
                        <label for="gender_${personCount}" class="form-label">Gender</label>
                        <select class="form-select" name="persons[${personCount - 1}][gender]" id="gender_${personCount}" required>
                            <option value="" selected disabled>Select Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="age_${personCount}" class="form-label">Age</label>
                        <input type="number" class="form-control" name="persons[${personCount - 1}][age]" id="age_${personCount}" min="1" required>
                    </div>
                </div>
            `;
            $('#personsContainer').append(personHtml);
        });

        $('#registrationForm').validate({
            submitHandler: function (form) {
                const totalPersons = $('#personsContainer .person-group').length;
                if (totalPersons > maxTickets) {
                    alert('You cannot book more than the available tickets.');
                    return false;
                }
                form.submit();
            }
        });

        $('#personsContainer').on('change keyup', 'input, select', function () {
            const totalPersons = $('#personsContainer .person-group').length;
            const totalCash = totalPersons * ticketPrice;
            $('#totalCash').val(totalCash.toFixed(2));
        });
    });
</script>
@endsection
