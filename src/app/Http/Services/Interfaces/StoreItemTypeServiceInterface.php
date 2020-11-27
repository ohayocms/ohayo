<?php

namespace App\Http\Services\Interfaces;

use App\Http\Repositories\Interfaces\StoreItemTypeRepositoryInterface;
use App\Http\Requests\CreateStoreItemTypeRequest;
use App\Http\Requests\UpdateStoreItemTypeRequest;

interface StoreItemTypeServiceInterface
{
    public function getRepository(): StoreItemTypeRepositoryInterface;

    public function save(CreateStoreItemTypeRequest $request);

    public function update(UpdateStoreItemTypeRequest $request, int $id);

    public function delete(int $id);
}
