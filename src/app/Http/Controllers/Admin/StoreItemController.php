<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateStoreItemRequest;
use App\Http\Requests\UpdateStoreItemRequest;
use App\Http\Services\Interfaces\StoreItemServiceInterface;
use App\Models\Server;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class StoreItemController extends Controller
{
    protected StoreItemServiceInterface $storeItemService;

    public function __construct(StoreItemServiceInterface $interface)
    {
        $this->storeItemService = $interface;
    }

    public function index()
    {
        return view('admin.goods.index', [
            'goods' => $this->storeItemService->getRepository()->getAll(),
        ]);
    }

    public function create()
    {
        return view('admin.goods.create', [
            'servers' => $this->storeItemService->getRepository()->getAllServers(),
            'currencies' => $this->storeItemService->getRepository()->getAllCurrencies(),
        ]);
    }

    public function getStoreItemTypes(Request $request)
    {
        $server = Server::with('mod.game')->where('id', $request->get('gameId'))->first();
        return Response::json($this->storeItemService->getRepository()->getAllStoreItemTypesByGameId($server->mod->game->id));
    }

    public function store(CreateStoreItemRequest $request)
    {
        $this->storeItemService->save($request);
        return redirect()->route('admin.goods.index');
    }

    public function edit(Request $request, int $id)
    {
        return view('admin.goods.edit', [
            'storeItem' => $this->storeItemService->getRepository()->getById($id),
            'servers' => $this->storeItemService->getRepository()->getAllServers(),
            'currencies' => $this->storeItemService->getRepository()->getAllCurrencies(),
        ]);
    }

    public function update(UpdateStoreItemRequest $request, int $id)
    {
        $this->storeItemService->update($request, $id);
        return redirect()->route('admin.goods.index');
    }

    public function delete(int $id)
    {
        $this->storeItemService->delete($id);
        return redirect()->route('admin.goods.index');
    }
}
