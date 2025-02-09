@extends('layouts.admin.admin')

@section('content')
    <div class="container mx-auto p-6">
        <h2 class="text-xl font-bold mb-4">Add New Lead</h2>

        <form action="{{ route('admin.leads.store') }}" method="POST" class="bg-white p-6 rounded shadow-md">
            @csrf

            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-semibold">Customer Name:</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}"
                       class="w-full border border-gray-300 p-2 rounded" required>
            </div>

            <div class="mb-4">
                <label for="agent" class="block text-gray-700 font-semibold">Agent Name:</label>
                <input type="text" name="agent" id="agent" value="{{ old('agent') }}"
                       class="w-full border border-gray-300 p-2 rounded" required>
            </div>

            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-semibold">Email:</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}"
                       class="w-full border border-gray-300 p-2 rounded" required>
            </div>

            <div class="mb-4">
                <label for="phone" class="block text-gray-700 font-semibold">Phone:</label>
                <input type="text" name="phone" id="phone" value="{{ old('phone') }}"
                       class="w-full border border-gray-300 p-2 rounded">
            </div>

            <div class="mb-4">
                <label for="description" class="block text-gray-700 font-semibold">Description:</label>
                <textarea name="description" id="description"
                          class="w-full border border-gray-300 p-2 rounded" rows="4">{{ old('description') }}</textarea>
            </div>

            <div class="flex justify-between">
                <!-- Save Button -->
                <button type="submit" class="px-4 py-2 bg-gray-600 text-white rounded hover:bg-gray-700">
                    Save Lead
                </button>

                <!-- Cancel Button -->
                <a href="{{ route('admin.leads.index') }}" class="px-4 py-2 bg-green-600 rounded hover:bg-green-700 ">
                    Cancel
                </a>
            </div>
        </form>
    </div>
@endsection
