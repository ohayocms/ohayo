<?php

namespace App\Http\Repositories\Interfaces;

interface StoreItemTypeRepositoryInterface
{
    public function getAll();

    public function getById(int $id);

    public function getAllGames();

    public function getAllConnectionsWithTables();
}
