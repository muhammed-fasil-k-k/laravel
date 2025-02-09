<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lead;
use App\Services\ContactService;
use Illuminate\Http\Request;

class LeadController extends Controller
{
    const SOURCE_TYPE = 'leads';

    public function __construct(
        private readonly ContactService $contactService
    )
    {
    }

    public function index()
    {
        $leads = Lead::latest()->get();
        return view('admin.leads.index', compact('leads'));
    }

    public function create()
    {
        return view('admin.leads.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'agent' => 'required|string|max:255',
            'email' => 'required|email|unique:leads,email',
            'description' => 'nullable|string',
            'phone' => 'nullable|string|max:15',
        ]);

        Lead::create($validated);
        $this->saveToContacts($request);
        return redirect()->route('admin.leads.index')->with('success', 'Lead created successfully.');
    }

    public function edit(Lead $lead)
    {
        return view('admin.leads.edit', compact('lead'));
    }

    public function update(Request $request, Lead $lead)
    {
        $currentEmail = $lead->email;
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'agent' => 'required|string|max:255',
            'email' => 'required|email|unique:leads,email,' . $lead->id,
            'description' => 'nullable|string',
            'phone' => 'nullable|string|max:15',
        ]);

        $lead->update($validated);
        $this->saveToContacts($request,$currentEmail,$lead->id, true);
        return redirect()->route('admin.leads.index')->with('success', 'Lead updated successfully.');
    }

    public function destroy(Lead $lead)
    {
        $lead->delete();

        return redirect()->route('admin.leads.index')->with('success', 'Lead deleted successfully.');
    }

    private function saveToContacts(Request $request, string $currentEmail = null, int $contactId = null, bool $update = false): void
    {
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'id'=> $contactId,
        ];
        !$update ?
            $this->contactService->createContact(
                self::SOURCE_TYPE,
                $data
            ) :
            $this->contactService->updateContact(
                self::SOURCE_TYPE,
                $data,
                $currentEmail
            );
    }
}
