@extends('app')

@section('title', 'Edit Payment')

@section('content')
    <h1>Edit Payment</h1>
    <form action="{{ route('payments.update', $payment->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="rental_id">Rental ID:</label>
            <input type="number" name="rental_id" id="rental_id" class="form-control" value="{{ old('rental_id', $payment->rental_id) }}" required>
        </div>

        <div class="form-group">
            <label for="car_id">Car ID:</label>
            <input type="number" name="car_id" id="car_id" class="form-control" value="{{ old('car_id', $payment->car_id) }}" required>
        </div>

        <div class="form-group">
            <label for="amount">Amount:</label>
            <input type="number" name="amount" id="amount" step="0.01" class="form-control" value="{{ old('amount', $payment->amount) }}" required>
        </div>

        <div class="form-group">
            <label for="payment_method">Payment Method:</label>
            <input type="text" name="payment_method" id="payment_method" class="form-control" value="{{ old('payment_method', $payment->payment_method) }}" required>
        </div>

        <div class="form-group">
            <label for="created_at">Created At:</label>
            <input type="datetime-local" name="created_at" id="created_at" class="form-control" value="{{ old('created_at', $payment->created_at->format('Y-m-d\TH:i')) }}" required>
        </div>

        <div class="form-group">
            <label for="updated_at">Updated At:</label>
            <input type="datetime-local" name="updated_at" id="updated_at" class="form-control" value="{{ old('updated_at', $payment->updated_at->format('Y-m-d\TH:i')) }}" required>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Update Payment</button>
        </div>
    </form>
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