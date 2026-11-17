<?php

namespace Xefi\Faker\NlNl\Extensions;

use Xefi\Faker\Extensions\PhoneExtension as BasePhoneExtension;

class PhoneExtension extends BasePhoneExtension
{
    public string $defaultPrefix = '0';

    public string $indicator = '+31';

    /**
     * Get the locale handled by this extension.
     *
     * @return string|null
     */
    public function getLocale(): ?string
    {
        return 'nl_NL';
    }

    protected array $landlineFormats = [
        '10{separator}{d}{d}{d}{separator}{d}{d}{d}{d}',
        '20{separator}{d}{d}{d}{separator}{d}{d}{d}{d}',
        '30{separator}{d}{d}{d}{separator}{d}{d}{d}{d}',
        '40{separator}{d}{d}{d}{separator}{d}{d}{d}{d}',
        '50{separator}{d}{d}{d}{separator}{d}{d}{d}{d}',
        '70{separator}{d}{d}{d}{separator}{d}{d}{d}{d}',
        '13{separator}{d}{d}{d}{separator}{d}{d}{d}{d}',
        '15{separator}{d}{d}{d}{separator}{d}{d}{d}{d}',
        '23{separator}{d}{d}{d}{separator}{d}{d}{d}{d}',
        '43{separator}{d}{d}{d}{separator}{d}{d}{d}{d}',
        '118{separator}{d}{d}{separator}{d}{d}{separator}{d}{d}',
        '594{separator}{d}{d}{separator}{d}{d}{separator}{d}{d}',
    ];

    protected array $cellFormats = [
        '6{separator}{d}{d}{d}{d}{d}{d}{d}{d}',
        '6{separator}{d}{d}{separator}{d}{d}{separator}{d}{d}{separator}{d}{d}',
    ];
}
