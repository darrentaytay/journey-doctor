<?php

use JourneyDoctor\Builders\BoardingPassCollectionBuilder;
use JourneyDoctor\Collections\BoardingPassCollection;
use JourneyDoctor\Sorters\BoardingPassCollectionSorter;
use JourneyDoctor\Journey;

/**
 * @group Journey
 */
class SortingBoardingPassesTest extends PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function itCorrectlySortsAJourney()
    {
        $builder                = new BoardingPassCollectionBuilder;
        $boardingPassCollection = $builder->fromJson(file_get_contents('sampledata.json'))->build();
        $sorted                 = (new BoardingPassCollectionSorter($boardingPassCollection))->sort();

        $journey = new Journey($sorted);

        $this->assertEquals($this->getExpectedOutput(), (string) $journey);
    }

    private function getExpectedOutput()
    {
        return "1. Take train 78A from Madrid to Barcelona. Sit in seat 45B.
2. Take the airport bus from Barcelona to Gerona Airport. No seat assignment.
3. From Gerona Airport, take flight SK455 to Stockholm. Gate 45B, seat 3A.
Baggage drop at ticket counter 344.
4. From Stockholm, take flight SK22 to New York JFK. Gate 22, seat 7B.
Baggage will we automatically transferred from your last leg.
5. You have arrived at your final destination.";
    }
}
