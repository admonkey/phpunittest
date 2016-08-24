<?php

class DataProviderDependsTest extends PHPUnit_Framework_TestCase
{
    protected static $failed = false;

    public function getDataProvider() {
        return [
            ['real_file.txt'],
            ['non-existent_file.txt'],
        ];
    }

    /**
     * @dataProvider getDataProvider
     */
    public function testCanBeDependedOn($data) {
        try {
            $actual = file_get_contents($data);
            self::assertSame('expected', $actual);
        } catch(Exception $e) {
            self::$failed = true;
            throw $e;
        }
    }

    /**
     * @dataProvider getDataProvider
     * @depends testCanBeDependedOn
     */
    public function testCanDepend($data) {
        if (self::$failed) {
            self::markTestSkipped('testCanBeDependedOn failed');
        }
        self::assertTrue(true);
    }
}
