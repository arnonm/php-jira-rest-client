<?php

namespace JiraRestApi\Structure;
use JiraRestApi\Configuration\ConfigurationInterface;
use Monolog\Logger;

/**
 * Class to perform all user related queries.
 *
 * @author Anik
 */
class StructureService extends \JiraRestApi\JiraClient
{
    private $uri = '/structure';


    public function __construct(ConfigurationInterface $configuration = null, Logger $logger = null, $path = './')
    {
        parent::__construct($configuration, $logger, $path);
        parent::setAPIUri('/rest/structure/latest');
    }

    /**
     * get all Structures list.
     *
     * @param array $paramArray
     *
     * @throws \JiraRestApi\JiraException
     *
     * @return Structure[] array of Structures class
     */
    public function getAllStructures()
    {
        $ret = $this->exec($this->uri, null);
        $xml = simplexml_load_string($ret);
        $json = json_encode($xml);

        $structures = $this->json_mapper->mapArray(
            json_decode($json, false), new \ArrayObject(), '\JiraRestApi\Structure\Structure'
        );

        return $structures;
    }

    /**
     * get an existing Structure.
     *
     * @param $id Structure id
     *
     * @return Structure
     *
     *
     */
    public function get($id, $withPermissions = False, $withOwner = False)
    {
        $paramArray = array(
            'withPermission' => $withPermissions,
            'withOwner' => $withOwner);

        $ret = $this->exec($this->uri.'/'.$id.$this->toHttpQueryParameter($paramArray));
        $this->log->addInfo('Result='.$ret);

        $xml = simplexml_load_string($ret);
        $json = json_encode($xml);

        $results = $this->json_mapper->map(
            json_decode($json), new StructureType()
        );
        return $results;
    }

    public function create($ver)
    {
        throw new JiraException('create Structure not yet implemented');
    }

    public function update($ver)
    {
        throw new JiraException('update Structure not yet implemented');
    }

    public function delete($ver)
    {
        throw new JiraException('delete Structure not yet implemented');
    }



}
