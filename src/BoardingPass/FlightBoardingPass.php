<?php

namespace JourneyDoctor\BoardingPass;

final class FlightBoardingPass extends AbstractBoardingPass
{
    /**
     * Flight number.
     *
     * @var string
     */
    protected $flightNumber;

    /**
     * Baggage information.
     *
     * @var string
     */
    protected $baggage;

    /**
     * The gate for the flight.
     *
     * @var string
     */
    protected $gate;

    /**
     * Set the flight number.
     *
     * @param string $flightNumber
     */
    public function setFlightNumber(string $flightNumber)
    {
        $this->flightNumber = $flightNumber;
    }

    /**
     * Set the baggage information.
     *
     * @param string $baggage
     */
    public function setBaggage(string $baggage)
    {
        $this->baggage = $baggage;
    }

    /**
     * Set the gate.
     *
     * @param string $gate
     */
    public function setGate(string $gate)
    {
        $this->gate = $gate;
    }

    /**
     * Get the flight number.
     *
     * @return string
     */
    public function getFlightNumber(): string
    {
        return $this->flightNumber;
    }

    /**
     * Get the baggage infromation.
     *
     * @return string
     */
    public function getBaggage(): string
    {
        return $this->baggage;
    }

    /**
     * Get the gate.
     */
    public function getGate(): string
    {
        return $this->gate;
    }

    /**
     * Cast FlightBoardingPass to a string.
     *
     * @return string
     */
    public function __toString(): string
    {
        return sprintf(
            "From %s, take flight %s to %s. Gate %s, seat %s.\n%s.",
            $this->getStartLocation(),
            $this->getFlightNumber(),
            $this->getEndLocation(),
            $this->getGate(),
            $this->getSeat(),
            $this->getBaggage()
        );
    }
}
