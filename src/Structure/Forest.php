<?php

namespace JiraRestApi\Structure;

use JiraRestApi\ClassSerialize;
use JiraRestApi\Dumper;
/**
 * Description of Forest.
 *
 */
class Forest implements \JsonSerializable
{
    use ClassSerialize;

    /**
     * @var ForestSpec
     */
    public $spec;

    /**
     * @var array ForestFormula
     */
    public $formula;

    /**
     * @var ForestitemType[]
     */
    public $itemTypes;

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
        $this->spec = new ForestSpec();
        $this->formula  = new ForestFormula();
        $this->itemTypes = new ForestitemType();
    }
}
