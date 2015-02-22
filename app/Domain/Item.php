<?php namespace Todo\Domain;

use Eloquent;

class Item extends Eloquent
{
    protected $fillable = ['title', 'completed'];

    public function __construct(Title $title)
    {
        $this->title = $title;
        $this->completed = false;
    }

    /**
     * Add new item
     *
     * @param Title $title
     * @return Item
     */
    public static function add(Title $title)
    {
        return new self($title);
    }

    /**
     * Update title
     *
     * @param Title $title
     */
    public function updateTitle(Title $title)
    {
        $this->title = $title;
    }
}