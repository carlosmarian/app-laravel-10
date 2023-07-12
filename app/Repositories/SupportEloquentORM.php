<?php

namespace App\Repositories;

use App\DTO\{CreateSupportDTO,
        UpdateSupportDTO
    };
use stdClass;

class SupportEloquentORM implements SupportRepositoryInterface
{
    public function getAll(string $filter = null) : array
    {
        return [];
    }

    public function findOne(string $id) : stdClass | null
    {
        return null;
    }

    public function delete(string $id) : void
    {

    }

    public function new(CreateSupportDTO $dto) : stdClass | null
    {
        return null;
    }

    public function update(UpdateSupportDTO $dto) : stdClass | null
    {
        return null;
    }
}
