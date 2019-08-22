<?php

namespace App\DataFixtures;

use App\Entity\Artiste;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;

class ArtisteFixtures extends Fixture
{
    private static $artisteName = [
        'Lunatic',
        'Bob Marley',
        'Duke Ellington',
        'Wu Tang Clan',
        'Idris Muhamad',
        'Love Bird',
        'System Of A Down',
        'Hindi Zahra'
    ];
    private static $artisteStyle = [
        'Metal',
        'World music',
        'Rap',
        'Jazz'
    ];
    private static $artistePresentation = [
        '2 minutes 30 de batterie qui roule sous une volée de guitares râpeuses et de voix qui se bagarrent au fin fond
         d’un transistor nineties, voici 51 BLACK SUPER.',
        'Amadou & Mariam, c’est avant tout une histoire d’amour. 25 ans qu’ils se sont rencontrés à l’Institut des
        Jeunes Aveugles. Presqu’autant qu’ils font la route ensemble, complices à la vie comme à la scène.',
    ];

    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();

        for ($i = 0; $i < 10; $i++) {
            $artiste = new Artiste();
            $artiste
                ->setNom($faker->randomElement(self::$artisteName))
                ->setPays($faker->country)
                ->setStyle($faker->randomElement(self::$artisteStyle))
                ->setPresentation($faker->randomElement(self::$artistePresentation))
                ;
                $manager->persist($artiste);
          }
        // $product = new Product();

        $manager->flush();
    }
}
