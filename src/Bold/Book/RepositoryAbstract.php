<?php

namespace Bold\Book;

/**
 * Class RepositoryAbstract
 * @package Bold\Book
 */
abstract class RepositoryAbstract
{
    /**
     * @var
     */
    protected $persistence;

    /**
     * RepositoryAbstract constructor.
     * @param \PDO $persistence
     */
    public function __construct(\PDO $persistence)
    {
        $this->persistence = $persistence;
    }

    /**
     * @param array $params
     * @return array
     */
    abstract public function search(array $params) : array;
}
