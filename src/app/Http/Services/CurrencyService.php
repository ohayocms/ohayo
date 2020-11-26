<?php

namespace App\Http\Services;

use App\Http\Repositories\Interfaces\CurrencyRepositoryInterface;
use App\Http\Requests\CreateCurrencyRequest;
use App\Http\Requests\UpdateCurrencyRequest;
use App\Models\Currency;

class CurrencyService implements Interfaces\CurrencyServiceInterface
{

    protected CurrencyRepositoryInterface $currencyRepository;

    public function __construct(CurrencyRepositoryInterface $repository)
    {
        $this->currencyRepository = $repository;
    }

    public function getRepository(): CurrencyRepositoryInterface
    {
        return $this->currencyRepository;
    }

    public function save(CreateCurrencyRequest $request)
    {
        Currency::create($request->all());
    }

    public function update(UpdateCurrencyRequest $request, int $id)
    {
        $currency = $this->currencyRepository->getById($id);
        $currency->update($request->all());
    }

    public function delete(int $id)
    {
        $currency = $this->currencyRepository->getById($id);
        $currency->delete();
    }
}
