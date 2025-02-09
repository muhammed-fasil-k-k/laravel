@extends('layouts.admin.admin')

@section('content')
    <div class="container mx-auto p-6">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-bold">Contact Sources</h2>
            <a href="{{ route('admin.contact-sources.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                Add New Source
            </a>
        </div>

        <!-- Grid Display -->
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 shadow-md rounded-lg">
                <thead class="bg-gray-200">
                <tr>
                    <th class="px-4 py-2 text-left">ID</th>
                    <th class="px-4 py-2 text-left">Name</th>
                    <th class="px-4 py-2 text-left">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($sources as $source)
                    <tr class="border-t border-gray-200">
                        <td class="px-4 py-2">{{ $source->id }}</td>
                        <td class="px-4 py-2">{{ $source->name }}</td>
                        <td class="px-4 py-2 flex space-x-2">
                            <!-- Edit Button -->
                            <a href="{{ route('admin.contact-sources.edit', $source->id) }}"
                               class="px-3 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600">
                                Edit
                            </a>

                            <!-- Delete Form with Confirmation -->
                            <form method="POST" action="{{ route('admin.contact-sources.destroy', $source->id) }}" onsubmit="return confirm('Are you sure you want to delete this source?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
