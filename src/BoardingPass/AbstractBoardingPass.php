<?php

namespace JourneyDoctor\BoardingPass;

use JourneyDoctor\BoardingPass\Interfaces\BoardingPassInterface;

abstract class AbstractBoardingPass implements BoardingPassInterface {

    /**
     * Start location.
     *
     * @var string
     */
    protected $startLocation;

    /**
     * End location.
     *
     * @var string
     */
    protected $endLocation;

    /**
     * Seat assignment.
     *
     * @var string
     */
    protected $seat;

    public function __construct(string $from, string $to, string $seat = '')
    {
        $this->startLocation = $from;
        $this->endLocation   = $to;
        $this->seat          = $seat;
    }

    /**
     * Get the start location.
     *
     * @return string
     */
    public function getStartLocation(): string
    {
        return $this->startLocation;
    }

    /**
     * Get the end location.
     *
     * @return string
     */
    public function getEndLocation(): string
    {
        return $this->endLocation;
    }

    /**
     * Get the seating assignment.
     *
     * @return string
     */
    public function getSeat(): string
    {
        return $this->seat;
    }

    /**
     * Determine if this Boarding Pass has seat allocation.
     *
     * @return boolean
     */
    public function hasSeat(): bool
    {
        return !empty($this->seat);
    }

    /**
     * Determine if this Boarding Pass starts at the given location
     *
     * @return bool
     */
    public function startsAt(string $location): bool
    {
        return ($this->getStartLocation() == $location);
    }

    /**
     * Determine if this Boarding Pass starts at the given location
     *
     * @return bool
     */
    public function endsAt(string $location): bool
    {
        return ($this->getEndLocation() == $location);
    }

}
