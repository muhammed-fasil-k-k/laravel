@extends('layouts.admin.admin')

@section('content')
    <div class="container mx-auto p-6">
        <h2 class="text-xl font-bold mb-4">Edit Lead</h2>

        <form action="{{ route('admin.leads.update', $lead->id) }}" method="POST" class="bg-white p-6 rounded shadow-md">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="name" class="block text-gray-700">Customer Name:</label>
                <input type="text" name="name" id="name" value="{{ old('name', $lead->name) }}"
                       class="w-full border border-gray-300 p-2 rounded" required>
            </div>

            <div class="mb-4">
                <label for="agent" class="block text-gray-700">Agent:</label>
                <input type="text" name="agent" id="agent" value="{{ old('agent', $lead->agent) }}"
                       class="w-full border border-gray-300 p-2 rounded" required>
            </div>

            <div class="mb-4">
                <label for="email" class="block text-gray-700">Email:</label>
                <input type="email" name="email" id="email" value="{{ old('email', $lead->email) }}"
                       class="w-full border border-gray-300 p-2 rounded" required>
            </div>

            <div class="mb-4">
                <label for="phone" class="block text-gray-700">Phone:</label>
                <input type="text" name="phone" id="phone" value="{{ old('phone', $lead->phone) }}"
                       class="w-full border border-gray-300 p-2 rounded">
            </div>

            <div class="mb-4">
                <label for="description" class="block text-gray-700">Description:</label>
                <textarea name="description" id="description"
                          class="w-full border border-gray-300 p-2 rounded" rows="4">{{ old('description', $lead->description) }}</textarea>
            </div>

            <div class="flex justify-between">
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                    Update Lead
                </button>

                <a href="{{ route('admin.leads.index') }}" class="px-4 py-2 bg-gray-600 text-white rounded hover:bg-gray-700">
                    Cancel
                </a>
            </div>
        </form>

        <form action="{{ route('admin.leads.destroy', $lead->id) }}" method="POST" class="mt-4"
              onsubmit="return confirm('Are you sure you want to delete this lead?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">
                Delete Lead
            </button>
        </form>
    </div>
@endsection
