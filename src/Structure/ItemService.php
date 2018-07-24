<?php

namespace JiraRestApi\Structure;
use JiraRestApi\Configuration\ConfigurationInterface;
use Monolog\Logger;

/**
 * Class to perform all user related queries.
 *
 * @author Anik
 */
class ItemService extends \JiraRestApi\JiraClient
{
    private $uri = '/item';

    #POST $baseUrl/rest/structure/2.0/item/create
    #https://wiki.almworks.com/display/structure/Item+Resource

    public function __construct(ConfigurationInterface $configuration = null, Logger $logger = null, $path = './')
    {
        parent::__construct($configuration, $logger, $path);
        parent::setAPIUri('/rest/structure/2.0');
    }

    public function create($itemField)
    {

        throw new JiraException('create Structure not yet implemented');
    }

    public function update($ver)
    {
        throw new JiraException('update Structure not yet implemented');
    }


}

