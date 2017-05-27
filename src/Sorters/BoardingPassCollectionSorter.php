<?php

namespace JourneyDoctor\Sorters;

use JourneyDoctor\Collections\BoardingPassCollection;

class BoardingPassCollectionSorter {

    /**
     * @param BoardingPassCollection $boardingPasses
     */
    public function __construct(BoardingPassCollection $boardingPasses)
    {
        $this->boardingPasses = $boardingPasses;
    }

    /**
     * Sort the Boarding Passes and return a new, sorted Collection.
     *
     * @return BoardingPassCollection
     */
    public function sort(): BoardingPassCollection
    {
        $sorted = new BoardingPassCollection;
        $sorted->add($this->boardingPasses->pop());

        while (count($this->boardingPasses) > 0) {
            foreach($this->boardingPasses as $index => $boardingPass) {
                if($sorted->first()->startsAt($boardingPass->getEndLocation())) {
                    $sorted->prepend($this->boardingPasses->pull($index));
                }
                elseif($sorted->last()->endsAt($boardingPass->getStartLocation())) {
                    $sorted->push($this->boardingPasses->pull($index));
                }
            }
        }

        return $sorted;
    }

}
