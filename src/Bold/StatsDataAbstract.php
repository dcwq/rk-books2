<?php

namespace Bold;

/**
 * Class StatsDataAbstract
 * @package Bold
 */
abstract class StatsDataAbstract implements \Countable, \IteratorAggregate
{
    /**
     * @var array
     */
    protected $data = [];

    /**
     * @param array $data
     */
    public function setData(array $data)
    {
        $this->data = $data;
    }

    /**
     * @return array
     */
    public function getData() : array
    {
        return $this->data;
    }

    /**
     * @param string $index
     */
    public function sortData(string $index)
    {
        usort($this->data, function($a, $b) use ($index) {
            return $a->$index < $b->$index;
        });
    }

    /**
     * @return int
     */
    public function count() : int
    {
        return count($this->data);
    }

    /**
     * @return \ArrayIterator
     */
    public function getIterator() : \ArrayIterator
    {
        return new \ArrayIterator($this->data);
    }

}