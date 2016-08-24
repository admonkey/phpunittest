<?php

class DataProviderDependsTest extends PHPUnit_Framework_TestCase
{
    public function getDataProvider(){
      return [
        ['real_file.txt'],
        ['non-existent_file.txt'],
      ];
    }

    /**
     *  @dataProvider getDataProvider
     */
    public function testCanBeDependedOn($data){
      $actual = file_get_contents($data);
      $this->assertSame('expected',$actual);
    }

    /**
     *  @dataProvider getDataProvider
     *  @depends testCanBeDependedOn
     */
    public function testCanDepend($data){
      $this->assertTrue(false);
    }
}
