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
                // $listItineraires = $homeManager->getItineraire();

                return $this->twig->render('Home/index.html.twig', [
                        'listCountriesRisk' => $listCountriesRisk,
                        // 'listItineraires' => $listItineraires,
                        'listAnimals' => $listAnimals,
                        'listArmes' => $listArmes
                ]);
        }
}
