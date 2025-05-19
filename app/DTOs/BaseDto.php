<?php

namespace App\DTOs;

abstract class BaseDto
{
    public function toArray(): array {
        return (array) $this;
    }
}