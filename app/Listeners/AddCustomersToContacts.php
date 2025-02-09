<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Registered;
use App\Services\ContactService;
class AddCustomersToContacts
{
    const SOURCE_TYPE = 'account';

    public function __construct(
        private ContactService $contactService
    )
    {
    }

    /**
     * Handle the event.
     */
    public function handle(Registered $event): void
    {
        $user = $event->user;
        $this->contactService->createContact(
            self::SOURCE_TYPE,
            [
                'name' => $user->name,
                'email' => $user->email,
                'phone' => $user->phone,
            ]
        );
    }
}
