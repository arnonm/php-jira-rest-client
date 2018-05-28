<?php

namespace JiraRestApi\Structure;

use JiraRestApi\ClassSerialize;


class ValueRequest implements \JsonSerializable
{
    use ClassSerialize;

    /**
     * @var ForestSpec
     */
    public  $forestSpec;

    /**
     * @var Array
     */
    public $rows;

    /** @var  Array */
    public $attributes;

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
        $this->forest = new Forest();
        $this->attributes = new ItemAttributes();
        $this->rows = $array;
    }
}
