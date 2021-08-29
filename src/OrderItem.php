<?php

declare(strict_types=1);

namespace App;

class OrderItem
{
    public function __construct(
        private string $description,
        private float $price,
        private int $quantity,
    ) {
    }

    public function description(): string
    {
        return $this->description;
    }

    public function total(): float
    {
        return $this->price * $this->quantity;
    }
}