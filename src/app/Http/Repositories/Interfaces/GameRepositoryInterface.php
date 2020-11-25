<?php

namespace App\Http\Repositories\Interfaces;

interface GameRepositoryInterface
{
    public function getAll();

    public function getById($id);
}
