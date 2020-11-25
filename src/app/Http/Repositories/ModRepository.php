<?php

namespace App\Http\Repositories;

use App\Models\Mod;

class ModRepository implements Interfaces\ModRepositoryInterface
{

    public function getAll()
    {
        return Mod::all();
    }

    public function getById(int $id)
    {
        return Mod::findOrFail($id);
    }
}
