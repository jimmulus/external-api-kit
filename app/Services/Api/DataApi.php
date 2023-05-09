<?php

namespace App\Services\Api;

use App\Enums\CategoryEnum;
use Illuminate\Support\Collection;

interface DataApi
{
    public function getData(CategoryEnum $category = null, string $search = null, int $limit = null, int $skip = null): Collection;
}
