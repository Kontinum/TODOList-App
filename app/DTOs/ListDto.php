<?php

namespace App\DTOs;

class ListDto extends BaseDto
{
    public function __construct(
        public readonly string $name,
        public readonly ?string $description,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            name: $data['name'],
            description: $data['description'],
        );
    }
}