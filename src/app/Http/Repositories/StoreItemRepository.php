<?php

namespace App\Http\Repositories;

use App\Models\Currency;
use App\Models\Server;
use App\Models\StoreItem;
use App\Models\StoreItemType;

class StoreItemRepository implements Interfaces\StoreItemRepositoryInterface
{

    public function getAll()
    {
        return StoreItem::with('storeItemPrices')->get();
    }

    public function getById(int $id)
    {
        return StoreItem::with('storeItemPrices.currency')->where('id', $id)->first();
    }

    public function getAllServers()
    {
        return Server::with('mod.game')->get();
    }

    public function getAllStoreItemTypesByGameId(int $gameId)
    {
        return StoreItemType::with('game')->where('game_id', $gameId)->get();
    }

    public function getAllCurrencies()
    {
        return Currency::all();
    }

    public function getAllWithServer()
    {
        return StoreItem::with('storeItemPrices')->with('server')->get();
    }
}
