<?php

namespace App\Http\Repositories\Interfaces;

interface OrderRepositoryInterface
{
    public function getAll();

    public function getById(int $id);
}
