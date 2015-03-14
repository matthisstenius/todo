<?php namespace Todo\Domain;

use Eloquent;

class Item extends Eloquent
{
    protected $fillable = ['title', 'completed'];

    protected $primaryKey = '_id';

    protected $casts = [
        'completed' => 'boolean'
    ];

    /**
     * Add new item
     *
     * @param Title $title
     * @return Item
     */
    public static function add(Title $title)
    {
        $completed = false;

        return new self(compact('title', 'completed'));
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

    /**
     * Mark item as completed
     */
    public function complete()
    {
        $this->completed = true;
    }

    /**
     * Mark item as un complete
     */
    public function unComplete()
    {
        $this->completed = false;
    }

    /**
     * Check if item is completed
     *
     * @return bool
     */
    public function isCompleted()
    {
        return (bool) $this->completed;
    }
}