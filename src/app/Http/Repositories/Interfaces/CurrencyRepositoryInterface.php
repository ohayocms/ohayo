<?php

namespace App\Http\Repositories\Interfaces;

interface CurrencyRepositoryInterface
{
    public function getAll();

    public function getById(int $id);
}
