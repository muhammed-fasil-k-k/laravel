@extends('layouts.admin.admin')

@section('content')
    <div class="container mx-auto p-6">
        <h2 class="text-2xl font-bold mb-4">Leads Management</h2>
        <a href="{{ route('admin.leads.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
            Add New Lead
        </a>

        <table class="min-w-full bg-white mt-4 border">
            <thead class="bg-gray-200">
            <tr>
                <th class="px-4 py-2">ID</th>
                <th class="px-4 py-2">Name</th>
                <th class="px-4 py-2">Agent</th>
                <th class="px-4 py-2">Email</th>
                <th class="px-4 py-2">Phone</th>
                <th class="px-4 py-2">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($leads as $lead)
                <tr class="border-t">
                    <td class="px-4 py-2">{{ $lead->id }}</td>
                    <td class="px-4 py-2">{{ $lead->name }}</td>
                    <td class="px-4 py-2">{{ $lead->agent }}</td>
                    <td class="px-4 py-2">{{ $lead->email }}</td>
                    <td class="px-4 py-2">{{ $lead->phone }}</td>
                    <td class="px-4 py-2 flex space-x-2">
                        <a href="{{ route('admin.leads.edit', $lead->id) }}" class="px-3 py-1 bg-yellow-500 text-white rounded">
                            Edit
                        </a>
                        <form method="POST" action="{{ route('admin.leads.destroy', $lead->id) }}"
                              onsubmit="return confirm('Are you sure?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-3 py-1 bg-red-600 text-white rounded">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
