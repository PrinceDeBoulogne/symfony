<?php

namespace App\Tests;

use App\Service\Programmation;
use PHPUnit\Framework\TestCase;
use App\Entity\Evenement;
use App\Entity\Artiste;


class ProgrammationTest extends TestCase
{

    private $programmation;

    public function setUp()
    {
        $this->programmation = new Programmation();
    }

    /**
     * @dataProvider dateProvider
     */
    public function testIsPast($date, $expected)
    {
        $result = $this->programmation->isPast($date);
        $this->assertEquals($expected, $result);
    }

    public function dateProvider()
    {
        return
        [
            'date_1' => [new \DateTime('2005-04-12'), true],
            'date_2' => [new \DateTime('2020-04-12'), false],
        ];
    }
}
