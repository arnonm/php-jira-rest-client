<?php

namespace JiraRestApi\Structure;

use JiraRestApi\ClassSerialize;

/**
 * Description of Permission.
 *
 */
class PermissionType
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
    public $adminable;

    /**
     * @var string
     */
    public $owner;


}
