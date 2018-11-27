<?php

namespace RefreshAndSeedDatabase\Test;

use PHPUnit\Framework\TestCase as BaseTestCase;
use RefreshAndSeedDatabase\Test\Stubs\TestCaseStub;

class RefreshAndSeedDatabaseTest extends BaseTestCase
{
    /**
     * refreshTestDatabase method test
     *
     * @throws \ReflectionException
     */
    public function testRefreshTestDatabase()
    {
        $TestCase = $this->getMockBuilder(TestCaseStub::class)
            ->setMethods(['artisan'])
            ->getMock();

        $TestCase
            ->expects($this->once())
            ->method('artisan')
            ->with('migrate:fresh', ['--seed' => true])
            ->will($this->returnValue(0));

        $this->callMethod($TestCase, 'setUp');
    }

    /**
     * Call private/protected method
     *
     * @param Object $obj
     * @param string $name
     * @param array $args
     * @return mixed
     * @throws \ReflectionException
     */
    protected function callMethod($obj, $name, array $args = [])
    {
        $class = new \ReflectionClass($obj);
        $method = $class->getMethod($name);
        $method->setAccessible(true);

        return $method->invokeArgs($obj, $args);
    }
}
