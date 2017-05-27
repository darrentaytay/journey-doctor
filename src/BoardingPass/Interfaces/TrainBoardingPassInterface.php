<?php

namespace JourneyDoctor\BoardingPass\Interfaces;

interface TrainBoardingPassInterface
{
    /**
     * Set the train number.
     */
    public function setTrainNumber(string $trainNumber);

    /**
     * Get the train number.
     *
     * @return string
     */
    public function getTrainNumber();
}
