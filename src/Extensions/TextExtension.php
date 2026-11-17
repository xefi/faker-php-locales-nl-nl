<?php

namespace Xefi\Faker\NlNl\Extensions;

use Xefi\Faker\Extensions\TextExtension as BaseTextExtension;

class TextExtension extends BaseTextExtension
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

    /**
     * Text in format => Paragraphs => Sentences => Words.
     *
     * @var array|array[]
     */
    protected array $paragraphs = [
        [
            ['De', 'kwaliteit', 'van', 'de', 'dienstverlening', 'blijft', 'een', 'belangrijk', 'doel', 'in', 'de', 'zakelijke', 'sector.'],
            ['Elk', 'project', 'vraagt', 'om', 'bijzondere', 'aandacht', 'om', 'het', 'succes', 'te', 'garanderen.'],
            ['De', 'teams', 'werken', 'nauw', 'samen', 'om', 'de', 'gezamenlijke', 'doelen', 'te', 'bereiken.'],
            ['Goede', 'communicatie', 'tussen', 'collega\'s', 'zorgt', 'voor', 'een', 'hogere', 'productiviteit.'],
        ],
        [
            ['Het', 'beheer', 'van', 'middelen', 'is', 'een', 'sleutelfactor', 'voor', 'de', 'totale', 'prestatie.'],
            ['Werkmethoden', 'veranderen', 'mee', 'met', 'de', 'behoeften', 'en', 'de', 'technologie.'],
            ['Door', 'wendbaar', 'te', 'blijven,', 'kunnen', 'organisaties', 'concurrerend', 'en', 'innovatief', 'blijven.'],
            ['Processen', 'worden', 'herzien', 'om', 'de', 'resultaten', 'te', 'verbeteren', 'en', 'aan', 'de', 'eisen', 'van', 'de', 'markt', 'te', 'voldoen.'],
        ],
        [
            ['De', 'tevredenheid', 'van', 'de', 'klant', 'hangt', 'af', 'van', 'de', 'geleverde', 'kwaliteit', 'en', 'de', 'reactiesnelheid.'],
            ['Met', 'indicatoren', 'worden', 'de', 'prestaties', 'gemeten', 'en', 'strategische', 'keuzes', 'onderbouwd.'],
            ['Dagelijkse', 'uitdagingen', 'worden', 'overwonnen', 'dankzij', 'goed', 'beheer', 'en', 'passende', 'vaardigheden.'],
            ['Een', 'regelmatige', 'evaluatie', 'van', 'de', 'werkwijze', 'brengt', 'mogelijke', 'verbeteringen', 'aan', 'het', 'licht.'],
        ],
        [
            ['Opleiding', 'en', 'ontwikkeling', 'van', 'vaardigheden', 'hebben', 'prioriteit', 'binnen', 'bedrijven.'],
            ['Medewerkers', 'worden', 'aangemoedigd', 'om', 'nieuwe', 'kennis', 'op', 'te', 'doen', 'en', 'te', 'vernieuwen.'],
            ['Strategieën', 'voor', 'continue', 'verbetering', 'helpen', 'om', 'prestaties', 'te', 'verhogen', 'en', 'risico\'s', 'te', 'beperken.'],
            ['Persoonlijke', 'trainingsprogramma\'s', 'ondersteunen', 'zowel', 'de', 'individuele', 'als', 'de', 'collectieve', 'groei.'],
        ],
        [
            ['Data-analyse', 'helpt', 'om', 'kansen', 'voor', 'groei', 'en', 'verbetering', 'te', 'ontdekken.'],
            ['De', 'doelstellingen', 'worden', 'bijgesteld', 'op', 'basis', 'van', 'de', 'markt', 'en', 'de', 'verwachtingen', 'van', 'klanten.'],
            ['Door', 'de', 'voortgang', 'regelmatig', 'te', 'volgen,', 'kan', 'men', 'snel', 'op', 'veranderingen', 'inspelen.'],
            ['Beslissingen', 'worden', 'genomen', 'op', 'basis', 'van', 'betrouwbare', 'gegevens', 'en', 'nauwkeurige', 'analyses.'],
            ['Periodieke', 'evaluaties', 'maken', 'het', 'mogelijk', 'om', 'strategieën', 'bij', 'te', 'sturen', 'en', 'correcties', 'door', 'te', 'voeren.'],
        ],
    ];
}
