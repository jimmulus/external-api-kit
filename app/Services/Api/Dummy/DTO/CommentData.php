<?php

namespace App\Services\Api\Dummy\DTO;

class CommentData
{
    public function __construct(
        public int $id,
        public string $body,
        public bool $completed,
        public int $postId,
        public array $user
    ) {
    }
}
