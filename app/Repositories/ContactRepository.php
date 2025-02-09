<?php

namespace App\Repositories;

use App\Models\Contact;

class ContactRepository
{
    public function create(array $data): Contact
    {
        return Contact::create($data);
    }

    /**
     * Update an existing contact by ID.
     */
    public function update(int $id, array $data): bool
    {
        $contact = Contact::find($id);

        if ($contact) {
            return $contact->update($data);
        }

        return false;
    }

    /**
     * Get data using email id
     *
     * @param string $email
     * @return Contact|null
     */
    public function getByEmail(string $email): ?Contact
    {
        return Contact::where('email', $email)->first();
    }
}
