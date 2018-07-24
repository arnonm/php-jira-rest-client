<?php

use JiraRestApi\Project\ProjectService;
use JiraRestApi\Dumper;
use JiraRestApi\Project\Project;

class ProjectTest extends PHPUnit_Framework_TestCase
{

    public function testGetProject()
    {
        $proj = new ProjectService();
        $components = [];

        $p = $proj->get('ICE');

        //Dumper::dump($p);

        $p = $proj->getComponents('ICE');


        Dumper::dump($components);
    }


}