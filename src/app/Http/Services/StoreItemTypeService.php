<?php

namespace App\Http\Services;

use App\Http\Repositories\Interfaces\StoreItemTypeRepositoryInterface;
use App\Http\Requests\CreateStoreItemTypeRequest;
use App\Http\Requests\UpdateStoreItemTypeRequest;
use App\Models\StoreItemType;
use App\Models\StoreItemTypeVariable;

class StoreItemTypeService implements Interfaces\StoreItemTypeServiceInterface
{

    protected StoreItemTypeRepositoryInterface $storeItemTypeRepository;

    public function __construct(StoreItemTypeRepositoryInterface $repository)
    {
        $this->storeItemTypeRepository = $repository;
    }

    public function getRepository(): StoreItemTypeRepositoryInterface
    {
        return $this->storeItemTypeRepository;
    }

    public function save(CreateStoreItemTypeRequest $request)
    {
        $storeItemType = StoreItemType::create($request->all());

        if ($request->get('storeItemVariablesNames')) {
            foreach ($request->get('storeItemVariablesNames') as $key => $storeItemVariableName) {
                StoreItemTypeVariable::create([
                    'store_item_type_id' => $storeItemType->id,
                    'name' => $storeItemVariableName,
                    'value' => $request->get('storeItemVariablesValues')[$key],
                ]);
            }
        }
    }

    public function update(UpdateStoreItemTypeRequest $request, int $id)
    {
        $storeItemType = $this->getRepository()->getById($id);
        $storeItemType->update($request->all());

        foreach ($storeItemType->storeItemTypeVariables as $variable) {
            $variable->delete();
        }

        if ($request->get('storeItemVariablesNames')) {
            foreach ($request->get('storeItemVariablesNames') as $key => $storeItemVariableName) {
                StoreItemTypeVariable::create([
                    'store_item_type_id' => $storeItemType->id,
                    'name' => $storeItemVariableName,
                    'value' => $request->get('storeItemVariablesValues')[$key],
                ]);
            }
        }
    }

    public function delete(int $id)
    {
        // TODO: Implement delete() method.
    }
}
