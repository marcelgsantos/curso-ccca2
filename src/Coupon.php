<?php

declare(strict_types=1);

namespace App;

use InvalidArgumentException;

class Coupon
{
    private string $code;
    private int $discount;

    public function __construct(string $code, int $discount)
    {
        $this->code = $code;
        $this->setDiscount($discount);
    }

    private function setDiscount(int $discount): void
    {
        if ($discount < 1 || $discount > 100) {
            throw new InvalidArgumentException('Invalid coupon');
        }

        $this->discount = $discount;
    }

    public function apply(float $value): float
    {
        $percentage = (100 - $this->discount) / 100;
        return $value * $percentage;
    }

    public function code(): string
    {
        return $this->code;
    }

    public function discount(): int
    {
        return $this->discount;
    }
}