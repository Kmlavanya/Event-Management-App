{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Management System</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Event Management</a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">Register</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container text-center mt-5">
        <h1>Welcome to the Event Management System</h1>
        <p>Manage your events efficiently with our system.</p>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html> --}}


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Management System</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, rgba(0, 0, 0, 0.396), rgba(0, 0, 0, 0.555)), url("{{asset('img/eventhome1.jpg')}}") no-repeat center center fixed;
            background-size: cover;
            color: white;
            font-family: 'Arial', sans-serif;
        }
        .navbar {
            background: rgba(0, 0, 0, 0.8) !important;
        }
        .navbar-brand {
            font-size: 1.5rem;
            font-weight: bold;
        }
        .nav-link {
            color: white !important;
        }
        .container {
            margin-top: 100px;
        }
        h1 {
            font-size: 3rem;
            margin-bottom: 20px;
        }
        p {
            font-size: 1.5rem;
        }
        .btn-primary {
            background: #007bff;
            border: none;
            font-size: 1.2rem;
            padding: 10px 20px;
            border-radius: 5px;
        }
        .countdown {
            background: rgba(255, 255, 255, 0.2);
            padding: 20px;
            border-radius: 10px;
            margin-top: 30px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Event Management</a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">Register</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container text-center">
        <h1>Welcome to the Event Management System</h1>
        <p>Manage your events efficiently with our system.</p>
        <div class="countdown">
            <h3>Next Event Starts In:</h3>
            <div id="countdown">
                <span id="days">0</span> Days 
                <span id="hours">0</span> Hours 
                <span id="minutes">0</span> Minutes 
                <span id="seconds">0</span> Seconds
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        // Countdown Timer Script
        const countdown = () => {
            const countDate = new Date('July 31, 2024 18:30:00').getTime();
            const now = new Date().getTime();
            const gap = countDate - now;

            const second = 1000;
            const minute = second * 60;
            const hour = minute * 60;
            const day = hour * 24;

            const textDay = Math.floor(gap / day);
            const textHour = Math.floor((gap % day) / hour);
            const textMinute = Math.floor((gap % hour) / minute);
            const textSecond = Math.floor((gap % minute) / second);

            document.getElementById('days').innerText = textDay;
            document.getElementById('hours').innerText = textHour;
            document.getElementById('minutes').innerText = textMinute;
            document.getElementById('seconds').innerText = textSecond;
        };

        setInterval(countdown, 1000);
    </script>
</body>
</html>
