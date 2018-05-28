<?php

namespace JiraRestApi\Structure;
use JiraRestApi\Configuration\ConfigurationInterface;
use Monolog\Logger;

/**
 * Class to perform all user related queries.
 *
 * @author arnonm@gmail.com
 */
class ValueService extends \JiraRestApi\JiraClient
{
    private $uri = '/structure';

    #POST $baseUrl/rest/structure/2.0/value
    #https://wiki.almworks.com/display/structure/Value+Resource

    public function __construct(ConfigurationInterface $configuration = null, Logger $logger = null, $path = './')
    {
        parent::__construct($configuration, $logger, $path);
        parent::setAPIUri('/rest/structure/latest');
    }

    public function get($ver)
    {
        throw new JiraException('get Structure not yet implemented');
    }

    
}

