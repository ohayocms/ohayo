<?php

namespace App\Http\Repositories\Interfaces;

interface GameRepositoryInterface
{
    public function getAll();

    public function getAllWithServers();

    public function getById($id);
}
