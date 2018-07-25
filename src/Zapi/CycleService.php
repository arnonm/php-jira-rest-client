<?php

namespace JiraRestApi\Zapi;

use JiraRestApi\Configuration\ConfigurationInterface;
use JiraRestApi\JiraException;
use JiraRestApi\JiraClient;
use Monolog\Logger;
use JiraRestApi\Zapi\CycleList;

class CycleService extends  JiraClient
{
    //https://jira01.devtools.intel.com/rest/agile/1.0/board?projectKeyOrId=34012
    private $uri = '/cycle';

    public function __construct(ConfigurationInterface $configuration = null, Logger $logger = null, $path = './')
    {
        parent::__construct($configuration, $logger, $path);
        $this->setAPIUri('/rest/zapi/latest');
    }

    public function getCycleFromJSON($json)
    {
        $cycle= $this->json_mapper->map(
            $json, new Cycle()
        );

        return $cycle;
    }

    /**
     *  get all Cycle list.
     *
     * @param Cycle $cycleObject
     *
     * @throws JiraException
     * @throws \JsonMapper_Exception
     *
     * @return  object
     */
    public function getAllCycles($queryParam  = null) {

  		$ret = $this->exec($this->uri.$this->toHttpQueryParameter($paramArray), null);

        $results = $this->json_mapper->mapArray(
            json_decode($ret, false), new \ArrayObject(), '\JiraRestApi\Zapi\Cycle'
        );

        return $results;
    }

	public function get($cycleId)
    {
        $ret = $this->exec($this->uri."/$cycleId", null);

        $this->log->addInfo('Result='.$ret);

        $cycle = $this->json_mapper->map(
            json_decode($ret), new Cycle()
        );

        return $cycle;
    }

    

  	public function getListCycles($projectId = null, $versionId=null, $cycleId = null, 
  		$offsetId = null, $issueId=null, $expand=null)
    {
		$queryParam = '?'.http_build_query([
			"projectId" => $projectId, 
			"versionId"=> $versionId, 
			"cycleId" => $cycleId, 
			"offsetId" => $offsetId, 
			"issueId" => $issueId, 
			"expand" => $expand]);

		//print_r($this->uri.$queryParam);
        $results = $this->exec($this->uri.$queryParam, null);

    

        $this->log->addInfo("Result=\n".$results);

        
        $this->json_mapper->undefinedPropertyHandler = 
            [new \JiraRestApi\Zapi\JsonMapperHelper(), 'setUndefinedProperty'];

        return $cycle = $this->json_mapper->map(
            json_decode($results), new CycleList()
        );
    }

    public function getCycleByVersionSprint(CycleField $field)
    {

    	//http://localhost:2990/jira/rest/zapi/latest/cycle/cyclesByVersionsAndSprint
    	// {
		//   "expand": "executionSummaries",
		//   "offset": 0,
		//   "projectId": 10000,
		//   "sprintId": 1,
		//   "versionId": "-1,10000,10001,10002,10003,10004"
		// }
		$data = json_encode($field);

        $this->log->addInfo("GetCycleByVersion=\n".$data);

        $ret = $this->exec($this->uri.'', $data, 'POST');

        $cf = $this->json_mapper->map(
            json_decode($ret), new Field()
        );

        return $cf;
    }



}



// https://jira01.devtools.intel.com/rest/zapi/latest/cycle?projectId=34012&versionId=48786&expand=executionSummeries