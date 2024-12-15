@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit Listing</h2>
        <form method="POST" action="{{ route('listings.update', $listing->id) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $listing->name) }}" required>
            </div>
            <div class="form-group">
                <label for="latitude">Latitude:</label>
                <input type="text" name="latitude" class="form-control" value="{{ old('latitude', $listing->latitude) }}" required>
            </div>
            <div class="form-group">
                <label for="longitude">Longitude:</label>
                <input type="text" name="longitude" class="form-control" value="{{ old('longtitude', $listing->longtitude) }}" required>
            </div>
            <button type="submit" class="btn btn-warning">Update Listing</button>
        </form>
    </div>
@endsection
