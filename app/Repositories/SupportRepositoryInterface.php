<?php

namespace App\Repositories;

use App\DTO\{CreateSupportDTO,
            UpdateSupportDTO,
        };
use stdClass;

interface SupportRepositoryInterface
{

    public function paginate(int $page = 1, int $totalPerPage = 15, string $filter = null) : PaginationInteface;

    public function getAll(string $filter = null) : array;

    public function findOne(string $id) : stdClass | null;

    public function delete(string $id) : void;

    public function new(CreateSupportDTO $dto) : stdClass | null;

    public function update(UpdateSupportDTO $dto) : stdClass | null;
}
