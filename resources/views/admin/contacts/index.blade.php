@extends('layouts.admin.admin')

@section('content')
    <div class="container mx-auto p-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-800">Contact Sources</h2>
        </div>

        <!-- Responsive Table Container -->
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <table class="min-w-full border-collapse w-full">
                <thead class="bg-gray-100 border-b">
                <tr class="text-gray-700 uppercase text-sm leading-normal">
                    <th class="py-3 px-6 text-left">ID</th>
                    <th class="py-3 px-6 text-left">Customer Name</th>
                    <th class="py-3 px-6 text-left">Email</th>
                    <th class="py-3 px-6 text-left">Phone</th>
                    <th class="py-3 px-6 text-left">Created At</th>
                    <th class="py-3 px-6 text-center">Actions</th>
                </tr>
                </thead>
                <tbody class="text-gray-600 text-sm font-light">
                @foreach ($contacts as $source)
                    <tr class="border-b border-gray-200 hover:bg-gray-50 transition duration-150">
                        <td class="py-4 px-6">{{ $source->id }}</td>
                        <td class="py-4 px-6">{{ $source->name }}</td>
                        <td class="py-4 px-6">{{ $source->email }}</td>
                        <td class="py-4 px-6">{{ $source->phone ?? 'Unknown' }}</td>
                        <td class="py-4 px-6">{{ $source->created_at->format('Y-m-d H:i:s') }}</td>
                        <td class="py-4 px-6 flex items-center justify-center">
                            <!-- Delete Button -->
                            <form method="POST" action="{{ route('admin.contacts.destroy', $source->id) }}"
                                  onsubmit="return confirm('Are you sure you want to delete this source?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="px-3 py-1 bg-red-600 text-white rounded-lg hover:bg-red-700 transition duration-200">
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
