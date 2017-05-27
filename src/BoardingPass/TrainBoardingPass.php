<?php

namespace JourneyDoctor\BoardingPass;

final class TrainBoardingPass extends AbstractBoardingPass
{
    /**
     * Train number.
     *
     * @var string
     */
    protected $trainNumber;

    /**
     * Set the Train Number.
     *
     * @param string $trainNumber
     */
    public function setTrainNumber(string $trainNumber)
    {
        $this->trainNumber = $trainNumber;
    }

    /**
     * Get the Train Number.
     *
     * @return string
     */
    public function getTrainNumber(): string
    {
        return $this->trainNumber;
    }

    /**
     * Cast TrainBoardingPass to a string.
     *
     * @return string
     */
    public function __toString(): string
    {
        return sprintf(
            'Take train %s from %s to %s. Sit in seat %s.',
            $this->getTrainNumber(),
            $this->getStartLocation(),
            $this->getEndLocation(),
            $this->getSeat()
        );
    }
}
