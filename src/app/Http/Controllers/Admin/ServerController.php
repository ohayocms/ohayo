<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateModRequest;
use App\Http\Requests\CreateServerRequest;
use App\Http\Requests\UpdateModRequest;
use App\Http\Requests\UpdateServerRequest;
use App\Http\Services\Interfaces\ModServiceInterface;
use App\Http\Services\Interfaces\ServerServiceInterface;
use Illuminate\Http\Request;

class ServerController extends Controller
{
    protected ServerServiceInterface $serverService;

    public function __construct(ServerServiceInterface $interface)
    {
        $this->serverService = $interface;
    }

    public function index()
    {
        return view('admin.servers.index', [
            'servers' => $this->serverService->getRepository()->getAll()
        ]);
    }

    public function create()
    {
        return view('admin.servers.create', [
            'mods' => $this->serverService->getRepository()->getAllAvailableMods(),
        ]);
    }

    public function store(CreateServerRequest $request)
    {
        $this->serverService->save($request);
        return redirect()->route('admin.servers.index');
    }

    public function edit(Request $request, int $id)
    {
        return view('admin.servers.edit', [
            'server' => $this->serverService->getRepository()->getById($id),
            'mods' => $this->serverService->getRepository()->getAllAvailableMods(),
        ]);
    }

    public function update(UpdateServerRequest $request, int $id)
    {
        $this->serverService->update($request, $id);
        return redirect()->route('admin.servers.index');
    }

    public function delete(int $id)
    {
        $this->serverService->delete($id);
        return redirect()->route('admin.servers.index');
    }
}
