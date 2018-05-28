<?php

namespace JiraRestApi\Structure;

use JiraRestApi\ClassSerialize;


class ItemRequest implements \JsonSerializable
{
    use ClassSerialize;

    /**
     * @var Item
     */
    public  $item;

    /**
     * @var Forest
     */
    public $forest;

    /**
     * @var ItemsVersion
     */
    public $items;

    public $rowId;

    public $under;

    public $after;

    public $before;

    /**
     * @var array
     */
    public $parameters;

    public function jsonSerialize()
    {
        return array_filter(get_object_vars($this));
    }

    /**
     * User constructor.
     *
     * @param array $array user info array.
     */
    public function __construct($array = [])
    {
        $this->item = new Item();
        $this->forest = new Forest();
        foreach ($array as $key=>$value) {
            $this->{$key} = $value;
        }
    }
}
