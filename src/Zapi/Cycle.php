<?php

namespace JiraRestApi\Zapi;

use JiraRestApi\ClassSerialize;

/**
 * Description of User.
 *
 * @author Anik
 */

class Cycle implements \JsonSerializable
{
    use ClassSerialize;

    /**
     * uri which was hit.
     *
     * @var string
     */
    public $self;

    /**
     * @var string
     */
    public $id;

    /**
     * @var string
     */
    public $name;


    /**
     * @var string
     */
    public $description;


    /**
     * @var string
     */
    public $projectKey;


  /**
     * @var string
     */
    public $versionName;

    /**
     * @var string
     */
    public $environment;


    /**
     * @var string
     */
    public $build;



    /**
     * @var integer
     */
    public $versionId;


    /**
     * @var integer
     */
    public $projectId;


    /**
     * @var integer
     */
    public $sprintId;


    /**
     * @var integer
     */
    public $totalExecutions;


    /**
     * @var integer
     */
    public $totalExecuted;


    /**
     * @var object
     */
    public  $executionSummaries;

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

