<?php

declare(strict_types=1);

use App\PlaceOrder;
use PHPUnit\Framework\TestCase;

class PlaceOrderTest extends TestCase
{
    /** @test */
    public function it_should_place_an_order(): void
    {
        $input = [
            'cpf' => '340.330.528-79',
            'items' => [
                ['description' => 'hamburguer', 'price' => 20.0, 'quantity' => 2],
                ['description' => 'açaí', 'price' => 15.0, 'quantity' => 1],
                ['description' => 'refrigerantes', 'price' => 5.0, 'quantity' => 3],
            ],
            'coupon' => 'VALE20'
        ];

        $placeOrder = new PlaceOrder();
        $output = $placeOrder->execute($input);

        self::assertEquals(56.0, $output['total']);
    }
}