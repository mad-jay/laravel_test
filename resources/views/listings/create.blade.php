@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Add New Listing</h2>
        <form method="POST" action="{{ route('listings.store') }}">
            @csrf
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="latitude">Latitude:</label>
                <input type="text" name="latitude" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="longitude">Longitude:</label>
                <input type="text" name="longtitude" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success">Add Listing</button>
        </form>
    </div>
@endsection
