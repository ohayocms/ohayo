<?php

namespace App\Http\Repositories\Interfaces;

interface StoreItemRepositoryInterface
{
    public function getAll();

    public function getById(int $id);

    public function getAllServers();
}
