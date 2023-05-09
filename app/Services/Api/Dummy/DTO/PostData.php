<?php

namespace App\Services\Api\Dummy\DTO;

class PostData
{
    public function __construct(
        public string $title,
        public string $body,
        public int $userId,
        public ?array $tags = null,
        public int $reactions
    ) {
    }
}
