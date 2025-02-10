<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Car Rental</title>
    <style>
        nav.navbar ul {
            list-style: none;
            padding: 0;
            display: flex;
            justify-content: center;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        nav.navbar li {
            margin: 0 10px;
        }

        nav.navbar a {
            text-decoration: none;
            padding: 10px 20px;
            border: 2px solid var(--primary-color); 
            border-radius: 5px;
            color: var(--text-color); 
            background-color: var(--primary-color); 
            font-weight: bold;
            transition: background-color 0.3s, color 0.3s;
        }

        nav.navbar a:hover {
            background-color: var(--primary-hover-color); 
        }
    </style>
</head>
<body>
    <header>
        <nav class="navbar">
            <ul>
            <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('cars.index') }}">Cars</a></li>
                <li><a href="{{ route('payments.index') }}">Payments</a></li>
                <li><a href="{{ route('reservations.index') }}">Reservations</a></li>
                <li><a href="{{ route('contact') }}">Contact</a></li>
            </ul>
        </nav>
    </header>

    <div class="container">
        @yield('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="box-container">
                <div class="box">
                    <h3>Contact</h3>
                    <p><i class="fa-solid fa-phone"></i> +212 767-490069 </p>
                    <p><i class="fa-solid fa-envelope"></i> nadaajerdi291@gmail.com </p>
                    <p><i class="fa-solid fa-location-dot"></i> Rabat, Morocco - 21000 </p>
                </div>

                <div class="box">
                    <h3>Find Us On</h3>
                    <a href="#"><i class="fa-brands fa-facebook"></i> Facebook</a>
                    <a href="#"><i class="fa-brands fa-instagram"></i> Instagram</a>
                    <a href="#"><i class="fa-brands fa-youtube"></i> YouTube</a>
                    <a href="#"><i class="fa-brands fa-twitter"></i> Twitter</a>
                    <a href="#"><i class="fa-brands fa-linkedin"></i> LinkedIn</a>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
