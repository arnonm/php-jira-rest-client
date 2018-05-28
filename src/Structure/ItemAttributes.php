<?php

namespace JiraRestApi\Structure;

use JiraRestApi\ClassSerialize;

class ItemAttributesParams implements \JsonSerializable
{
    use ClassSerialize;

    public $basedOn;

    public $resolveComplete;

    public $weightBy;

    public function jsonSerialize()
    {
        return array_filter(get_object_vars($this));
    }
}

class ItemAttributes implements \JsonSerializable
{
    use ClassSerialize;

    public  $id;

    public $format;

    public $params;


    public function jsonSerialize()
    {
        return array_filter(get_object_vars($this));
    }

    /**
     * User constructor.
     *
     * @param array $array user info array.
     */
    public function __construct()
    {
        $this->params = new ItemAttributesParams();
    }
}
