@extends('layouts.admin.admin')

@section('content')
    <div class="container mx-auto p-6">
        <div class="bg-white shadow-md rounded-lg p-6">
            <h1 class="text-2xl font-bold text-gray-800">Admin Dashboard</h1>
            <p class="mt-2 text-gray-600">
                Welcome to the Admin Panel! This CRM system is designed to efficiently manage contacts, leads, and sources for better customer relationship management.
            </p>
        </div>
        <div class="grid md:grid-cols-3 gap-6 mt-6">
            <div class="bg-blue-100 p-4 rounded-lg shadow">
                <h2 class="text-lg font-semibold text-blue-800">Contact Sources</h2>
                <p class="text-sm text-blue-700 mt-1">
                    Define and manage different sources for contacts dynamically.
                </p>
                <a href="{{ route('admin.contact-sources.index') }}" class="mt-2 inline-block px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Manage Sources</a>
            </div>
            <div class="bg-green-100 p-4 rounded-lg shadow">
                <h2 class="text-lg font-semibold text-green-800">Leads Management</h2>
                <p class="text-sm text-green-700 mt-1">
                    Add, edit, update, and delete leads. Every lead is automatically stored in the contacts table.
                </p>
                <a href="{{ route('admin.leads.index') }}" class="mt-2 inline-block px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">Manage Leads</a>
            </div>
            <div class="bg-yellow-100 p-4 rounded-lg shadow">
                <h2 class="text-lg font-semibold text-yellow-800">Contact Management</h2>
                <p class="text-sm text-yellow-700 mt-1">
                    View and manage all contacts that are created from user registrations and leads.
                </p>
                <a href="{{ route('admin.contacts.index') }}" class="mt-2 inline-block px-4 py-2 bg-yellow-600 text-white rounded hover:bg-yellow-700">View Contacts</a>
            </div>
        </div>
@endsection
