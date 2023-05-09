<?php

namespace App\Services\Api\Dummy\DTO;

class QuoteData
{
    public function __construct(
        public int $id,
        public string $quote,
        public string $author,
    ) {
    }
}
