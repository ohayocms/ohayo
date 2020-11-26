<?php

namespace App\Http\Repositories;

use App\Models\StoreItemType;

class StoreItemTypeRepository implements Interfaces\StoreItemTypeRepositoryInterface
{

    public function getAll()
    {
        StoreItemType::with('storeItemTypeVariables')->get();
    }

    public function getById(int $id)
    {
        StoreItemType::with('storeItemTypeVariables')->where('id', $id)->get();
    }
}
