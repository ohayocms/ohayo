<?php

namespace App\Http\Services\Interfaces;

use App\Http\Repositories\Interfaces\CurrencyRepositoryInterface;
use App\Http\Requests\CreateCurrencyRequest;
use App\Http\Requests\UpdateCurrencyRequest;

interface CurrencyServiceInterface
{
    public function getRepository(): CurrencyRepositoryInterface;

    public function save(CreateCurrencyRequest $request);

    public function update(UpdateCurrencyRequest $request, int $id);

    public function delete(int $id);
}
