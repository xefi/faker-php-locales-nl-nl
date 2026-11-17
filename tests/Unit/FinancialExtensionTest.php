<?php

namespace Xefi\Faker\NlNl\Tests\Unit;

use Random\Randomizer;
use ReflectionClass;
use Xefi\Faker\Calculators\Iban;
use Xefi\Faker\NlNl\Extensions\FinancialExtension;

final class FinancialExtensionTest extends TestCase
{
    protected array $bankCodes = [];

    protected function setUp(): void
    {
        parent::setUp();

        $financialExtension = new FinancialExtension(new Randomizer());
        $this->bankCodes = (new ReflectionClass($financialExtension))->getProperty('bankCodes')->getValue($financialExtension);
    }

    public function testIban(): void
    {
        for ($i = 0; $i < 100; $i++) {
            $iban = $this->faker->iban();

            $this->assertEquals(18, strlen($iban));
            $this->assertMatchesRegularExpression('/^NL\d{2}[A-Z]{4}\d{10}$/', $iban);
            $this->assertContains(substr($iban, 4, 4), $this->bankCodes);
            $this->assertTrue(Iban::isValid($iban));
        }
    }
}
