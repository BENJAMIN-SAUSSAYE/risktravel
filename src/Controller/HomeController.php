<?php

namespace App\Controller;

use App\Model\ActualityManager;
use App\Controller\AbstractController;
use App\Model\HomeManager;

class HomeController extends AbstractController
{
    /**
     * Display home page
     */
    public function index(): string
    {
        //CALL API FROM HomeManager--> return ARRAY from JSON
        $homemanager = new HomeManager();
        // $listCountriesRisk = $homemanager->getCountryRisk();
        $gauges = $homemanager->getGauges();

        return $this->twig->render(
            'Home/index.html.twig',
            [
                //'listCountriesRisk' => $listCountriesRisk,
                'gauges' => $gauges,
            ]
        );
    }
}
