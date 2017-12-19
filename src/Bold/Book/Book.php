<?php

namespace Bold\Book;

use Bold\Model;

/**
 * Class Book
 * @package Bold\Book
 */
class Book extends Model
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $bookDate;

    /**
     * @return string
     */
    public function getName() : string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getBookDate() : string
    {
        return $this->bookDate;
    }

    /**
     * @param string $bookDate
     */
    public function setBookDate(string $bookDate)
    {
        $this->bookDate = $bookDate;
    }
}
