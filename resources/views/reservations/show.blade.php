@extends('app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <h3>Reservation Details</h3>
                    <!-- Affichage des erreurs de validation -->
                    @if (session('Success'))
                        <div class="alert alert-success">
                           {{ session('Success') }}
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger">
                           {{ session('error') }}
                        </div>
                    @endif
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <strong>User:</strong>
                        @if($reservation->user)
                        <p>{{ $reservation->user->name }} ({{ $reservation->user->email }})</p>
                        @else
                            <p>User not found</p>
                        @endif
                    </div>
                    <div class="mb-3">
                        <strong>Car:</strong>
                        @if($reservation->car)
                        <p>{{ $reservation->car->make }} {{ $reservation->car->model }} ({{ $reservation->car->year }})</p>
                        @else
                        <p>Car not found</p>
                        @endif
                    </div>
                    <div class="mb-3">
                        <strong>Rental Price per Day:</strong>
                        <p>${{ $reservation->car->rental_price }}</p>
                    </div>
                    <div class="mb-3">
                        <strong>Start Date:</strong>
                        <p>{{ \Carbon\Carbon::parse($reservation->start_date)->format('d-m-Y') }}</p>                    </div>
                    <div class="mb-3">
                        <strong>End Date:</strong>
                        <p>{{ \Carbon\Carbon::parse($reservation->end_date)->format('d-m-Y') }}</p>                    </div>
                    <div class="mb-3">
                        <strong>Total Amount:</strong>
                        <p>
                            @php
                                $startDate = \Carbon\Carbon::parse($reservation->start_date);
                                $endDate = \Carbon\Carbon::parse($reservation->end_date);
                                $days = $startDate->diffInDays($endDate) + 1;
                                $total = $days * $reservation->car->rental_price;
                            @endphp
                            ${{ $total }}
                        </p>
                    </div>
                    <div class="mb-3">
                        <strong>Payments:</strong>
                        <ul>
                            @if($reservation->payments)
                            @foreach($reservation->payments as $payment)
                                <li>
                                    Amount: ${{ $payment->amount }} | Method: {{ $payment->payment_method }} | Date: {{ $payment->created_at->format('d-m-Y') }}
                                </li>
                            @endforeach
                            @endif
                        </ul>
                    </div>
                    <a href="{{ route('reservations.index') }}" class="btn btn-primary">Back to Reservations</a>
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
    color: #333; /* Couleur de texte principale */
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
    width: 100%;
}

.card-header {
    background: linear-gradient(135deg, #6b8cff, #ff6b6b);
    color: #ffffff;
    padding: 20px;
    font-size: 1.5rem;
    font-weight: bold;
    text-align: center;
    border-bottom: 5px solid #ffba00;
}

.card-body {
    padding: 30px;
}

.form-group {
    margin-bottom: 20px;
}

label {
    font-weight: bold;
    color: #333; /* Couleur de texte principale */
}

.form-control {
    border: 2px solid #6b8cff; /* Couleur de bordure modifiée pour correspondre au thème */
    border-radius: 5px;
    padding: 10px;
    width: 100%;
    box-sizing: border-box;
    transition: border-color 0.3s ease;
}

.form-control:focus {
    border-color: #ff6b6b; /* Couleur de bordure modifiée pour correspondre au thème */
    outline: none;
}

.invalid-feedback {
    color: #ff6b6b;
}

.btn {
    background-color: #6b8cff;
    color: #ffffff;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.btn:hover {
    background-color: #506eff;
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
