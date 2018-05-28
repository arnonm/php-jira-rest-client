<?php

namespace JiraRestApi\Structure;

use JiraRestApi\ClassSerialize;

/**
 * Description of User.
 *
 * @author Anik
 */
class Structure implements \JsonSerializable
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
     * @var boolean
     */
    public $readOnly;

    /**
     * @var boolean
     */
    public $editRequiresParentIssuePermission;

    /**
     * @var array "#/definitions/simple-list-wrapper"
     */
    public $permissions;

    /**
     * @var string
     */
    public $owner;


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
