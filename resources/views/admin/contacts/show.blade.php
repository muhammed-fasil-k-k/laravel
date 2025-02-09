@extends('layouts.admin.admin')

@section('content')
    <div class="container">
        <h1>Contact Details</h1>

        <p><strong>Name:</strong> {{ $contact->name }}</p>
        <p><strong>Email:</strong> {{ $contact->email }}</p>
        <p><strong>Phone:</strong> {{ $contact->phone }}</p>

        <a href="{{ route('admin.contacts.edit', $contact) }}" class="btn btn-warning">Edit</a>
        <form action="{{ route('admin.contacts.destroy', $contact) }}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
        </form>
    </div>
@endsection
