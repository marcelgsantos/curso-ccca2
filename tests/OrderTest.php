<?php

declare(strict_types=1);

use App\Coupon;
use App\Cpf;
use App\Order;
use PHPUnit\Framework\TestCase;

class OrderTest extends TestCase
{
    /** @test */
    public function it_should_not_be_allowed_to_create_an_order_with_invalid_cpf(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $order = new Order('000.000.000-00');
    }

    /** @test */
    public function it_should_create_an_order_with_three_items(): void
    {
        $order = new Order('340.330.528-79');

        $order->addItem('hamburguer', 20.0, 2);
        $order->addItem('açaí', 15.0, 1);
        $order->addItem('refrigerantes', 5.0, 3);

        self::assertSame(70.0, $order->total());
    }

    /** @test */
    public function it_should_create_an_order_and_apply_a_coupon(): void
    {
        $order = new Order('340.330.528-79');

        $order->addItem('hamburguer', 20.0, 2);
        $order->addItem('açaí', 15.0, 1);
        $order->addItem('refrigerantes', 5.0, 3);

        $order->addCoupon(new Coupon('VALE20', 20));

        self::assertSame(56.0, $order->total());
    }
}