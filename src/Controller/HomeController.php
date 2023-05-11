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
        $homeManager = new HomeManager();
        $listAnimals = $homeManager->getAnimals();
        $listArmes = $homeManager->getArmes();

        return $this->twig->render('Home/index.html.twig', ['listAnimals' => $listAnimals, 'listArmes' => $listArmes]);
    }
}
