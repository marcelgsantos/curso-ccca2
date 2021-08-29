<?php

declare(strict_types=1);

use App\Coupon;
use PHPUnit\Framework\TestCase;

class CouponTest extends TestCase
{
    /** @test */
    public function it_should_not_be_allowed_to_create_a_coupon_with_invalid_value(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $coupon = new Coupon('INVALID_COUPON', -50);
    }

    /** @test */
    public function it_should_apply_a_discount_coupon_correctly(): void
    {
        $coupon = new Coupon('VALE_20', 20);
        $newPrice = $coupon->apply(100.0);
        self::assertSame(80.0, $newPrice);
    }
}