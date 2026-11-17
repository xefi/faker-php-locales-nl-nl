<?php

namespace Xefi\Faker\NlNl\Tests\Unit;

final class PhoneExtensionTest extends TestCase
{
    public function testPhoneNumberReturnsString(): void
    {
        $number = $this->faker->phoneNumber();

        $this->assertIsString($number);
        $this->assertNotEmpty($number);
    }

    public function testPhoneNumberFormat(): void
    {
        for ($i = 0; $i < 100; $i++) {
            $this->assertMatchesRegularExpression('/^0[1-9]\d{8}$/', $this->faker->phoneNumber());
        }
    }

    public function testCellPhoneNumberFormat(): void
    {
        for ($i = 0; $i < 100; $i++) {
            $this->assertMatchesRegularExpression('/^06\d{8}$/', $this->faker->cellPhoneNumber());
        }
    }

    public function testLandlinePhoneNumberFormat(): void
    {
        for ($i = 0; $i < 100; $i++) {
            $this->assertMatchesRegularExpression('/^0[1-57]\d{8}$/', $this->faker->landlinePhoneNumber());
        }
    }

    public function testIndicatoredPhoneNumberFormat(): void
    {
        for ($i = 0; $i < 100; $i++) {
            $this->assertMatchesRegularExpression('/^\+31[1-9]\d{8}$/', $this->faker->indicatoredPhoneNumber());
        }
    }

    public function testSpacedIndicatoredCellPhoneNumberFormat(): void
    {
        for ($i = 0; $i < 100; $i++) {
            $this->assertMatchesRegularExpression('/^\+316( \d{8}| \d{2} \d{2} \d{2} \d{2})$/', $this->faker->spacedIndicatoredCellPhoneNumber());
        }
    }
}
