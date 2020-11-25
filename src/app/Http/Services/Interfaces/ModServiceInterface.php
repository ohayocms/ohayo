<?php

namespace App\Http\Services\Interfaces;

use App\Http\Repositories\Interfaces\ModRepositoryInterface;
use App\Http\Requests\CreateModRequest;
use App\Http\Requests\UpdateModRequest;

interface ModServiceInterface
{
    public function getRepository(): ModRepositoryInterface;

    public function save(CreateModRequest $request);

    public function update(UpdateModRequest $request, int $id);

    public function delete(int $id);
}
