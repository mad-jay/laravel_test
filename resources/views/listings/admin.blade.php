@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Admin Dashboard</h2>
        <a href="{{ route('listings.create') }}" class="btn btn-success">Add Listing</a>
        <table class="table mt-4">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Latitude</th>
                    <th>Longtitude</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($listings as $listing)
                    <tr>
                        <td>{{ $listing->id }}</td>
                        <td>{{ $listing->name }}</td>
                        <td>{{ $listing->latitude }}</td>
                        <td>{{ $listing->longtitude }}</td>
                        <td>
                            <a href="{{ route('listings.edit', $listing->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('listings.destroy', $listing->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
