<?php

namespace JiraRestApi\Structure;

use JiraRestApi\ClassSerialize;

/**
 * Description of User.
 *
 * @author Anik
 */
class StructureType
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
    
}
