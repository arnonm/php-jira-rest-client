<?php

namespace JiraRestApi\Structure;

use JiraRestApi\ClassSerialize;
use JiraRestApi\Dumper;

    class ForestComponent
{
    use ClassSerialize;

    public $rowID;
    public $rowDepth;
    public $itemIdentity;
}
/**
 * Description of Permission.
 *
 */
class ForestFormula
{
    use ClassSerialize;


    /**
     * @var ForestComponent[]
     */
    public $component;

    public function __construct()
    {
        $this->component = new ForestComponent();
    }

    public function jsonSerialize()
    {
        return array_filter(get_object_vars($this));
    }
}
