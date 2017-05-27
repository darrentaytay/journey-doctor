<?php

use JourneyDoctor\BoardingPass\FlightBoardingPass;
use JourneyDoctor\Collections\BoardingPassCollection;

/**
 * @group BoardingPassCollection
 */
class BoardingPassCollectionTest extends PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function canAddASingleBoardingPass()
    {
        $boardingPass = new FlightBoardingPass('Edinburgh', 'Dubai');

        $boardingPassCollection = new BoardingPassCollection;
        $boardingPassCollection->add($boardingPass);

        $this->assertEquals(1, count($boardingPassCollection));
    }

    /**
     * @test
     */
    public function canAddMultipleBoardingPasses()
    {
        $edinburghPass = new FlightBoardingPass('Edinburgh', 'Dubai');
        $dubaiPass     = new FlightBoardingPass('Edinburgh', 'Dubai');

        $boardingPassCollection = new BoardingPassCollection;
        $boardingPassCollection->add($edinburghPass, $dubaiPass);

        $this->assertEquals(2, count($boardingPassCollection));
    }

    /**
     * @test
     * @expectedException TypeError
     */
    public function cantAddInvalidType()
    {
        $boardingPassCollection = new BoardingPassCollection;
        $boardingPassCollection->add('Edinburgh');
    }

    /**
     * @test
     */
    public function countWithNoBoardingPassesReturnsZero()
    {
        $boardingPassCollection = new BoardingPassCollection;

        $this->assertEquals(0, count($boardingPassCollection));
    }

    /**
     * @test
     */
    public function arrayAccessMethods()
    {
        $edinburghPass = new FlightBoardingPass('Kirkcaldy', 'Edinburgh');
        $dubaiPass     = new FlightBoardingPass('Edinburgh', 'Dubai');

        $boardingPassCollection = new BoardingPassCollection;
        $boardingPassCollection->add($edinburghPass, $dubaiPass);

        $this->assertEquals('Kirkcaldy', $boardingPassCollection[0]->getStartLocation());
        $this->assertEquals('Edinburgh', $boardingPassCollection[1]->getStartLocation());
    }

    /**
     * @test
     */
    public function itPrependsToTheStart()
    {
        $edinburghPass = new FlightBoardingPass('Kirkcaldy', 'Edinburgh');
        $dubaiPass     = new FlightBoardingPass('Edinburgh', 'Dubai');
        $saudiPass     = new FlightBoardingPass('Dubai', 'Saudi');

        $boardingPassCollection = new BoardingPassCollection;
        $boardingPassCollection->add($edinburghPass, $dubaiPass);
        $boardingPassCollection->prepend($saudiPass);

        $this->assertEquals('Dubai', $boardingPassCollection[0]->getStartLocation());
        $this->assertEquals('Saudi', $boardingPassCollection[0]->getEndLocation());
    }

    /**
     * @test
     */
    public function itPullsFromTheCollection()
    {
        $edinburghPass = new FlightBoardingPass('Kirkcaldy', 'Edinburgh');
        $dubaiPass     = new FlightBoardingPass('Edinburgh', 'Dubai');
        $saudiPass     = new FlightBoardingPass('Dubai', 'Saudi');

        $boardingPassCollection = new BoardingPassCollection;
        $boardingPassCollection->add($edinburghPass, $dubaiPass, $saudiPass);

        $this->assertEquals(3, count($boardingPassCollection));

        $pull = $boardingPassCollection->pull(0);

        $this->assertEquals(2, count($boardingPassCollection));
        $this->assertEquals('Kirkcaldy', $pull->getStartLocation());
    }

    /**
     * @test
     */
    public function itPushesToTheCollection()
    {
        $edinburghPass = new FlightBoardingPass('Kirkcaldy', 'Edinburgh');
        $dubaiPass     = new FlightBoardingPass('Edinburgh', 'Dubai');
        $saudiPass     = new FlightBoardingPass('Dubai', 'Saudi');

        $boardingPassCollection = new BoardingPassCollection;
        $boardingPassCollection->add($edinburghPass, $dubaiPass);

        $this->assertEquals(2, count($boardingPassCollection));

        $boardingPassCollection->push($saudiPass);

        $this->assertEquals(3, count($boardingPassCollection));
    }

    /**
     * @test
     */
    public function itPopsFromTheCollection()
    {
        $edinburghPass = new FlightBoardingPass('Kirkcaldy', 'Edinburgh');
        $dubaiPass     = new FlightBoardingPass('Edinburgh', 'Dubai');
        $saudiPass     = new FlightBoardingPass('Dubai', 'Saudi');

        $boardingPassCollection = new BoardingPassCollection;
        $boardingPassCollection->add($edinburghPass, $saudiPass, $dubaiPass);

        $this->assertEquals(3, count($boardingPassCollection));

        $poppedDubaiPass = $boardingPassCollection->pop();

        $this->assertEquals(2, count($boardingPassCollection));
        $this->assertEquals('Edinburgh', $poppedDubaiPass->getStartLocation());
        $this->assertEquals('Dubai', $poppedDubaiPass->getEndLocation());
    }

    /**
     * @test
     */
    public function itReturnsTheFirstItemInTheCollection()
    {
        $edinburghPass = new FlightBoardingPass('Kirkcaldy', 'Edinburgh');
        $dubaiPass     = new FlightBoardingPass('Edinburgh', 'Dubai');
        $saudiPass     = new FlightBoardingPass('Dubai', 'Saudi');

        $boardingPassCollection = new BoardingPassCollection;
        $boardingPassCollection->add($edinburghPass, $saudiPass, $dubaiPass);

        $this->assertEquals(3, count($boardingPassCollection));

        $firstPass = $boardingPassCollection->first();

        $this->assertEquals(3, count($boardingPassCollection));
        $this->assertEquals('Kirkcaldy', $firstPass->getStartLocation());
        $this->assertEquals('Edinburgh', $firstPass->getEndLocation());
    }

    /**
     * @test
     */
    public function itReturnsTheLastItemInTheCollection()
    {
        $edinburghPass = new FlightBoardingPass('Kirkcaldy', 'Edinburgh');
        $dubaiPass     = new FlightBoardingPass('Edinburgh', 'Dubai');
        $saudiPass     = new FlightBoardingPass('Dubai', 'Saudi');

        $boardingPassCollection = new BoardingPassCollection;
        $boardingPassCollection->add($edinburghPass, $saudiPass, $dubaiPass);

        $this->assertEquals(3, count($boardingPassCollection));

        $lastPass = $boardingPassCollection->last();

        $this->assertEquals(3, count($boardingPassCollection));
        $this->assertEquals('Edinburgh', $lastPass->getStartLocation());
        $this->assertEquals('Dubai', $lastPass->getEndLocation());
    }
}
