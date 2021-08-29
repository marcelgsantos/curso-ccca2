<?php

declare(strict_types=1);

namespace App;

class PlaceOrder
{
    private array $orders;
    private array $coupons;

    public function __construct()
    {
        $this->orders = [];
        $this->coupons = [
            new Coupon("VALE20", 20)
        ];
    }

    public function execute(array $input): array
    {
        $order = new Order($input['cpf']);

        foreach ($input['items'] as $item) {
            $order->addItem($item['description'], $item['price'], $item['quantity']);
        }

        if (isset($input['coupon'])) {
            $coupon = array_filter($this->coupons, fn ($coupon) => $coupon->code() === $input['coupon']);

            if (isset($coupon[0])) {
                $order->addCoupon($coupon[0]);
            }
        }

        return [
            'total' => $order->total()
        ];
    }
}