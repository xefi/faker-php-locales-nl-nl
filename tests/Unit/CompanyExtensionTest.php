<?php

namespace Xefi\Faker\NlNl\Tests\Unit;

use Random\Randomizer;
use Xefi\Faker\NlNl\Extensions\CompanyExtension;

final class CompanyExtensionTest extends TestCase
{
    protected array $companies = [];

    protected function setUp(): void
    {
        parent::setUp();

        $companyExtension = new CompanyExtension(new Randomizer());
        $this->companies = (new \ReflectionClass($companyExtension))->getProperty('companies')->getValue($companyExtension);
    }

    public function testCompany(): void
    {
        $results = [];
        for ($i = 0; $i < count($this->companies); $i++) {
            $results[] = $this->faker->unique()->company();
        }

        $this->assertEqualsCanonicalizing(
            $this->companies,
            $results
        );
    }

    public function testCompanyNumber(): void
    {
        for ($i = 0; $i < 100; $i++) {
            $result = $this->faker->unique()->companyNumber();

            $this->assertIsString($result);
            $this->assertMatchesRegularExpression('/^[1-9]\d{7}$/', $result);
        }
    }

    public function testRsin(): void
    {
        for ($i = 0; $i < 100; $i++) {
            $result = $this->faker->unique()->rsin();

            $this->assertMatchesRegularExpression('/^\d{9}$/', $result);
            $this->assertTrue($this->passesElevenTest($result), "RSIN '{$result}' does not pass the 11-proef.");
        }
    }

    public function testVat(): void
    {
        for ($i = 0; $i < 100; $i++) {
            $result = $this->faker->unique()->vat();

            $this->assertMatchesRegularExpression('/^NL\d{9}B01$/', $result);
            $this->assertTrue($this->passesElevenTest(substr($result, 2, 9)), "VAT number '{$result}' is not built on a valid RSIN.");
        }
    }

    /**
     * Check a nine digits number against the 11-proef.
     *
     * @param string $number
     *
     * @return bool
     */
    private function passesElevenTest(string $number): bool
    {
        $sum = 0;
        for ($i = 0; $i < 8; $i++) {
            $sum += (9 - $i) * (int) $number[$i];
        }

        return ($sum - (int) $number[8]) % 11 === 0;
    }
}
