<?php

namespace App\Model;

use Symfony\Component\HttpClient\HttpClient;

class HomeManager extends AbstractManager
{
    public function getCountryRisk(): array
    {
        //TODO CALL API
        $client = HttpClient::create();

        $response = $client->request('GET', 'https://www.travel-advisory.info/api');
        $statusCode = $response->getStatusCode();
        $type = $response->getHeaders()['content-type'][0];
        $countries = [];

        if ($statusCode === 200 && $type === "application/json; charset=utf-8") {
            $countries = $response->getContent();

            $countries = $response->toArray();

            if (!empty($countries)) {
                $countriesList = [];

                foreach ($countries['data'] as $country) {
                    $isoAlpha2 = $country['iso_alpha2'];
                    $name = $country['name'];
                    $score = $country['advisory']['score'];

                    $countriesList[] = array('iso_alpha2' => $isoAlpha2, 'name' => $name, 'score' => $score);
                    $countries = $countriesList;
                }
            }
        }
        return $countries;
    }

    public function getEuropeanCountries(): ?array
    {
        $firstCountriesList = [];

        $firstCountry = [
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

        foreach ($firstCountry as $isoAlpha2 => $name) {
            $firstCountriesList[] = [
                'iso_alpha2' => $isoAlpha2,
                'name' => $name,
            ];
        }
        return $firstCountriesList;
    }
}
