<?php

namespace Xefi\Faker\NlNl\Extensions;

use Xefi\Faker\Extensions\FinancialExtension as BaseFinancialExtension;

class FinancialExtension extends BaseFinancialExtension
{
    /**
     * Get the locale handled by this extension.
     *
     * @return string|null
     */
    public function getLocale(): string|null
    {
        return 'nl_NL';
    }

    protected array $bankCodes = [
        'ABNA', 'ASNB', 'BUNQ', 'FVLB', 'HAND', 'INGB', 'KNAB', 'NNBA', 'RABO', 'RBRB', 'SNSB', 'TRIO',
    ];

    /**
     * Get a random IBAN, a Dutch one (bank code followed by a ten digits account number) by default.
     *
     * @param ?string $countryCode
     * @param ?string $format      [{d} => digit, {l} => letter, {a} => any]
     *
     * @return string
     */
    public function iban(?string $countryCode = null, ?string $format = null): string
    {
        if ($countryCode === null) {
            $countryCode = 'NL';
        }

        if ($format === null) {
            $format = $this->pickArrayRandomElement($this->bankCodes).str_repeat('{d}', 10);
        }

        return parent::iban($countryCode, $format);
    }
}
