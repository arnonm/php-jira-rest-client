<?php
<?php

namespace JiraRestApi\Zapi;

use JiraRestApi\Configuration\ConfigurationInterface;
use JiraRestApi\JiraException;
use JiraRestApi\JiraClient;
use Monolog\Logger;


class UtilService extends  JiraClient
{
    //https://jira01.devtools.intel.com/rest/agile/1.0/board?projectKeyOrId=34012
    private $uri = '/util';

    public function __construct(ConfigurationInterface $configuration = null, Logger $logger = null, $path = './')
    {
        parent::__construct($configuration, $logger, $path);
        $this->setAPIUri('/rest/zapi/latest');
    }

    public function getCycleCriteria($projectId = null) {

  		$ret = $this->exec($this->uri.'/cycleCriteriaInfo?projectId='.$projectId);

        $prjs = $this->json_mapper->mapArray(
            json_decode($ret, false), new \ArrayObject(), '\JiraRestApi\Zapi\Cycle'
        );

        return $prjs;
    }

}
