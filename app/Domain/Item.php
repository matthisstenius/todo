<?php namespace Todo\Domain;

use Eloquent;

class Item extends Eloquent
{
    protected $fillable = ['name', 'completed'];

    /**
     * Add new item
     *
     * @param string $name
     * @return Item
     */
    public static function add($name)
    {
        return new self($name, false);
    }
}