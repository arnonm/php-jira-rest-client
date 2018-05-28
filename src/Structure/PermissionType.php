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
    public $rule;

    /**
     * @var string
     */
    public $subject;

    /**
     * @var string
     */
    public $level;

    /**
     * @var string
     */
    public $groupId;

    /**
     * @var string
     */
    public $projectId;

    /**
     * @var string
     */
    public $roleId;

    /**
     * @var string
     */
    public $username;

    /**
     * @var string
     */
    public $structureId;

}
