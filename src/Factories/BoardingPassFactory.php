<?php

namespace JourneyDoctor\Factories;

use JourneyDoctor\BoardingPass\Interfaces\BoardingPassInterface;
use JourneyDoctor\BoardingPass\AirportBusBoardingPass;
use JourneyDoctor\BoardingPass\BusBoardingPass;
use JourneyDoctor\BoardingPass\FlightBoardingPass;
use JourneyDoctor\BoardingPass\TrainBoardingPass;
use JourneyDoctor\Exceptions\InvalidBoardingPassTypeException;
use JourneyDoctor\Exceptions\InvalidBoardingPassDataException;

/**
 * This class is responsible for making the correct BoardingPass
 * object.
 */
class BoardingPassFactory {

    /**
     * Make the correct BoardingPass based on it's properties.
     *
     * @param  string $type
     * @return BoardingPass
     */
    public static function make(array $properties): BoardingPassInterface
    {
        if(!isset($properties['type']) || !isset($properties['to']) || !isset($properties['from'])) {
            throw new InvalidBoardingPassDataException('Boarding passes require the "type", "to" and "from" attributes.');
        }

        switch($properties['type'])
        {
            case "flight":
                return static::makeFlightBoardingPass($properties);
            case "train":
                return static::makeTrainBoardingPass($properties);
            case "bus":
                return static::makeBusBoardingPass($properties);
            case "airportbus":
                return static::makeAirportBusBoardingPass($properties);
            default:
                throw new InvalidBoardingPassTypeException(
                    sprintf('%s is not a recognised boarding pass type', $properties['type'])
                );
        }
    }

    /**
     * Make a FlightBoardingPass.
     *
     * @param  array  $properties
     * @return FlightBoardingPass
     */
    private static function makeFlightBoardingPass(array $properties): FlightBoardingPass
    {
        $flightBoardingPass = new FlightBoardingPass(
            $properties['from'],
            $properties['to'],
            isset($properties['seat']) ? $properties['seat'] : ''
        );

        if(isset($properties['baggage'])) {
            $flightBoardingPass->setBaggage($properties['baggage']);
        }

        if(isset($properties['gate'])) {
            $flightBoardingPass->setGate($properties['gate']);
        }

        if(isset($properties['flight'])) {
            $flightBoardingPass->setFlightNumber($properties['flight']);
        }

        return $flightBoardingPass;
    }

    /**
     * Make a TrainBoardingPass.
     *
     * @param  array  $properties
     * @return TrainBoardingPass
     */
    private static function makeTrainBoardingPass(array $properties): TrainBoardingPass
    {
        $trainBoardingPass = new TrainBoardingPass(
            $properties['from'],
            $properties['to'],
            isset($properties['seat']) ? $properties['seat'] : ''
        );

        if(isset($properties['train'])) {
            $trainBoardingPass->setTrainNumber($properties['train']);
        }

        return $trainBoardingPass;
    }

    /**
     * Make a BusBoardingPass.
     *
     * @param  array  $properties
     * @return BusBoardingPass
     */
    private static function makeBusBoardingPass(array $properties): BusBoardingPass
    {
        $busBoardingPass = new BusBoardingPass(
            $properties['from'],
            $properties['to'],
            isset($properties['seat']) ? $properties['seat'] : ''
        );

        return $busBoardingPass;
    }

    /**
     * Make a AirportBusBoardingPass.
     *
     * @param  array  $properties
     * @return BusBoardingPass
     */
    private static function makeAirportBusBoardingPass(array $properties): AirportBusBoardingPass
    {
        $busBoardingPass = new AirportBusBoardingPass(
            $properties['from'],
            $properties['to'],
            isset($properties['seat']) ? $properties['seat'] : ''
        );

        return $busBoardingPass;
    }

}
