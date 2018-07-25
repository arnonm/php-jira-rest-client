<?php

namespace JiraRestApi\Zapi;

use JiraRestApi\ClassSerialize;

/**
 * Description of User.
 *
 * @author Anik
 */

class CycleList implements \JsonSerializable
{
    use ClassSerialize;

    /**
     * @var string
     */
    public $versionId;

    /**
     * @var \JiraRestApi\Zapi\Cycle[] 
     */
    public $cycle;

    /**
     * @var integer
     */
    public $recordsCount;


    public function getCycles(){
        return $this->cycle;

    }

    public function getCycle($cycleNumber) {
        return $this->cycle[$cycleNumber];
    }

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
        foreach ($array as $key=>$value) {
            $this->{$key} = $value;
        }
    }
}

