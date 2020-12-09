<?php

namespace App\Http\Controllers;

use App\Http\Services\Interfaces\StoreItemServiceInterface;
use Illuminate\Http\Request;
use Inertia\Inertia;

class StoreController extends Controller
{
    protected StoreItemServiceInterface $storeItemService;

    public function __construct(StoreItemServiceInterface $interface)
    {
        $this->storeItemService = $interface;
    }

    public function index(Request $request): \Inertia\Response
    {
        return Inertia::render('Store/Index', [
            'storeItems' => $this->storeItemService->getRepository()->getAllWithServer(),
        ]);
    }

    public function details(Request $request, int $id): \Inertia\Response
    {
        return Inertia::render('Store/Details', [
            'store_item' => $this->storeItemService->getRepository()->getById($id),
        ]);
    }


}
