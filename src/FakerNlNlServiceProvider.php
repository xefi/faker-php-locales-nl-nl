<?php

namespace Xefi\Faker\NlNl;

use Xefi\Faker\NlNl\Extensions\AddressExtension;
use Xefi\Faker\NlNl\Extensions\ColorsExtension;
use Xefi\Faker\NlNl\Extensions\CompanyExtension;
use Xefi\Faker\NlNl\Extensions\FinancialExtension;
use Xefi\Faker\NlNl\Extensions\PersonExtension;
use Xefi\Faker\NlNl\Extensions\PhoneExtension;
use Xefi\Faker\NlNl\Extensions\TextExtension;
use Xefi\Faker\Providers\Provider;

class FakerNlNlServiceProvider extends Provider
{
    /**
     * Register the nl_NL extensions.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->extensions([
            AddressExtension::class,
            ColorsExtension::class,
            CompanyExtension::class,
            FinancialExtension::class,
            PersonExtension::class,
            TextExtension::class,
            PhoneExtension::class,
        ]);
    }
}
