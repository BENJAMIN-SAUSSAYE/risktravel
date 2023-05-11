<?php

namespace App\Controller;

use App\Controller\AbstractController;
use App\Model\HomeManager;

class HomeController extends AbstractController
{
    public function index(): string
    {
        //CALL API FROM HomeManager--> return ARRAY from JSON
        $homeManager = new HomeManager();
        $listAnimals = $homeManager->getAnimals();
        $listArmes = $homeManager->getArmes();
        $listCountriesRisk = $homeManager->getCountryRisk();
        $listCountries = $homeManager->getEuropeanCountries();

        $errors = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = array_map("trim", $_POST);

            if (empty($data['country-starting'])) {
                $errors[] = "Veuillez renseigner le pays de départ";
            }

            if (empty($data['country-destination'])) {
                $errors[] = "Veuillez renseigner le pays d'arrivé";
            }

            if (empty($errors)) {
                // $riskScore = explode("|", $data['country-destination'])[1];
                // $countryDestination = explode("|", $data['country-destination'])[0];
                // $countryStarting = $data['country-starting'];
                // $kiloMeters = $homeManager->getDistance($countryDestination, $countryStarting);
                // $cardsRiskAnimal = $homeManager->getRandomRisk($homeManager->getAnimals(), true, $riskScore);
                // $cardsRiskArm = $homeManager->getRandomRisk($homeManager->getArmes(), true, $riskScore);
                // $gaugeRisk = $homeManager->getRandomRisk($homeManager->getGauges(), true, $riskScore);
                // $walkDays = $homeManager->getWalkDays($kiloMeters);
            }
        }

        return $this->twig->render('Home/index.html.twig', [
            'errors' => $errors,
            'listCountries' => $listCountries,
            'listCountriesRisk' => $listCountriesRisk,
            // TODO renommer listAnimals et listArmes par les nouvelles variables du dessus
            'listAnimals' => $listAnimals,
            'listArmes' => $listArmes,
            // 'gauges' => $gaugesRisk,
            // 'kiloMeters' => $kiloMeters,
            // 'walkDays' =>  $walkDays,
        ]);
    }
}
