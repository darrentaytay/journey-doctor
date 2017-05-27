<?php

use JourneyDoctor\Factories\BoardingPassFactory;

/**
 * @group BoardingPassFactoryTest
 */
class BoardingPassFactoryTest extends PHPUnit_Framework_TestCase
{
    /**
     * @test
     * @expectedException JourneyDoctor\Exceptions\InvalidBoardingPassTypeException
     */
    public function itCantBuildAnInvalidBoardingPassType()
    {
        $data = ['type' => 'segway', 'from' => 'edinburgh', 'to' => 'dubai'];

        BoardingPassFactory::make($data);
    }

    /**
     * @test
     * @expectedException JourneyDoctor\Exceptions\InvalidBoardingPassDataException
     */
    public function itRequiresFromToType()
    {
        BoardingPassFactory::make([]);
    }

    /**
     * @test
     */
    public function itCanBuildAFlightBoardingPass()
    {
        $flight = [
            'type'    => 'flight',
            'from'    => 'Edinburgh',
            'to'      => 'Dubai',
            'baggage' => 'We keep your baggage.',
            'gate'    => '22B',
            'flight'  => '44XA',
            'seat'    => '13C',
        ];

        $flight = BoardingPassFactory::make($flight);

        $this->assertInstanceOf(JourneyDoctor\BoardingPass\FlightBoardingPass::class, $flight);
        $this->assertInstanceOf(JourneyDoctor\BoardingPass\Interfaces\BoardingPassInterface::class, $flight);

        $this->assertEquals('Edinburgh', $flight->getStartLocation());
        $this->assertEquals('Dubai', $flight->getEndLocation());
        $this->assertEquals('We keep your baggage.', $flight->getBaggage());
        $this->assertEquals('22B', $flight->getGate());
        $this->assertEquals('44XA', $flight->getFlightNumber());
        $this->assertEquals('13C', $flight->getSeat());
    }

    /**
     * @test
     */
    public function itCanBuildATrainBoardingPass()
    {
        $train = [
            'type'  => 'train',
            'from'  => 'Edinburgh',
            'to'    => 'Glasgow',
            'train' => 'X32',
            'seat'  => '55J',
        ];

        $train = BoardingPassFactory::make($train);

        $this->assertInstanceOf(JourneyDoctor\BoardingPass\TrainBoardingPass::class, $train);
        $this->assertInstanceOf(JourneyDoctor\BoardingPass\Interfaces\BoardingPassInterface::class, $train);

        $this->assertEquals('Edinburgh', $train->getStartLocation());
        $this->assertEquals('Glasgow', $train->getEndLocation());
        $this->assertEquals('X32', $train->getTrainNumber());
        $this->assertEquals('55J', $train->getSeat());
    }

    /**
     * @test
     */
    public function itCanBuildABusBoardingPass()
    {
        $bus = [
            'type'  => 'bus',
            'from'  => 'Kirkcaldy',
            'to'    => 'Edinburgh',
            'seat'  => 'AP1',
        ];

        $bus = BoardingPassFactory::make($bus);

        $this->assertInstanceOf(JourneyDoctor\BoardingPass\BusBoardingPass::class, $bus);
        $this->assertInstanceOf(JourneyDoctor\BoardingPass\Interfaces\BoardingPassInterface::class, $bus);

        $this->assertEquals('Kirkcaldy', $bus->getStartLocation());
        $this->assertEquals('Edinburgh', $bus->getEndLocation());
        $this->assertEquals('AP1', $bus->getSeat());
    }
}
