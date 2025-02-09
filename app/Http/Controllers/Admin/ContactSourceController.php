<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactSource;
use Illuminate\Http\Request;

class ContactSourceController extends Controller
{
    public function index()
    {
        $sources = ContactSource::all();
        return view('admin.contact_sources.index', compact('sources'));
    }

    public function create()
    {
        return view('admin.contact_sources.create');
    }

    public function show(ContactSource $contactSource)
    {
        return view('admin.contact_sources.show', compact('contactSource'));
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required|unique:contact_sources']);
        ContactSource::create($request->all());
        return redirect()->route('admin.contact-sources.index')->with('success', 'Source added!');
    }

    public function edit(ContactSource $contactSource)
    {
        return view('admin.contact_sources.edit', compact('contactSource'));
    }

    public function update(Request $request, ContactSource $contactSource)
    {
        $request->validate(['name' => 'required|unique:contact_sources,name,' . $contactSource->id]);
        $contactSource->update($request->all());
        return redirect()->route('admin.contact-sources.index')->with('success', 'Source updated!');
    }

    public function destroy(ContactSource $contactSource)
    {
        $contactSource->delete();
        return redirect()->route('admin.contact-sources.index')->with('success', 'Source deleted!');
    }
}
