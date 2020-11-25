<?php

namespace App\Http\Repositories\Interfaces;

interface ServerRepositoryInterface
{

    public function getAll();

    public function getById(int $id);

}
