<?php

namespace App\Model;

class HomeManager extends AbstractManager
{
    public function getEuropeanCountries(): ?array
    {
        return [
            'AT' => 'Austria',
            'BE' => 'Belgium',
            'BG' => 'Bulgaria',
            'CY' => 'Cyprus',
            'CZ' => 'Czech Republic',
            'DE' => 'Germany',
            'DK' => 'Denmark',
            'EE' => 'Estonia',
            'ES' => 'Spain',
            'FI' => 'Finland',
            'FR' => 'France',
            'GB' => 'United Kingdom',
            'GR' => 'Greece',
            'HU' => 'Hungary',
            'HR' => 'Croatia',
            'IE' => 'Ireland, Republic of (EIRE)',
            'IT' => 'Italy',
            'LT' => 'Lithuania',
            'LU' => 'Luxembourg',
            'LV' => 'Latvia',
            'MT' => 'Malta',
            'NL' => 'Netherlands',
            'PL' => 'Poland',
            'PT' => 'Portugal',
            'RO' => 'Romania',
            'SE' => 'Sweden',
            'SI' => 'Slovenia',
            'SK' => 'Slovakia',
        ];
    }

    public function getGauges(): array
    {
        return [
            '1' => 'Maladie',
            '2' => 'Catastrophe naturelle',
            '3' => 'Contamination radioactive',
            '4' => 'Séquestration par enlèvement',
            '5' => 'Recevoir des projectiles',
        ];
    }
}
