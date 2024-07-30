@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2 sidebar">
            <div class="current-plan">Dashboard</div>
            <a href="{{ route('admin.view-users') }}" class="list-group-item list-group-item-action">
                <i class="fas fa-users"></i> View Users
            </a>
            <a href="#" class="list-group-item list-group-item-action">
                <i class="fas fa-calendar-plus"></i> Add Event
            </a>
            <a href="#" class="list-group-item list-group-item-action">
                <i class="fas fa-calendar"></i> View Event
            </a>
            <a href="#" class="list-group-item list-group-item-action">
                <i class="fas fa-user-check"></i> View Event Booker
            </a>
        </div>
        <div class="col-md-10 main-panel">
            <div class="card">
                <div class="card-header">View Users</div>
                <div class="card-body">
                    <table class="table table-bordered table-striped" id="users-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>
<script>
$(document).ready(function() {
    $('#users-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('admin.view-users') }}",
        columns: [
            { data: 'id', name: 'id' },
            { data: 'name', name: 'name' },
            { data: 'email', name: 'email' },
            { data: 'role', name: 'role' }
        ]
    });
});
</script>
@endpush

<style>
    .container-fluid {
        height: 100%;
    }
    .sidebar {
        background-color: #343a40;
        padding: 20px;
        height: 100vh;
        box-shadow: 2px 0 5px rgba(0,0,0,0.1);
        border-radius: 5px;
        position: fixed;
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
    .table-responsive {
        overflow-x: auto;
    }
    .table {
        width: 100%;
        max-width: 100%;
        margin-bottom: 1rem;
        background-color: transparent;
    }
    .table th,
    .table td {
        padding: 0.75rem;
        vertical-align: top;
        border-top: 1px solid #dee2e6;
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
