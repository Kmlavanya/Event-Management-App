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
            background: rgb(27,0,36);
            background: linear-gradient(90deg, rgba(27,0,36,0.8688725490196079) 0%, rgba(26,9,121,1) 35%, rgba(4,207,249,1) 100%);
            color: #ffffff;
            font-family: 'Arial', sans-serif;
        }
        .navbar {
            background: #343a40 !important;
        }
        .navbar-brand {
            font-size: 1.5rem;
            font-weight: bold;
            color: white !important;
        }
        .nav-link {
            color: white !important;
        }
        .carousel, .carousel-inner, .carousel-item {
            height: 100vh; /* Full viewport height */
        }
        .carousel-item {
            position: relative;
            height: 100vh; /* Full viewport height */
            background: linear-gradient(to right, rgba(0, 0, 0, 0.396), rgba(0, 0, 0, 0.555)),
                        url('{{ asset('img/eventhome1.jpg') }}') no-repeat center center;
            background-size: cover; /* Ensure the image covers the container */
        }
        .carousel-item img {
            display: none; /* Hide the image as it's being used as a background */
        }
        .carousel-caption {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
            text-align: center;
            z-index: 2; 
            padding: 20px;
            border-radius: 5px;
            
        }
        .container {
            margin-top: 50px;
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
        .about, .services, .contact {
            padding: 50px 0;
        }
        .about {
            background: rgb(27,0,36);
            background: linear-gradient(90deg, rgba(27,0,36,0.8688725490196079) 0%, rgba(26,9,121,1) 35%, rgba(4,207,249,1) 100%);
            padding: 40px 0,
        }
        .about h2 {
            font-size: 2.5rem;
            color: #fefefe;
            font-weight: bold;
            margin-bottom: 30px;
        }
        .about p {
            font-size: 1.2rem;
            line-height: 1.6;
            color: #ffffffd8;
            font-weight: bold;
        }
        .about img {
            max-width: 100%;
            height: auto;
            border: 5px solid #37383932;
            border-radius: 100%;
            margin-top: 20px;
        }
        .services {
            background: rgb(27,0,36);
            background: linear-gradient(90deg, rgba(27,0,36,0.8688725490196079) 0%, rgba(26,9,121,1) 35%, rgba(4,207,249,1) 100%);
            padding: 30px 0;
        }
        .services h2 {
            font-size: 2.5rem;
            margin-bottom: 30px;
            color: #fcfdff;
        }
        .service-card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
            color:#343a40;
        }
        .service-card img {
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }
        .service-card:hover {
            transform: scale(1.05);
        }
        .contact{
            padding: 30px 0;
        }
        .contact-form {
            max-width: 600px;
            margin: auto;
        }
        .contact h2 {
            font-size: 2.5rem;
            margin-bottom: 30px;
            color: #f4f6f8;
        }
        .contact-form .form-control {
            border-radius: 5px;
            margin-bottom: 15px;
        }
        .contact-form .btn-primary {
            font-size: 1.2rem;
            padding: 12px 24px;
            border-radius: 5px;
        }
        @media (min-width: 768px) {
            .about .row {
                gap: 30px; /* Space between image and content */
            }
            .services .row {
                gap: 20px; /* Space between service cards */
            }
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Event Management</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#services">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contact">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">Register</a>
                </li>
            </ul>
        </div>
    </nav>

    <div id="home" class="container-fluid p-0">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active" style="background: linear-gradient(to right, rgba(0, 0, 0, 0.396), rgba(0, 0, 0, 0.555)), url('{{ asset('img/eventhome1.jpg') }}') no-repeat center center; background-size: cover;">
                    <div class="carousel-caption">
                        <h3>Welcome to the World's best Event planning website</h3>
                    </div>
                </div>
                <div class="carousel-item" style="background: linear-gradient(to right, rgba(0, 0, 0, 0.396), rgba(0, 0, 0, 0.555)), url('{{ asset('img/eventhome2.jpg') }}') no-repeat center center; background-size: cover;">
                    <div class="carousel-caption">
                        <h3>Happiness is the key to success. Come out and enjoy the concert</h3>
                    </div>
                </div>
                <div class="carousel-item" style="background: linear-gradient(to right, rgba(0, 0, 0, 0.396), rgba(0, 0, 0, 0.555)), url('{{ asset('img/eventhome3.jpg') }}') no-repeat center center; background-size: cover;">
                    <div class="carousel-caption">
                        <h3>Don't limit yourself, grab tickets by logging in</h3>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>

    <div id="about" class="about py-5">
        <div class="container text-center">
            <h2 class="font-weight-bold mb-4">About Us</h2>
        </div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-5">
                    <p class="lead font-weight-bold">Our Event Management System is designed to streamline the process of organizing and managing events. We provide tools and features to help you plan, execute, and analyze your events with ease. Our goal is to deliver a seamless experience from start to finish, ensuring that every detail is perfect.</p>
                </div>
                <div class="col-md-5 text-center">
                    <img src="{{ asset('img/about-image.jpg') }}" class="img-fluid" alt="About Us">
                </div>
            </div>
        </div>
    </div>

    <div id="services" class="services text-center py-5">
        <div class="container">
            <h2 class="font-weight-bold mb-4">Our Services</h2>
            <div class="row">
                <div class="col-sm-3">
                    <div class="card service-card mb-4">
                        <img src="{{ asset('img/service1.jpeg') }}" class="card-img-top" alt="Event Planning">
                        <div class="card-body">
                            <h3 class="card-title">Event Planning</h3>
                            <p class="card-text">Comprehensive planning services to ensure your event's success.</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="card service-card mb-4">
                        <img src="{{ asset('img/service2.jpg') }}" class="card-img-top" alt="Event Execution">
                        <div class="card-body">
                            <h3 class="card-title">Event Execution</h3>
                            <p class="card-text">Seamless execution of events with our team success.</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="card service-card mb-4">
                        <img src="{{ asset('img/service3.jpg') }}" class="card-img-top" alt="Post-Event Analysis">
                        <div class="card-body">
                            <h3 class="card-title">Event Analysis</h3>
                            <p class="card-text">Analysis to help you understand the impact of your event.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="contact" class="contact text-center py-5">
        <div class="container">
            <h2 class="font-weight-bold mb-4">Contact Us</h2>
            <form class="contact-form">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter your name">
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter your email">
                </div>
                <div class="form-group">
                    <label for="reason">Reason for Contacting:</label>
                    <textarea class="form-control" id="reason" rows="3" placeholder="Enter your reason for contacting us"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        // Countdown Timer Script
        const countdown = () => {
            const countDate = new Date('August 3, 2024 18:30:00').getTime();
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

