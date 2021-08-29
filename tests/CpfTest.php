<?php

declare(strict_types=1);

use App\Cpf;
use PHPUnit\Framework\TestCase;

class CpfTest extends TestCase
{
    /** @test */
    public function it_should_not_be_allowed_to_create_a_cpf_with_invalid_value(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $cpf = new Cpf('000.000.000-00');
    }
}