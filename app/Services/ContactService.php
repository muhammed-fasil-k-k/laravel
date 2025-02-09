<?php

namespace App\Services;

use App\Models\ContactSource;
use App\Repositories\ContactRepository;
use InvalidArgumentException;

class ContactService
{
    protected ContactRepository $repository;

    public function __construct(ContactRepository $repository)
    {
        $this->repository = $repository;
    }

    public function createContact(string $source, array $data): bool
    {
        $validSources = ContactSource::pluck('name')->toArray();

        if (!in_array($source, $validSources)) {
            return false;
        }

        $data['source'] = $source;
        $this->repository->create($data);
        return true;
    }

    public function updateContact(string $source, array $data, string $userEmail): bool
    {
        $validSources = ContactSource::pluck('name')->toArray();

        if (!in_array($source, $validSources)) {
            return false;
        }

        $data['source'] = $source;
        $id = $this->repository->getByEmail($userEmail)->id;
        $this->repository->update($id,$data);
        return true;
    }
}
