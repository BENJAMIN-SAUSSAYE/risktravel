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

    public function getAnimals(): array
    {
        return [
            [
                'img' => 'lion.jpg',
                'name' => 'Lion',
                'description' => 'Le lion d\'Afrique est un mammifère carnivore appartenant à la famille des félidés. 
                Il est le plus grand carnivore d\'Afrique et le deuxième plus grand félidé après le tigre. 
                Il est surnommé le Roi des animaux du fait de son imposant charisme et de sa crinière qui rappelle 
                le soleil.',
            ],
            [
                'img' => 'tigre.webp',
                'name' => 'Tigre',
                'description' => 'Aisément reconnaissable à sa fourrure rousse rayée de noir, le tigre Panthera 
                tigris est le plus grand félin sauvage et l\'un des plus grands carnivores terrestres.
                 Super-prédateur, il chasse principalement les cerfs et les sangliers, bien qu\'il puisse s\'attaquer
                  à des proies de taille plus importante comme les buffles.',
            ],
            [
                'img' => 'hyene.webp',
                'name' => 'Hyène',
                'description' => 'La hyène tachetée, la plus connue, arbore l\'apparence d\'un chien avec des 
                oreilles en pointe, de hautes pattes et une queue mi-longue pourvue d\'une touffe. L\'avant du corps 
                est puissant et le pelage marron tacheté de noir est souvent ébouriffé. Sa longueur varie de 95 à 
                165 cm, pour un poids compris entre 15 et 85 kg.',
            ],
            [
                'img' => 'guepard.jpg',
                'name' => 'Guépard',
                'description' => 'Le guépard est un félin taillé pour le sprint sur de courtes distances avec 
                son allure svelte et ses membres élancés. Peu endurant et souvent bredouille dans ses chasses, il doit 
                ensuite se reposer longuement pour récupérer de ses courses et est très exposé aux autres prédateurs 
                comme la hyène tachetée.',
            ],
            [
                'img' => 'ours.jpg',
                'name' => 'Ours',
                'description' => 'Les ours modernes ont comme caractéristiques un corps grand, trapu et massif,
                 un long museau, un pelage dense, des pattes plantigrades à cinq griffes non rétractiles et une
                  queue courte. L\'ours blanc est principalement carnassier. Le panda géant se nourrit presque 
                  exclusivement de bambou.',
            ],
            [
                'img' => 'alligator.jpg',
                'name' => 'Alligator',
                'description' => 'L\'alligator d\'Amérique appelé aussi alligator américain ou alligator du Mississippi
                 est un reptile carnivore appartenant à la famille des alligatoridés et vivant sur le continent 
                 américain, en Floride principalement. A la différence du crocodile, il a son museau plus large 
                 et arrondi.',
            ],
            [
                'img' => 'orque.webp',
                'name' => 'Orque',
                'description' => 'L\'orque est facilement reconnaissable à sa ligne noire et blanche et à la 
                taille de sa nageoire dorsale qui peut atteindre 2 m de hauteur chez les mâles alors qu\'elle ne 
                dépasse pas 90 cm chez les femelles (la différence de taille de cette nageoire entre les mâles et
                 les femelles constitue ce qu\'on appelle le ...',
            ],
            [
                'img' => 'requin.jpg',
                'name' => 'Requin',
                'description' => 'Le requin se caractérise par sa silhouette fuselée, particulièrement hydrodynamique, 
                et ses nageoires pectorales et dorsales, ainsi que sa nageoire caudale hétérocerque 
                (de forme asymétrique). Il est pourvu d\'un squelette entièrement cartilagineux et de cinq à sept 
                fentes branchiales latérales selon les espèces.',
            ],
            [
                'img' => 'serpent.jpg',
                'name' => 'Serpent',
                'description' => 'Les serpents sont des animaux à sang froid sans pattes de la classe des reptiles,
                 et de l\'ordre des squamates. L\'ensemble des serpents forme le sous-ordre des Serpentes. 
                 La famille qui inclut les lézards et des serpents s\'appelle les sauriens. Ce sont des vertébrés 
                 ovipares : ils pondent des œufs pour se reproduire.',
            ],
            [
                'img' => 'loup.jpg',
                'name' => 'Loup',
                'description' => 'La silhouette générale du Loup ressemble à celle d\'un chien de berger mais avec 
                un avant-train plus puissant.',
            ],
            [
                'img' => 'elephant.jpg',
                'name' => 'Éléphant',
                'description' => 'Un éléphant d\'Afrique mâle adulte mesure 3,50 mètres au garrot et pèse 5 à 
                6 tonnes, une femelle adulte mesure 3 mètres de haut au garrot pour une masse de 4 tonnes environ. 
                À la naissance, l\'éléphant pèse environ 120 kg . Un éléphant vit en moyenne 60 ans.',
            ],
            [
                'img' => 'scorpion.jpg',
                'name' => 'Scorpion',
                'description' => 'Il soigne son image, cherche l\'approbation de ses pairs, veut être aimé 
                et reconnu dans ce qu\'il fait. Le natif est ambitieux et n\'a pas peur du danger. Il aime 
                défier les interdits, éprouver de fortes sensations, tester ses limites. Enfant,
                 l\'homme Scorpion était sûrement casse-cou !',
            ],

        ];
    }

    public function getArmes(): array
    {
        return [
            [
                'img' => 'mine_terrestre.jpeg',
                'name' => 'Mine terrestre',
                'description' => 'Une mine terrestre est une charge explosive conçue et placée de façon à
                 être déclenchée, par l\'action involontaire de l\'ennemi, au passage de personnes ou 
                 de véhicules.',
            ],
            [
                'img' => 'drone_de_combat.jpg',
                'name' => 'Drone de combat',
                'description' => 'Un drone de combat est un type particulier de drone. Il est équipé 
                de matériel d\'observation et/ou d\'armements divers. Il doit être distingué du drone
                 suicide, aussi appelé "munition rôdeuse", qui est également un drone de combat, mais
                  constitue lui-même la munition principale.',
            ],
            [
                'img' => 'missile.jpg',
                'name' => 'Missile',
                'description' => 'missile. Projectile faisant partie d\'un système d\'arme à charge 
                militaire classique ou nucléaire doté d\'un système de propulsion autonome et guidé sur toute
                 ou partie de sa trajectoire par autoguidage ou téléguidage.',
            ],
            [
                'img' => 'torpille.png',
                'name' => 'Torpille',
                'description' => 'La torpille reste l\'instrument privilégié de la lutte anti-sous-marine et
                 équipe tous les types de sous-marins, mais aussi certains bâtiments de surface et des avions.
                  Une torpille moderne se présente typiquement comme un cylindre de 6 m de long pour 30 à 70 cm 
                  de diamètre et une masse de l\'ordre de 1 t',
            ],
            [
                'img' => 'groupe_terroriste.jpg',
                'name' => 'Attaque terroriste',
                'description' => 'Le terrorisme est l\'emploi de la terreur à des fins idéologiques, politiques
                 ou religieuses. Les multiples définitions varient sur : l\'usage de la violence,
                  les techniques utilisées, la nature du sujet, l\'usage de la peur, le niveau d\'organisation,
                   l\'idéologie, etc.',
            ],
        ];
    }
}
