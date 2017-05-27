<?php

namespace JourneyDoctor\BoardingPass\Interfaces;

interface BoardingPassInterface {

    /**
     * Get the start location.
     *
     * @return string
     */
    public function getStartLocation();

    /**
     * Get the end location.
     *
     * @return string
     */
    public function getEndLocation();

    /**
     * Get seating assignment.
     *
     * @return string
     */
    public function getSeat();

}
