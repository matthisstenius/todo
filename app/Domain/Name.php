<?php

namespace Todo\Domain;

class Name
{
    /**
     * @var string
     */
    private $name;

    public function __construct($name)
    {
        $this->assertValidName($name);
        $this->name = $name;
    }

    /**
     * Get string representation of name
     *
     * @return string
     */
    public function toString()
    {
        return $this->name;
    }

    /**
     * Check if name is valid
     *
     * @param string $name
     */
    private function assertValidName($name)
    {
        if (! is_string($name) || strlen($name) < 1) {
            throw new \InvalidArgumentException("Invalid name: $name");
        }
    }
}
