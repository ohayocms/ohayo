<?php

namespace App\Http\Repositories\Interfaces;

interface StoreItemRepositoryInterface
{
    public function getAll();

    public function getAllWithServer();

    public function getById(int $id);

    public function getAllServers();

    public function getAllStoreItemTypesByGameId(int $gameId);

    public function getAllCurrencies();
}
