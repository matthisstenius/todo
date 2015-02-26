<?php

namespace Todo\Domain;

class Title
{
    /**
     * @var string
     */
    private $title;

    public function __construct($title)
    {
        $this->assertValidTitle($title);
        $this->title = $title;
    }

    /**
     * Get string representation of Name
     *
     * @return string
     */
    public function toString()
    {
        return $this->title;
    }

    /**
     * Get string representation of Name
     *
     * @return string
     */
    public function __toString()
    {
        return $this->title;
    }

    /**
     * Check if name is valid
     *
     * @param string $title
     */
    private function assertValidTitle($title)
    {
        if (! is_string($title) || strlen($title) < 1) {
            throw new \InvalidArgumentException("Invalid title: $title");
        }
    }
}
