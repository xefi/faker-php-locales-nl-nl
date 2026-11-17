<?php

namespace Xefi\Faker\NlNl\Tests\Unit;

use Random\Randomizer;
use ReflectionClass;
use Xefi\Faker\NlNl\Extensions\AddressExtension;

final class AddressExtensionTest extends TestCase
{
    protected AddressExtension $extension;
    protected array $provinces = [];
    protected array $cities = [];
    protected array $streetSuffixes = [];
    protected array $streetNames = [];

    protected function setUp(): void
    {
        parent::setUp();

        $this->extension = new AddressExtension(new Randomizer());
        $reflection = new ReflectionClass($this->extension);

        $this->provinces = $reflection->getProperty('provinces')->getValue($this->extension);
        $this->cities = $reflection->getProperty('cities')->getValue($this->extension);
        $this->streetSuffixes = $reflection->getProperty('streetSuffixes')->getValue($this->extension);
        $this->streetNames = $reflection->getProperty('streetNames')->getValue($this->extension);
    }

    public function testProvince(): void
    {
        $results = [];
        for ($i = 0; $i < count($this->provinces); $i++) {
            $results[] = $this->faker->unique()->province();
        }

        $this->assertEqualsCanonicalizing(
            array_keys($this->provinces),
            $results
        );
    }

    public function testProvinceCode(): void
    {
        $results = [];
        for ($i = 0; $i < count($this->provinces); $i++) {
            $results[] = $this->faker->unique()->provinceCode();
        }

        $this->assertEqualsCanonicalizing(
            array_values($this->provinces),
            $results
        );
    }

    public function testCity(): void
    {
        $results = [];
        for ($i = 0; $i < count($this->cities); $i++) {
            $results[] = $this->faker->unique()->city();
        }

        $this->assertEqualsCanonicalizing(
            $this->cities,
            $results
        );
    }

    public function testPostcode(): void
    {
        for ($i = 0; $i < 100; $i++) {
            $result = $this->faker->unique()->postcode();

            $this->assertIsString($result);
            $this->assertMatchesRegularExpression('/^[1-9]\d{3} [A-EGHJ-NPRSTVWXZ]{2}$/', $result);
            $this->assertNotContains(substr($result, 5), ['SA', 'SD', 'SS']);
        }
    }

    public function testHouseNumber(): void
    {
        for ($i = 0; $i < 100; $i++) {
            $result = $this->faker->houseNumber();

            $this->assertIsInt($result);
            $this->assertLessThanOrEqual(300, $result);
            $this->assertGreaterThanOrEqual(1, $result);
        }
    }

    public function testStreetName(): void
    {
        $streets = [];
        foreach ($this->streetNames as $name) {
            foreach ($this->streetSuffixes as $suffix) {
                $streets[] = $name.$suffix;
            }
        }

        for ($i = 0; $i < 100; $i++) {
            $this->assertContains($this->faker->streetName(), $streets);
        }
    }

    public function testStreetAddress(): void
    {
        for ($i = 0; $i < 100; $i++) {
            $result = $this->faker->streetAddress();

            $this->assertMatchesRegularExpression('/^\p{L}+ \d{1,3}$/u', $result);
        }
    }

    public function testFullAddress(): void
    {
        for ($i = 0; $i < 100; $i++) {
            $result = $this->faker->fullAddress();

            $this->assertMatchesRegularExpression("/^\p{L}+ \d{1,3}, [1-9]\d{3} [A-Z]{2} [\p{L}' -]+$/u", $result);
        }
    }
}
