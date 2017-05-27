<?php

use JourneyDoctor\BoardingPass\BusBoardingPass;
use JourneyDoctor\BoardingPass\FlightBoardingPass;
use JourneyDoctor\Collections\BoardingPassCollection;
use JourneyDoctor\Journey;

/**
 * @group Journey
 */
class JourneyTest extends PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function acceptsBoardingPassCollection()
    {
        $journey = new Journey($this->getBoardingPassCollection());

        $this->assertEquals(2, $journey->getBoardingPasses()->count());
    }

    /**
     * @test
     * @expectedException TypeError
     */
    public function doesntAcceptArray()
    {
        $journey = new Journey(['Edinburgh', 'Heathrow', 'Dubai']);
    }

    private function getBoardingPassCollection()
    {
        $edinburgh = new BusBoardingPass('Kirkcaldy', 'Edinburgh');
        $heathrow = new FlightBoardingPass('Edinburgh', 'Heathrow');

        $collection = new BoardingPassCollection();
        $collection->add($edinburgh, $heathrow);

        return $collection;
    }
}
