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

    public $forest_spec;

    public $forest_version;

    public $items_version;

    public $rowId;

    public $under;

    public $after;

    public $before;

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
        $this->forest = new Item();
        foreach ($array as $key=>$value) {
            $this->{$key} = $value;
        }
    }
}
