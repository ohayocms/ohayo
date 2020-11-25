<?php

namespace App\Http\Repositories\Interfaces;

interface ModRepositoryInterface
{
    public function getAll();

    public function getById(int $id);
}
