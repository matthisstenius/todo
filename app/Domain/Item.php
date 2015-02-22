<?php namespace Todo\Domain;

use Eloquent;

class Item extends Eloquent
{
    protected $fillable = ['name', 'completed'];

    public function __construct(Name $name)
    {
        $this->name = $name;
        $this->completed = false;
    }

    /**
     * Add new item
     *
     * @param Name $name
     * @return Item
     */
    public static function add(Name $name)
    {
        return new self($name);
    }
}