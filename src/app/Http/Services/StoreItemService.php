<?php

namespace App\Http\Services;

use App\Http\Repositories\Interfaces\CurrencyRepositoryInterface;
use App\Http\Repositories\Interfaces\StoreItemRepositoryInterface;
use App\Http\Requests\CreateStoreItemRequest;
use App\Http\Requests\UpdateStoreItemRequest;
use App\Models\StoreItem;
use App\Models\StoreItemPrice;
use Illuminate\Http\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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
        $image = Storage::putFile('goods', new File($request->file('image')), 'public');
        $isCountable = 0;
        if($request->get('is_countable')) {
               $isCountable = 1;
        }
        $storeItem = StoreItem::create(array_merge($request->all(), ['image' => $image], ['is_countable' => $isCountable]));

        foreach ($request->get('priceCurrency') as $key => $price) {
            StoreItemPrice::create([
                'store_item_id' => $storeItem->id,
                'currency_id' => $key,
                'value' => $price,
            ]);
        }
    }

    public function update(UpdateStoreItemRequest $request, int $id)
    {
        $storeItem = $this->storeItemRepository->getById($id);
        $isCountable = 0;
        if($request->get('is_countable')) {
            $isCountable = 1;
        }
        $image = $storeItem->image;
        if ($request->file('image')) {
            $image = Storage::putFile('games', new File($request->file('image')), 'public');
        }

        $storeItem->update(array_merge($request->all(), [
            'image' => $image,
        ], [
            'is_countable' => $isCountable,
        ]));

        foreach ($storeItem->storeItemPrices as $price) {
            $price->delete();
        }

        foreach ($request->get('priceCurrency') as $key => $price) {
            StoreItemPrice::create([
                'store_item_id' => $storeItem->id,
                'currency_id' => $key,
                'value' => $price,
            ]);
        }
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
