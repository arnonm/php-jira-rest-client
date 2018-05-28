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
     * @var string
     */
    public $id;

    /**
     * @var string
     */
    public $name;

    /**
     * @var array "#/definitions/simple-list-wrapper"
     */
    public $description;

    /**
     * @var boolean
     */
    public $automationAccessAllowed;

    /**
     * @var boolean
     */
    public $readOnly;

    /**
     * @var boolean
     */
    public $editRequiresParentIssuePermission;

    /**
     * @var boolean
     */
    public $adminable;

    /**
     * @var string
     */
    public $owner;

    /**
     * @var array "#/definitions/simple-list-wrapper"
     */
    public $permissions;


}
