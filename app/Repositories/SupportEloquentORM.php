<?php

namespace App\Repositories;

use App\DTO\{CreateSupportDTO,
        UpdateSupportDTO
    };
use App\Models\Support;
use stdClass;

class SupportEloquentORM implements SupportRepositoryInterface
{
    public function __construct(
        protected Support $model,
    ){}

    public function paginate(int $page = 1, int $totalPerPage = 15, string $filter = null) : PaginationInteface
    {
        $result = $this->model
        ->where(function ($query) use ($filter)
            {
                $query->where('subject', 'like', "%{$filter}%");
                $query->orWhere('body', 'like', "%{$filter}%");
            }
        )
        ->paginate($totalPerPage, ['*'], 'page', $page);
        dd($result);
    }

    public function getAll(string $filter = null) : array
    {
        return $this->model
                    ->where(function ($query) use ($filter)
                        {
                            $query->where('subject', 'like', "%{$filter}%");
                            $query->orWhere('body', 'like', "%{$filter}%");
                        }
                    )
                    ->get()
                    ->toArray();
    }

    public function findOne(string $id) : stdClass | null
    {
        $support = $this->model->find($id);
        if($support){
            return (object) $support->toArray();
        }
        return $support;
    }

    public function delete(string $id) : void
    {
        $this->model->findOrFail($id)->delete();
    }

    public function new(CreateSupportDTO $dto) : stdClass | null
    {
        $support = $this->model->create((array) $dto);
        return (object) $support->toArray();
    }

    public function update(UpdateSupportDTO $dto) : stdClass | null
    {
        if($support = $this->model->find($dto->id)){
            $support->update( (array) $dto);
            return (object) $support->toArray();
        }
        return null;
    }
}
