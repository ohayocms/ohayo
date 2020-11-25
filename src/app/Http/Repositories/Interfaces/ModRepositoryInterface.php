<?php

namespace App\Http\Repositories\Interfaces;

interface ModRepositoryInterface
{
    public function getAll();

    public function getAllAvailableGames();

    public function getById(int $id);
}
