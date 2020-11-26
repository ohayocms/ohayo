<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Repositories\Interfaces\StoreItemTypeRepositoryInterface;
use App\Http\Requests\CreateStoreItemTypeRequest;
use App\Http\Requests\UpdateStoreItemTypeRequest;
use App\Http\Services\Interfaces\StoreItemTypeServiceInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StoreItemTypeController extends Controller
{
    protected StoreItemTypeServiceInterface $storeItemTypeService;

    public function __construct(StoreItemTypeServiceInterface $interface)
    {
        $this->storeItemTypeService = $interface;
    }

    public function index()
    {
        return view('admin.store_types.index', [
            'storeItemTypes' => $this->storeItemTypeService->getRepository()->getAll(),
        ]);
    }

    public function create()
    {
        return view('admin.store_types.create', [
            'games' => $this->storeItemTypeService->getRepository()->getAllGames(),
            'connections' => $this->storeItemTypeService->getRepository()->getAllConnectionsWithTables(),
        ]);
    }

    public function store(CreateStoreItemTypeRequest $request)
    {
        $this->storeItemTypeService->save($request);
        return redirect()->route('admin.store_types.index');
    }

    public function edit(Request $request, int $id)
    {
        return view('admin.store_types.edit', [
            'games' => $this->storeItemTypeService->getRepository()->getAllGames(),
            'storeItemType' => $this->storeItemTypeService->getRepository()->getById($id),
        ]);
    }

    public function update(UpdateStoreItemTypeRequest $request, int $id)
    {
        $this->storeItemTypeService->update($request, $id);
        return redirect()->route('admin.store_types.index');
    }

    public function delete(int $id)
    {
        $this->storeItemTypeService->delete($id);
        return redirect()->route('admin.store_types.index');
    }
}
