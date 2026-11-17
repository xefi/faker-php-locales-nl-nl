<?php

namespace Xefi\Faker\NlNl\Extensions;

use Xefi\Faker\Extensions\Extension;

class AddressExtension extends Extension
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

    protected $provinces = [
        'Groningen' => 'GR', 'Friesland' => 'FR', 'Drenthe' => 'DR', 'Overijssel' => 'OV',
        'Flevoland' => 'FL', 'Gelderland' => 'GE', 'Utrecht' => 'UT', 'Noord-Holland' => 'NH',
        'Zuid-Holland' => 'ZH', 'Zeeland' => 'ZE', 'Noord-Brabant' => 'NB', 'Limburg' => 'LI',
    ];

    protected $cities = [
        'Amsterdam', 'Rotterdam', 'Den Haag', 'Utrecht', 'Eindhoven', 'Groningen', 'Tilburg', 'Almere', 'Breda',
        'Nijmegen', 'Apeldoorn', 'Arnhem', 'Haarlem', 'Enschede', 'Amersfoort', 'Zaanstad', '\'s-Hertogenbosch',
        'Zwolle', 'Leiden', 'Maastricht', 'Dordrecht', 'Zoetermeer', 'Ede', 'Leeuwarden', 'Alkmaar', 'Emmen',
        'Delft', 'Deventer', 'Venlo', 'Helmond', 'Hilversum', 'Assen', 'Middelburg', 'Lelystad', 'Gouda',
    ];

    protected $streetSuffixes = [
        'straat', 'weg', 'laan', 'plein', 'gracht', 'kade', 'singel', 'dijk', 'pad', 'hof',
    ];

    protected $streetNames = [
        'Kerk', 'Dorps', 'Molen', 'School', 'Stations', 'Hoofd', 'Nieuw', 'Juliana', 'Wilhelmina', 'Beatrix',
        'Oranje', 'Prinsen', 'Heren', 'Keizers', 'Linden', 'Eiken', 'Beuken', 'Esdoorn', 'Rozen', 'Tulpen',
        'Duin', 'Polder', 'Haven', 'Markt', 'Wester', 'Ooster', 'Noorder', 'Zuider', 'Kastanje', 'Vondel',
        'Rembrandt', 'Spinoza', 'Erasmus', 'Bos', 'Brink', 'Sluis', 'Akker', 'Weide',
    ];

    protected string $postcodeLetters = 'ABCDEGHJKLMNPRSTVWXZ';

    /**
     * Get a random province name.
     *
     * @return string
     */
    public function province(): string
    {
        return $this->pickArrayRandomKey($this->provinces);
    }

    /**
     * Get a random province code (ISO 3166-2:NL subdivision code without the country prefix).
     *
     * @return string
     */
    public function provinceCode(): string
    {
        return $this->pickArrayRandomElement($this->provinces);
    }

    /**
     * Get a random city name.
     *
     * @return string
     */
    public function city(): string
    {
        return $this->pickArrayRandomElement($this->cities);
    }

    /**
     * Get a random postcode in the "1234 AB" format, skipping the letter pairs PostNL does not issue.
     *
     * @return string
     */
    public function postcode(): string
    {
        do {
            $letters = $this->randomizer->getBytesFromString($this->postcodeLetters, 2);
        } while (in_array($letters, ['SA', 'SD', 'SS'], true));

        return sprintf('%d %s', $this->randomizer->getInt(1000, 9999), $letters);
    }

    /**
     * Get a random house number.
     *
     * @return int
     */
    public function houseNumber(): int
    {
        return $this->randomizer->getInt(1, 300);
    }

    /**
     * Get a random street name.
     *
     * @return string
     */
    public function streetName(): string
    {
        return $this->pickArrayRandomElement($this->streetNames).$this->pickArrayRandomElement($this->streetSuffixes);
    }

    /**
     * Get a random street address.
     *
     * @return string
     */
    public function streetAddress(): string
    {
        return sprintf('%s %d', $this->streetName(), $this->houseNumber());
    }

    /**
     * Get a random full address.
     *
     * @return string
     */
    public function fullAddress(): string
    {
        return sprintf('%s, %s %s', $this->streetAddress(), $this->postcode(), $this->city());
    }
}
