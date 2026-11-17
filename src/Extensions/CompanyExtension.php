<?php

namespace Xefi\Faker\NlNl\Extensions;

use Xefi\Faker\Extensions\Extension;

class CompanyExtension extends Extension
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

    private array $companies = [
        'De Vries & Zonen B.V.', 'Hollandse Bouwgroep N.V.', 'Van Dijk Installatietechniek B.V.',
        'Bakker Logistiek B.V.', 'Polderwind Energie B.V.', 'Grachtenhuis Vastgoed B.V.',
        'Zeeuwse Visserij Coöperatie U.A.', 'Brabantse Metaalwerken B.V.', 'Molenaar Advocaten',
        'Tulpenland Kwekerijen V.O.F.', 'Delta Waterbouw N.V.', 'Noorderlicht Software B.V.',
        'Veluwe Recreatie B.V.', 'Kaasboerderij Mulder V.O.F.', 'Oranje Transport B.V.',
        'Duinzicht Zorggroep', 'Rijnmond Havendiensten B.V.', 'Amstel Accountants',
        'Smit & Visser Architecten', 'Dijkstra Drukkerij B.V.', 'Friese Zuivelfabriek Coöperatie U.A.',
        'Utrechtse Adviesgroep B.V.', 'Haagse Media Holding N.V.', 'Limburgse Bierbrouwerij B.V.',
        'Klompenmakerij Jansen', 'Twentse Textielunie B.V.', 'Groene Hart Hoveniers V.O.F.',
        'Waddenzee Rederij B.V.', 'Hoekstra Bouwbedrijf B.V.', 'Stroopwafel Bakkerij De Boer',
    ];

    /**
     * Get a random company name.
     *
     * @return string
     */
    public function company(): string
    {
        return $this->pickArrayRandomElement($this->companies);
    }

    /**
     * Get a random Kamer van Koophandel (KvK) registration number.
     *
     * @return string
     */
    public function companyNumber(): string
    {
        return (string) $this->randomizer->getInt(10000000, 99999999);
    }

    /**
     * Get a random RSIN (Rechtspersonen en Samenwerkingsverbanden Informatienummer) passing the 11-proef.
     *
     * @return string
     */
    public function rsin(): string
    {
        do {
            $digits = (string) $this->randomizer->getInt(10000000, 99999999);
            $checkDigit = $this->elevenTestCheckDigit($digits);
        } while ($checkDigit === null);

        return $digits.$checkDigit;
    }

    /**
     * Get a random VAT number (btw-identificatienummer) of a legal entity, built on its RSIN.
     *
     * @return string
     */
    public function vat(): string
    {
        return sprintf('NL%sB01', $this->rsin());
    }

    /**
     * Compute the last digit that makes an eight digits base pass the 11-proef, or null when none exists.
     *
     * @param string $digits
     *
     * @return int|null
     */
    private function elevenTestCheckDigit(string $digits): ?int
    {
        $sum = 0;
        for ($i = 0; $i < 8; $i++) {
            $sum += (9 - $i) * (int) $digits[$i];
        }

        $checkDigit = $sum % 11;

        return $checkDigit === 10 ? null : $checkDigit;
    }
}
