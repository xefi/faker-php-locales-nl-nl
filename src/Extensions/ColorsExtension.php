<?php

namespace Xefi\Faker\NlNl\Extensions;

use Xefi\Faker\Extensions\ColorsExtension as BaseColorsExtension;

class ColorsExtension extends BaseColorsExtension
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

    protected array $safeColorNames = [
        'Zwart', 'Kastanjebruin', 'Groen', 'Marineblauw', 'Olijfgroen',
        'Paars', 'Blauwgroen', 'Limoen', 'Blauw', 'Zilver',
        'Grijs', 'Geel', 'Fuchsia', 'Aqua', 'Wit',
    ];

    protected array $colorNames = [
        'Zwart', 'Kastanjebruin', 'Groen', 'Marineblauw', 'Olijfgroen',
        'Paars', 'Blauwgroen', 'Limoen', 'Blauw', 'Zilver',
        'Grijs', 'Geel', 'Fuchsia', 'Aqua', 'Wit',
        'Beige', 'Chocolade', 'Koraal', 'Cyaan', 'Karmijnrood',
        'Donkerblauw', 'Donkeroranje', 'Baksteenrood', 'Zeegroen', 'Bloemenwit',
        'Bosgroen', 'Goud', 'Roze', 'Indigo', 'Kaki',
        'Lavendel', 'Lichtblauw', 'Lichtkoraal', 'Lichtgroen', 'Lichtzalm',
        'Linnen', 'Magenta', 'Middelblauw', 'Middelorchidee', 'Mocassin',
        'Oranje', 'Rood', 'Pruim', 'Peru', 'Koningsblauw',
        'Zalm', 'Zandbruin', 'Hemelsblauw', 'Sneeuwwit', 'Turkoois',
        'Violet', 'Rookwit',
    ];
}
