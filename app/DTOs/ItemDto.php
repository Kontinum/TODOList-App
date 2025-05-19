<?php
namespace App\DTOs;

use App\DTOs\BaseDto;

class ItemDto extends BaseDto
{
    public function __construct(
        public readonly string $name,
        public readonly int $list_id,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            name: $data['name'],
            list_id: $data['list_id'],
        );
    }  
}