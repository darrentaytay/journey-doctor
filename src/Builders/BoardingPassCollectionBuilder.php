<?php

namespace JourneyDoctor\Builders;

use JourneyDoctor\Collections\BoardingPassCollection;
use JourneyDoctor\Exceptions\InvalidJsonException;
use JourneyDoctor\Exceptions\NoDataProvidedException;
use JourneyDoctor\Factories\BoardingPassFactory;

class BoardingPassCollectionBuilder
{
    /**
     * The data the Collection will be built from.
     *
     * @var array
     */
    private $data = [];

    /**
     * Build the BoardingPassCollection.
     *
     * @return BoardingPassCollection
     */
    public function build(): BoardingPassCollection
    {
        if (empty($this->data)) {
            throw new NoDataProvidedException("Can't build BoardingPassCollection as no data has been supplied.");
        }

        $boardingPassCollection = new BoardingPassCollection();

        foreach ($this->data as $data) {
            $boardingPass = BoardingPassFactory::make($data);
            $boardingPassCollection->add($boardingPass);
        }

        return $boardingPassCollection;
    }

    /**
     * Build the collection from a JSON string.
     *
     * @param string $json
     *
     * @return BoardingPassCollectionBuilder
     */
    public function fromJson(string $json): BoardingPassCollectionBuilder
    {
        $data = json_decode($json, true);

        if (!$data) {
            throw InvalidJsonException('Invalid Json provided.');
        }

        $this->data = $data;

        return $this;
    }
}
