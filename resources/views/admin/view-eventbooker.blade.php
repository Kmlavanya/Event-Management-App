@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2 col-12 sidebar">
            <div class="current-plan">Dashboard</div>
            <a href="{{ route('admin.view-users') }}" class="list-group-item list-group-item-action {{ request()->is('admin/view-users') ? 'active' : '' }}">
                <i class="fas fa-users"></i> View Users
            </a>
            <a href="{{ route('admin.add-event') }}" class="list-group-item list-group-item-action {{ request()->is('admin/add-event') ? 'active' : '' }}">
                <i class="fas fa-calendar-plus"></i> Add Event
            </a>
            <a href="{{ route('admin.view-events') }}" class="list-group-item list-group-item-action {{ request()->is('admin/view-events') ? 'active' : '' }}">
                <i class="fas fa-calendar"></i> View Events
            </a>
        </div>
        <div class="col-md-10 col-12 main-panel offset-md-2">
            <div class="card">
                @if (session('success'))
                    <div class="alert alert-success" role="alert"> 
                        {{ session('success') }}
                    </div>
                @endif
  
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="card-header">
                    Ticket Booked for {{ $event->name }}
                </div>

                <div class="card-body">
                    <form action="{{ route('users.import') }}" method="POST" enctype="multipart/form-data" class="mb-4">
                        @csrf
                        <input type="hidden" name="event_id" value="{{ $event->id }}">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <input type="file" name="file" class="form-control">
                            </div>
                            <div class="col-md-6 text-md-end">
                                <button type="submit" class="btn btn-success"><i class="fa fa-file"></i> Import User Data</button>
                                <a class="btn btn-warning ms-2" href="{{ route('users.export') }}"><i class="fa fa-download"></i> Export User Data</a>
                            </div>
                        </div>
                    
                        <div class="table-responsive">
                            <table class="table table-bordered" id="bookers-table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Event No</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Gender</th>
                                        <th>Age</th>
                                        <th>Cash</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- DataTables will populate this -->
                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Include jQuery and DataTables libraries -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>

<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">

<script>
    $(document).ready(function() {
        $('#bookers-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route('admin.fetchEventBookers', $event->id) }}',
            columns: [
                { data: null, name: 'DT_RowIndex', render: function (data, type, row, meta) {
                    return meta.row + 1;
                }, orderable: false, searchable: false },
                { data: 'event_id', name: 'event_id' }, // Ensure this matches your backend response
                { data: 'name', name: 'name' },
                { data: 'email', name: 'email' },
                { data: 'gender', name: 'gender' },
                { data: 'age', name: 'age' },
                { data: 'cash', name: 'cash' }
            ],
            order: [[0, 'asc']]
        });
    });
</script>

<style>
    body, html {
        height: 100%;
        margin: 0;
        font-family: Arial, sans-serif;
        background-color: #121212; 
        color: #FFFFFF; 
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
        background-color: #0f0e0e; 
        height: 100vh;
        overflow-y: auto;
    }
    .card {
        background-color: #ffffff; 
        color: #000000; 
        border: none;
        border-radius: 10px;
        margin-bottom: 20px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }
    .card-header, .card-body {
        color: #000000; 
    }
    .table-responsive {
        overflow-x: auto;
    }
    #bookers-table {
        width: 100%;
        background-color: #ffffff; 
        color: #000000;
    }
    #bookers-table th, #bookers-table td {
        text-align: center;
    }
    @media (max-width: 768px) {
        .sidebar {
            position: relative;
            height: auto;
            box-shadow: none;
        }
        .main-panel {
            margin-left: 0;
        }
    }
</style>
@endsection
