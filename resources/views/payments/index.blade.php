@extends('app')

@section('title', 'Payments')

@section('content')
    <div class="container">
        <h1>Payments</h1>
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
        <a href="{{ route('payments.create') }}" class="btn btn-primary border-dark mb-3">Create New Payment</a>

        @if ($payments->isEmpty())
            <p>No payments found.</p>
        @else
            @foreach ($payments as $payment) 
                <div class="card border-dark mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Payment ID: {{ $payment->id }}</h5>
                        <p class="card-text">Rental ID: {{ $payment->rental_id }}</p>
                        <p class="card-text">Car ID: {{ $payment->car_id }}</p>
                        <p class="card-text">Amount: ${{ number_format($payment->amount, 2) }}</p>
                        <p class="card-text">Payment Method: {{ $payment->payment_method }}</p>
                        <p class="card-text">Created At: {{ $payment->created_at->format('Y-m-d') }}</p>
                        <p class="card-text">Updated At: {{ $payment->updated_at->format('Y-m-d') }}</p>
                        <div class="btn-group" role="group">
                            <a href="{{ route('payments.edit', $payment->id) }}" class="btn btn-warning border-dark mr-1">Edit</a>
                            <a href="{{ route('payments.show', $payment->id) }}" class="btn btn-info border-dark mr-1">View</a>
                            <form action="{{ route('payments.destroy', $payment->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger border-dark">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
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
    border: 2px solid #6b8cff; /* Bordure */
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
