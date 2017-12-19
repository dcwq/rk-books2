<?php

namespace Bold;

use Bold\Book\Book;

class BookBuilder implements ModelBuilderInterface
{
    private $book;

    public function createModel()
    {
        $this->book = new Book();
    }

    public function getModel(): Model
    {
        return $this->book;
    }
}
