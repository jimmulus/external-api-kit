<?php

namespace App\Services\Api\Dummy\DTO;

class TodoData
{
    public function __construct(
        public int $id,
        public string $todo,
        public bool $completed,
        public int $userId,
    ) {
    }
}
