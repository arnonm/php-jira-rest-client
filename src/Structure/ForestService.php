<?php

namespace JiraRestApi\Structure;
use JiraRestApi\Dumper;
/**
 * Class to perform all Forest related queries.
 *
  */
class ForestService extends \JiraRestApi\JiraClient
{
    private $uri = '/forest/latest';


    public function __construct(ConfigurationInterface $configuration = null, Logger $logger = null, $path = './')
    {
        parent::__construct($configuration, $logger, $path);
        parent::setAPIUri('/rest/structure/2.0');
    }


    public function getForestComponents($forestcomponents)
    {
        $components= explode(",", $forestcomponents[0]);
        $results = array_map(function ($elem) {
                return explode (":", $elem);
            }, $components);

        return $results;
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
     * @return Forest|object
     *
     *  https://jira-t3.devtools.intel.com/rest/structure/2.0/forest/latest?s={%22structureId:1318%22}
     *  https://jira-t3.devtools.intel.com/rest/structure/2.0/forest/latest?s={%22structureId%22:1318}
     */
    public function get($id)
    {
        $paramArray = array(
            's' => '{%22structureId%22:'.$id.'}');

        $ret = $this->exec($this->uri.$this->toHttpQueryParameter($paramArray));
        $this->log->addInfo('Result='.$ret);

        $results = $this->json_mapper->map(
            json_decode($ret), new Forest()
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
