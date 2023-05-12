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
                $listCountriesRisk = $homeManager->getCountryRisk();
                $listCountries = $homeManager->getEuropeanCountries();
                // $listItineraires = $homeManager->getItineraire();
                $listAnimals = $listArmes = $gauges = [];
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
                                $riskScore = explode("|", $data['country-destination'])[1];
                                $countryDestination = explode("|", $data['country-destination'])[0];
                                $countryStarting = $data['country-starting'];
                                //$kiloMeters = $homeManager->getDistance($countryDestination, $countryStarting);
                                $listAnimals = $homeManager->getRandomRisk(
                                        $homeManager->getAnimals(),
                                        'animals',
                                        (float)$riskScore
                                );
                                $listArmes = $homeManager->getRandomRisk(
                                        $homeManager->getArmes(),
                                        'armes',
                                        (float)$riskScore
                                );
                                $gauges = $homeManager->getRandomRisk(
                                        $homeManager->getGauges(),
                                        'gauges',
                                        (float)$riskScore
                                );
                                // $walkDays = $homeManager->getWalkDays($kiloMeters);
                        }
                }

                return $this->twig->render('Home/index.html.twig', [
                        'errors' => $errors,
                        'listCountries' => $listCountries,
                        'listCountriesRisk' => $listCountriesRisk,
                        // 'listItineraires' => $listItineraires,
                        // TODO renommer listAnimals, listArmes et gauges par les nouvelles variables du dessus
                        'listAnimals' => $listAnimals,
                        'listArmes' => $listArmes,
                        'gauges' => $gauges,
                        // 'kiloMeters' => $kiloMeters,
                        // 'walkDays' =>  $walkDays,
                ]);
        }
}
