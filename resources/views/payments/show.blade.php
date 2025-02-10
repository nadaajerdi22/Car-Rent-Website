@extends('app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1>Payment Details</h1>
            </div>
            <div class="card-body">
                <p>ID: {{ $payment->id }}</p>
                <p>Rental ID: {{ $payment->rental_id }}</p>
                <p>Car ID: {{ $payment->car_id }}</p>
                <p>Amount: ${{ $payment->amount }}</p>
                <p>Payment Method: {{ $payment->payment_method }}</p>
                <p>Created At: {{ $payment->created_at }}</p>
                <p>Updated At: {{ $payment->updated_at }}</p>
                
                <div class="d-flex justify-content-center">
                    <a href="{{ route('payments.edit', $payment->id) }}" class="btn btn-dark border-dark mr-2">Edit</a>
                    <form action="{{ route('payments.destroy', $payment->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger border">Delete</button>
                    </form>
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

.card-body p {
    margin: 10px 0;
    font-size: 1.1rem;
}

.button-container {
    display: flex;
    justify-content: center;
    gap: 10px;
    margin-top: 20px;
}

.btn {
    background-color: #6b8cff;
    color: #ffffff;
    padding: 10px 20px;
    border: 2px solid transparent;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease, border-color 0.3s ease;
    text-decoration: none;
    display: inline-block;
}

.btn-warning {
    background-color: #ffc107;
    border-color: #ffc107;
}

.btn-danger {
    background-color: #dc3545;
    border-color: #dc3545;
}

.btn:hover {
    background-color: #ffffff;
    color: inherit;
}

.btn-warning:hover {
    background-color: #ffffff;
    border-color: #ffc107;
    color: #ffc107;
}

.btn-danger:hover {
    background-color: #ffffff;
    border-color: #dc3545;
    color: #dc3545;
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