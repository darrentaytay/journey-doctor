<?php

namespace JourneyDoctor\Collections;

use ArrayAccess;
use ArrayIterator;
use Countable;
use IteratorAggregate;
use JourneyDoctor\BoardingPass\Interfaces\BoardingPassInterface;

class BoardingPassCollection implements Countable, ArrayAccess, IteratorAggregate
{
    /**
     * Array of boarding passes.
     *
     * @var array
     */
    protected $boardingPasses = [];

    /**
     * Add a BoardingPass to the BoardingPassCollection.
     *
     * @param array
     */
    public function add(BoardingPassInterface ...$boardingPasses)
    {
        foreach ($boardingPasses as $boardingPass) {
            $this->boardingPasses[] = $boardingPass;
        }
    }

    /**
     * Prepend a BoardingPass.
     *
     * @param BoardingPassInterface $boardingPass
     *
     * @return BoardingPassCollection
     */
    public function prepend(BoardingPassInterface $boardingPass): BoardingPassCollection
    {
        array_unshift($this->boardingPasses, $boardingPass);

        return $this;
    }

    /**
     * Pull an item from the collection and return it.
     *
     * @param int $index
     *
     * @return BoardingPassInterface
     */
    public function pull(int $index): BoardingPassInterface
    {
        $boardingPass = $this->boardingPasses[$index];

        unset($this->boardingPasses[$index]);

        return $boardingPass;
    }

    /**
     * Push a BoardingPass onto the end of the collection.
     *
     * @param BoardingPassInterface $boardingPass
     *
     * @return BoardingPassCollection
     */
    public function push(BoardingPassInterface $boardingPass): BoardingPassCollection
    {
        array_push($this->boardingPasses, $boardingPass);

        return $this;
    }

    /**
     * Pop and return a BoardingPass from the collection.
     *
     * @return BoardingPassInterface
     */
    public function pop(): BoardingPassInterface
    {
        return array_pop($this->boardingPasses);
    }

    /**
     * Set the pointer to the first BoardingPass in the collection and return it.
     *
     * @return BoardingPassInterface
     */
    public function first(): BoardingPassInterface
    {
        return reset($this->boardingPasses);
    }

    /**
     * Set the pointer to the last BoardingPass in the collection and return it.
     *
     * @return BoardingPassInterface
     */
    public function last(): BoardingPassInterface
    {
        return end($this->boardingPasses);
    }

    /**
     * Return ArrayIterator for the BoardingPasses in the collection.
     *
     * @return ArrayIterator
     */
    public function getIterator(): ArrayIterator
    {
        return new ArrayIterator($this->boardingPasses);
    }

    /**
     * Determine if an item exists at an offset.
     * ArrayAccess interface method.
     *
     * @param mixed $key
     *
     * @return bool
     */
    public function offsetExists($key): bool
    {
        return array_key_exists($key, $this->boardingPasses);
    }

    /**
     * Get an item at a given offset.
     * ArrayAccess interface method.
     *
     * @param mixed $key
     *
     * @return mixed
     */
    public function offsetGet($key): BoardingPassInterface
    {
        return $this->boardingPasses[$key];
    }

    /**
     * Set the item at a given offset.
     * ArrayAccess interface method.
     *
     * @param mixed $key
     * @param mixed $value
     *
     * @return void
     */
    public function offsetSet($key, $value)
    {
        if (is_null($key)) {
            $this->boardingPasses[] = $value;
        } else {
            $this->boardingPasses[$key] = $value;
        }
    }

    /**
     * Unset the item at a given offset.
     * ArrayAccess interface method.
     *
     * @param string $key
     *
     * @return void
     */
    public function offsetUnset($key)
    {
        unset($this->boardingPasses[$key]);
    }

    /**
     * Count the number of boarding passes in the collection.
     * Countable interface method.
     *
     * @return int
     */
    public function count(): int
    {
        return count($this->boardingPasses);
    }
}
