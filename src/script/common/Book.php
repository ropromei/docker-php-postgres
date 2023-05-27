<?php

class Book
{
    private $title;

    public function __construct(string $title) {
        $this->title = $title;
    }

    public function __toString()
    {
        return $this->title;
    }
}

