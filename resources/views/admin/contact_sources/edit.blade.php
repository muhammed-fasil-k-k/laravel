@extends('layouts.admin.admin')

@section('content')
    <div class="d-flex justify-content-center align-items-center min-vh-100">
        <div class="card p-4 shadow-lg" style="max-width: 450px; width: 100%;">
            <h2 class="text-center mb-4">Edit Contact Source</h2>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('admin.contact-sources.update', $contactSource->id) }}">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name" class="form-label">Source Name</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{ $contactSource->name }}" required>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('admin.contact-sources.index') }}" class="btn btn-secondary">Back</a>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection
