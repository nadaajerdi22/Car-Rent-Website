@extends('app')

@section('content')
    <div class="container">
        <h1>Reservations List</h1>
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
        <a href="{{ route('reservations.create') }}">Add New Reservation</a>
        @foreach ($reservations as $reservation)
            <div class="card border-dark">
                <div class="card-body">
                    <h2>Reservation for {{ $reservation->car->make }} {{ $reservation->car->model }}</h2>
                    <p>From: {{ $reservation->start_date }}</p>
                    <p>To: {{ $reservation->end_date }}</p>
                    <div class="button-group d-flex justify-content-center">
                        <a href="{{ route('reservations.show', $reservation->id) }}" class="btn btn-primary border-dark mr-2">Show</a>
                        <a href="{{ route('reservations.edit', $reservation->id) }}" class="btn btn-dark border-dark mr-2">Edit</a>
                        <form action="{{ route('reservations.destroy', $reservation->id) }}" method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger border-dark">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
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
