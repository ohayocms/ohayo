<?php

namespace App\Http\Repositories\Interfaces;

interface ServerRepositoryInterface
{

    public function getAll();

    public function getById(int $id);

    public function getAllAvailableMods();

    public function getByGameId(int $id);

    public function getAllAvailableGames();

    public function getByGameIdAndModId(int $gameId, int $modId);

}
