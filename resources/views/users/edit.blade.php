@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Edit User Profile</h1>

        <div class="card">
            <div class="card-header">Update User Information</div>
            <div class="card-body">
                <form action="/users/update/{{ $user->id }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Name:</label>
                        <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email:</label>
                        <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Update Changes</button>
                    <a href="/users" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
@endsection
