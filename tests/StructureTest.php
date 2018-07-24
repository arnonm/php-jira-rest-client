<?php

use JiraRestApi\Structure\StructureService;
use JiraRestApi\Structure\ForestService;
use JiraRestApi\Structure\ForestComponent;
use JiraRestApi\Dumper;

class StructureTest extends PHPUnit_Framework_TestCase
{
    public function testGetStructure()
    {
        $structure = new StructureService();

        $p = $structure->get('1318');

        $this->assertTrue($p instanceof JiraRestApi\Structure\StructureType);
        $this->assertTrue(!empty($p->id));
        $this->assertTrue(strlen($p->name) > 0);
        // $this->assertTrue(strlen($p->projectCategory['name']) > 0);
    }

    public fuNction testGetStructureWithOwnerPermissions()
    {
        $structure = new StructureService();

        $p = $structure->get('1318',True, True);

        $this->assertTrue($p instanceof JiraRestApi\Structure\StructureType);
        $this->assertTrue(!empty($p->id));
        $this->assertTrue(strlen($p->name) > 0);
        $this->assertTrue(strlen($p->owner) > 0);
        $this->assertTrue(strlen($p->permissions) > 0);
        // $this->assertTrue(strlen($p->projectCategory['name']) > 0);
    }

    public function testGetStructureLists()
    {
        $struct = new StructureService();

        $structures = $struct->getAllStructures();


        foreach ($structures as $p) {
            $this->assertTrue($p instanceof JiraRestApi\Structure\Structure);
            //$this->assertTrue(strlen($p->id) > 0);
            $this->assertTrue(!empty($p->id));
            $this->assertTrue(strlen($p->name) > 0);
            // $this->assertTrue(strlen($p->projectCategory['name']) > 0);
        }
    }

    public function testGetForest()
    {
        $forest = new ForestService();
        $f = $forest->get('1318');
        $this->assertTrue($f instanceof JiraRestApi\Structure\Forest);
        $this->assertTrue($f->spec->structureId>0);
        $this->assertTrue($f->version->version == 1);
        $this->assertTrue(is_array(($forest->getForestComponents($f->formula))));

        foreach ($forest->getForestComponents($f->formula) as $component) {
            print_r($component) . "\n";
            //            echo "rowID" . $component->rowID . "\n";
            //            echo "rowDepth " . $component->rowDepth . "\n";
            //            echo "itemIdentity " . $component->itemIdentity . "\n";
        }
    }
}
