<?php

use JourneyDoctor\Builders\BoardingPassCollectionBuilder;
use JourneyDoctor\Collections\BoardingPassCollection;

/**
 * @group BoardingPassCollectionBuilder
 */
class BoardingPassCollectionBuilderTest extends PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function itCanBuildABoardingPassCollectionFromJson()
    {
        $builder = new BoardingPassCollectionBuilder;
        $collection = $builder->fromJson(file_get_contents('sampledata.json'))->build();

        $this->assertInstanceOf(BoardingPassCollection::class, $collection);
        $this->assertEquals(4, count($collection));
    }

    /**
     * @test
     * @expectedException JourneyDoctor\Exceptions\NoDataProvidedException
     */
    public function itCantBuildWithoutData()
    {
        $builder = new BoardingPassCollectionBuilder;
        $collection = $builder->build();
    }
}
