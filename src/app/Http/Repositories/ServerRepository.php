<?php

namespace App\Http\Repositories;

use App\Models\Server;

class ServerRepository implements Interfaces\ServerRepositoryInterface
{

    public function getAll()
    {
        return Server::all();
    }

    public function getById(int $id)
    {
        return Server::findOrFail($id);
    }
}
