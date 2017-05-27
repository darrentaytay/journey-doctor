<?php

use JourneyDoctor\Sorters\BoardingPassCollectionSorter;
use JourneyDoctor\Collections\BoardingPassCollection;
use JourneyDoctor\BoardingPass\FlightBoardingPass;

/**
 * @group BoardingPassCollectionSorter
 */
class BoardingPassCollectionSorterTest extends PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function sortsBoardingPasses()
    {
        $boardingPassCollection = new BoardingPassCollection;
        $boardingPassCollection->add(
            new FlightBoardingPass('Stockholm', 'Budapest'),
            new FlightBoardingPass('Budapest', 'Barcelona'),
            new FlightBoardingPass('Edinburgh', 'Heathrow'),
            new FlightBoardingPass('Heathrow', 'Stockholm'),
            new FlightBoardingPass('Dunfermline', 'Edinburgh'),
            new FlightBoardingPass('Barcelona', 'Dubai'),
            new FlightBoardingPass('Kirkcaldy', 'Dunfermline')
        );

        $sorted = (new BoardingPassCollectionSorter($boardingPassCollection))->sort();

        $this->assertEquals('Kirkcaldy', $sorted->first()->getStartLocation());
        $this->assertEquals('Dubai', $sorted->last()->getEndLocation());
        $this->assertEquals(7, count($sorted));
    }

}
