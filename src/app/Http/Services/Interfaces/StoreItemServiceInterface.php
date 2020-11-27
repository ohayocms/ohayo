<?php

namespace App\Http\Services\Interfaces;

use App\Http\Repositories\Interfaces\StoreItemRepositoryInterface;
use App\Http\Requests\CreateStoreItemRequest;
use App\Http\Requests\UpdateStoreItemRequest;

interface StoreItemServiceInterface
{
    public function getRepository(): StoreItemRepositoryInterface;

    public function save(CreateStoreItemRequest $request);

    public function update(UpdateStoreItemRequest $request, int $id);

    public function delete(int $id);
}
