<?php

namespace App\Http\Services;

use App\Http\Repositories\Interfaces\CurrencyRepositoryInterface;
use App\Http\Repositories\Interfaces\StoreItemRepositoryInterface;
use App\Http\Requests\CreateStoreItemRequest;
use App\Http\Requests\UpdateStoreItemRequest;

class StoreItemService implements Interfaces\StoreItemServiceInterface
{

    protected StoreItemRepositoryInterface $storeItemRepository;

    public function __construct(StoreItemRepositoryInterface $repository)
    {
        $this->storeItemRepository = $repository;
    }

    public function getRepository(): StoreItemRepositoryInterface
    {
        return $this->storeItemRepository;
    }

    public function save(CreateStoreItemRequest $request)
    {
        #
    }

    public function update(UpdateStoreItemRequest $request, int $id)
    {
        #
    }

    public function delete(int $id)
    {
        $storeItem = $this->storeItemRepository->getById($id);
        foreach ($storeItem->storeItemPrices as $price) {
            $price->delete();
        }
        $storeItem->delete();
    }
}
