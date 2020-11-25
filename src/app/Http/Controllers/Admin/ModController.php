<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateGameRequest;
use App\Http\Requests\CreateModRequest;
use App\Http\Requests\UpdateGameRequest;
use App\Http\Requests\UpdateModRequest;
use App\Http\Services\Interfaces\GameServiceInterface;
use App\Http\Services\Interfaces\ModServiceInterface;
use App\Models\Mod;
use Illuminate\Http\Request;

class ModController extends Controller
{

    protected ModServiceInterface $modService;

    public function __construct(ModServiceInterface $interface)
    {
        $this->modService = $interface;
    }

    public function index()
    {
        return view('admin.mods.index', [
            'mods' => $this->modService->getRepository()->getAll()
        ]);
    }

    public function create()
    {
        return view('admin.mods.create', [
            'games' => $this->modService->getRepository()->getAllAvailableGames(),
        ]);
    }

    public function store(CreateModRequest $request)
    {
        $this->modService->save($request);
        return redirect()->route('admin.mods.index');
    }

    public function edit(Request $request, int $id)
    {
        return view('admin.mods.edit', [
            'game' => $this->modService->getRepository()->getById($id),
        ]);
    }

    public function update(UpdateModRequest $request, int $id)
    {
        $this->modService->update($request, $id);
        return redirect()->route('admin.mods.index');
    }

    public function delete(int $id)
    {
        $this->modService->delete($id);
        return redirect()->route('admin.mods.index');
    }
}
