<?php

declare(strict_types=1);

namespace App;

class Order
{
    private Cpf $cpf;
    private array $items;
    private ?Coupon $coupon = null;

    public function __construct(string $cpf)
    {
        $this->cpf = new Cpf($cpf);
    }

    public function addCoupon(Coupon $coupon): void
    {
        $this->coupon = $coupon;
    }

    public function addItem(string $description, float $price, int $quantity): void
    {
        $this->items[] = new OrderItem($description, $price, $quantity);
    }

    public function total(): float
    {
        $total = 0;

        foreach ($this->items as $item) {
            $total += $item->total();
        }

        if ($this->coupon !== null) {
            return $this->coupon->apply($total);
        }

        return $total;
    }
}