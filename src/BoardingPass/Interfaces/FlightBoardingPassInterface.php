<?php

namespace JourneyDoctor\BoardingPass\Interfaces;

interface FlightBoardingPassInterface {

    /**
     * Set the flight number.
     *
     * @param string $flightNumber
     */
    public function setFlightNumber(string $flightNumber);

    /**
     * Set the baggage information.
     *
     * @param string $baggage
     */
    public function setBaggage(string $baggage);

    /**
     * Set the gate.
     *
     * @param string $gate
     */
    public function setGate(string $gate);

    /**
     * Get the flight number.
     *
     * @return string
     */
    public function getFlightNumber();

    /**
     * Get baggage information.
     *
     * @return string
     */
    public function getBaggage();

    /**
     * Get the gate.
     */
    public function getGate();

}
