<?php

namespace JiraRestApi\Zapi;


class JsonMapperHelper 
{

    /**
     * Handle undefined properties during JsonMapper::map().
     *
     * @param object $object    Object that is being filled
     * @param string $propName  Name of the unknown JSON property
     * @param mixed  $jsonValue JSON value of the property
     *
     * @return void
     */
    public static function setUndefinedProperty($object, $propName, $jsonValue)
    {
        $json_mapper = new \JsonMapper();
        if (is_int((int)$propName)) {
                if (is_object($jsonValue)) {
                    $cycle = $json_mapper->map($jsonValue, new Cycle());
                    $object->{$propName} = $cycle;
                    $object->cycle[$propName] = $cycle;
                }
        }
    }

}
