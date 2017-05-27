<?php

namespace JourneyDoctor\BoardingPass;

final class AirportBusBoardingPass extends BusBoardingPass
{
    /**
     * Cast AirportBusBoardingPass to a string.
     *
     * @return string
     */
    public function __toString(): string
    {
        $seat = $this->hasSeat() ? sprintf('Sit in seat %s.', $this->getSeat()) : 'No seat assignment';

        return sprintf(
            'Take the airport bus from %s to %s. %s.',
            $this->getStartLocation(),
            $this->getEndLocation(),
            $seat
        );
    }
}
