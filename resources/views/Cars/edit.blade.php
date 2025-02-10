@extends('views.app')

@section('content')
    <h1>Edit Car</h1>

    <form action="{{ route('cars.update', $car->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="make">Make:</label>
            <input type="text" name="make" id="make" value="">
        </div>
        <div>
            <label for="model">Model:</label>
            <input type="text" name="model" id="model" value="">
        </div>
        <div>
            <label for="year">Year:</label>
            <input type="text" name="year" id="year" value="">
        </div>
        <div>
            <label for="price_per_day">Price per day:</label>
            <input type="text" name="price_per_day" id="price_per_day" value="">
        </div>
        <button type="submit">Edit</button>
        <button type="submit">Delete</button>
        <button type="submit">Save</button>
        <button type="submit">Add</button>

    </form>
@endsection
