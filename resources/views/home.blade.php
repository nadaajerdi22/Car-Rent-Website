@extends('app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Welcome to our Car Rental website') }}</div>

                <div class="card-body">
                <div class="welcome-message">
                <h2>Welcome to Our Car Rental Service!</h2>
                        <img src="{{ asset('images/Car rental.png') }}" alt="Car Rental Image" class="img-fluid rounded mx-auto d-block" style="max-width: 50%; height: auto;">
                        <h2>Our Services</h2>
                    <p>We offer a wide range of vehicles to suit your needs, whether you're traveling for business or leisure.</p>
                    <div class="services">
                    <ul>
                        <li>Simple Reservation Request Form.</li>
                        <li>Secure Payment Process.</li>
                        <li>Convenient online booking system.</li>
                        <li>Direct Contact Form.</li>
                        <li>24/7 customer support.</li>
                    </ul>
                </div>
                <div class="testimonial-section">
                        <h2>What Our Customers Say</h2>
                        <div class="testimonial">
                            <div class="testimonial-text">
                                <p>"Great service! I rented a car for a week and it was a seamless experience. Highly recommended!"</p>
                            </div>
                            <div class="testimonial-author">
                                <p>- Nada Ajerdi</p>
                            </div>
                        </div>
                        <div class="testimonial">
                            <div class="testimonial-text">
                                <p>"Exceptional service! The car rental process was seamless. Will definitely rent from them again."</p>
                            </div>
                            <div class="testimonial-author">
                                <p>- Hiba Chtaibi</p>
                            </div>
                        </div>
            </div>
        </div>
    </div>
</div>
@endsection

<style>
.container {
    max-width: 960px;
    margin: 0 auto;
    padding: 20px;
    display: flex;
    flex-direction: column;
    align-items: center;
    background: linear-gradient(135deg, #6b8cff, #ff6b6b); 
    color: #333;
}
.navbar {
    display: flex;
    justify-content: center;
    background: #fff;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    border-radius: 10px;
    margin-bottom: 20px;
}

.navbar-nav {
    display: flex;
}
.nav-item {
    margin: 0 15px;
}

.nav-link {
    color: #333;
    font-weight: bold;
    transition: color 0.3s;
}

.nav-link:hover {
    color: #ff6b6b;
}

.card {
    background-color: #ffffff;
    border: none;
    border-radius: 15px;
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    overflow: hidden;
    margin-top: 20px;
    animation: fadeInUp 0.5s ease-in-out;
}
.card-header {
    background: linear-gradient(135deg, #6b8cff, #ff6b6b);
    color: #ffffff;
    padding: 20px;
    font-size: 1.5rem;
    font-weight: bold;
    text-align: center;
}
.card-body {
    padding: 30px;
}
.welcome-message {
    text-align: center;
}
.welcome-message img {
    max-width: 50%;
    height: auto;
    margin-bottom: 20px;
}
.welcome-message h2 {
    font-size: 2rem;
    color: #333;
    margin-top: 20px;
}
.welcome-message p {
    font-size: 1rem;
    color: #666;
    margin: 10px 0;
}
.welcome-message ul {
    list-style: none;
    padding: 0;
}
.welcome-message li {
    background: #6b8cff;
    padding: 10px;
    border-radius: 5px;
    margin: 5px 0;
    color: #fff;
    font-weight: bold;
}
.testimonial-section {
    margin-top: 30px;
}
.testimonial-section h2 {
    font-size: 1.5rem;
    color: #333;
    text-align: center;
}
.testimonial {
    background: #f8f8f8;
    padding: 20px;
    border-radius: 10px;
    margin-top: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}
.testimonial-text p {
    font-size: 1rem;
    color: #666;
    margin: 0;
}
.testimonial-author p {
    font-size: 0.9rem;
    color: #333;
    font-weight: bold;
    margin-top: 10px;
    text-align: right;
}
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
</style>