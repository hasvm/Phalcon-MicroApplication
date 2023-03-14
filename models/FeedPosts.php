<?php

namespace Api\Models;

use Phalcon\Mvc\Model;

class FeedPosts extends Model
{
    /**
     * @var integer
     */
    public $id;

    /**
     * @var date
     */
    public $created_at;

    /**
     * @var date
     */
    public $modified_at;

    /**
     * @var integer
     */
    public $channel;

    /**
     * @var integer
     */
    public $quantity;

    /**
     * @var string
     */
    public $title;

    /**
     * @var string
     */
    public $lead;

    /**
     * @var string
     */
    public $text;
}