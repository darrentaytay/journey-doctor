<?php

namespace JourneyDoctor;

use JourneyDoctor\Collections\BoardingPassCollection;

class Journey
{
    /**
     * The boarding passes for this journey.
     *
     * @var BoardingPassCollection
     */
    protected $boardingPasses;

    public function __construct(BoardingPassCollection $boardingPasses)
    {
        $this->boardingPasses = $boardingPasses;
    }

    /**
     * Get the boarding passes for this journey.
     *
     * @return BoardingPassCollection
     */
    public function getBoardingPasses(): BoardingPassCollection
    {
        return $this->boardingPasses;
    }

    /**
     * Output the Journey as a string.
     *
     * @return string
     */
    public function __toString(): string
    {
        $output = '';
        $step = 1;

        foreach ($this->boardingPasses as $pass) {
            $output .= sprintf('%s. %s', $step, $pass).PHP_EOL;
            $step++;
        }

        $output .= sprintf('%s. You have arrived at your final destination.', $step);

        return $output;
    }
}
