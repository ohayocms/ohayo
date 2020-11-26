<?php

namespace App\Http\Repositories;

use App\Models\Server;
use App\Models\StoreItem;

class StoreItemRepository implements Interfaces\StoreItemRepositoryInterface
{

    public function getAll()
    {
        return StoreItem::with('storeItemPrices')->get();
    }

    public function getById(int $id)
    {
        return StoreItem::with('storeItemPrices')->where('id', $id)->first();
    }

    public function getAllServers()
    {
        return Server::with('mod.game')->get();
    }
}
