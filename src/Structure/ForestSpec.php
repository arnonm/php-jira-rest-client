<?php

namespace JiraRestApi\Structure;

use JiraRestApi\ClassSerialize;

/**
 * Description of Permission.
 *
 */
class ForestSpec
{
    use ClassSerialize;

    /**
     * @var int
     */
    public $structureId;

    public function jsonSerialize()
    {
        return array_filter(get_object_vars($this));
    }

}
