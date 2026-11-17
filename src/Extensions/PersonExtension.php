<?php

namespace Xefi\Faker\NlNl\Extensions;

use Xefi\Faker\Extensions\PersonExtension as BasePersonExtension;

class PersonExtension extends BasePersonExtension
{
    /**
     * Get the locale handled by this extension.
     *
     * @return string|null
     */
    public function getLocale(): ?string
    {
        return 'nl_NL';
    }

    protected $firstNameMale = [
        'Jan', 'Pieter', 'Hendrik', 'Willem', 'Johannes', 'Cornelis', 'Gerrit', 'Jacob', 'Dirk', 'Klaas',
        'Sander', 'Thijs', 'Daan', 'Bram', 'Ruben', 'Joris', 'Bas', 'Niels', 'Stijn', 'Koen',
        'Maarten', 'Jeroen', 'Wouter', 'Rutger', 'Joost', 'Freek', 'Gijs', 'Teun', 'Sem', 'Luuk',
        'Jesse', 'Thomas', 'Tim', 'Max', 'Bart', 'Henk', 'Kees', 'Arjen', 'Mees', 'Floris',
    ];

    protected $firstNameFemale = [
        'Anna', 'Maria', 'Johanna', 'Cornelia', 'Wilhelmina', 'Elisabeth', 'Sophie', 'Emma', 'Julia', 'Tess',
        'Sanne', 'Lotte', 'Fleur', 'Femke', 'Anouk', 'Iris', 'Lieke', 'Eva', 'Noor', 'Isa',
        'Lisa', 'Saskia', 'Marieke', 'Ingrid', 'Annemieke', 'Esther', 'Petra', 'Linda', 'Mirjam', 'Ellen',
        'Karin', 'Inge', 'Marloes', 'Mila', 'Yara', 'Roos', 'Floor', 'Nina', 'Evi', 'Merel',
    ];

    protected $lastName = [
        'de Jong', 'Jansen', 'de Vries', 'van den Berg', 'van Dijk', 'Bakker', 'Janssen', 'Visser', 'Smit', 'Meijer',
        'de Boer', 'Mulder', 'de Groot', 'Bos', 'Vos', 'Peters', 'Hendriks', 'van Leeuwen', 'Dekker', 'Brouwer',
        'de Wit', 'Dijkstra', 'Smits', 'de Graaf', 'van der Meer', 'van der Linden', 'Kok', 'Jacobs', 'de Haan', 'Vermeulen',
        'van den Heuvel', 'van der Veen', 'van den Broek', 'de Bruijn', 'van der Heijden', 'Schouten', 'van Beek', 'Willems', 'van Vliet', 'Hoekstra',
    ];

    protected $titleMale = ['dhr.', 'dr.', 'prof.', 'mr.', 'ir.', 'drs.'];
    protected $titleFemale = ['mevr.', 'dr.', 'prof.', 'mr.', 'ir.', 'drs.'];

    /**
     * Get a random Burgerservicenummer (BSN) passing the 11-proef.
     *
     * @return string
     */
    public function bsn(): string
    {
        do {
            $digits = (string) $this->randomizer->getInt(10000000, 99999999);
            $checkDigit = $this->elevenTestCheckDigit($digits);
        } while ($checkDigit === null);

        return $digits.$checkDigit;
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
