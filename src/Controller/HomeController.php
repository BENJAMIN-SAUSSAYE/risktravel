<?php

namespace App\Controller;

use App\Model\ActualityManager;
use App\Controller\AbstractController;
use App\Model\HomeManager;

class HomeController extends AbstractController
{
    public function index(): string
    {
        $homeManager = new HomeManager();
        $gauges = $homeManager->getGauges();

        return $this->twig->render(
            'Home/index.html.twig',
            [
                'gauges' => $gauges,
            ]
        );
    }
}
