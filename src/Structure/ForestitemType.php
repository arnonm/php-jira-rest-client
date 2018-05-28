<?php

namespace JiraRestApi\Structure;

use JiraRestApi\ClassSerialize;

/**
 * Description of Forest itemTypes
 *
 */
class ForestitemType implements \JsonSerializable
{
    use ClassSerialize;

    const FOLDER = "com.almworks.jira.structure:type-folder";
    const ISSUE = "com.almworks.jira.structure:type-issue";
    /**
     * @var int
     */
    public $num;

    /**
     * @var string
     */
    public $name;




    public function jsonSerialize()
    {
        return array($this->num => $this->name);
    }

    /**
     * User constructor.
     *
     * @param array $array user info array.
     */
    public function __construct($array = [])
    {
//        foreach ($array as $key=>$value) {
//            $this->{$key} = $value;
//        }
    }
}
