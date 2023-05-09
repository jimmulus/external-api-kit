<?php

namespace App\Services\Api\Dummy;

use App\Services\Api\DataApi;
use App\Enums\CategoryEnum;
use Illuminate\Support\Collection;


class NullDummyDataAPI implements DataApi
{
    public function getData(CategoryEnum $category = null, string $search = null, int $limit = null, int $skip = null ): Collection
    {
        return Collection::make();
    }
}
