<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCurrencyRequest;
use App\Http\Requests\UpdateCurrencyRequest;
use App\Http\Services\Interfaces\CurrencyServiceInterface;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    protected CurrencyServiceInterface $currencyService;

    public function __construct(CurrencyServiceInterface $interface)
    {
        $this->currencyService = $interface;
    }

    public function index()
    {
        return view('admin.currencies.index', [
            'currencies' => $this->currencyService->getRepository()->getAll(),
        ]);
    }

    public function create()
    {
        return view('admin.currencies.create');
    }

    public function store(CreateCurrencyRequest $request)
    {
        $this->currencyService->save($request);
        return redirect()->route('admin.currencies.index');
    }

    public function edit(Request $request, int $id)
    {
        return view('admin.currencies.edit', [
            'currency' => $this->currencyService->getRepository()->getById($id),
        ]);
    }

    public function update(UpdateCurrencyRequest $request, int $id)
    {
        $this->currencyService->update($request, $id);
        return redirect()->route('admin.currencies.index');
    }

    public function delete(int $id)
    {
        $this->currencyService->delete($id);
        return redirect()->route('admin.currencies.index');
    }
}
