<?php

namespace RefreshAndSeedDatabase\Test\Stubs;

use Illuminate\Events\Dispatcher;
use RefreshAndSeedDatabase\RefreshAndSeedDatabase;
use \Illuminate\Foundation\Testing\TestCase;
use Illuminate\Contracts\Console\Kernel;

class TestCaseStub extends TestCase
{
    use RefreshAndSeedDatabase;

    public function __construct(?string $name = null, array $data = [], string $dataName = '')
    {
        parent::__construct($name, $data, $dataName);

        $KernelStub = $this->createMock(\Illuminate\Foundation\Console\Kernel::class);
        $KernelStub->method('setArtisan');

        $this->app[Kernel::class] = $KernelStub;
        $this->app['events'] = $this->createMock(Dispatcher::class);
    }

    public function createApplication()
    {

    }

    protected function usingInMemoryDatabase()
    {
        return false;
    }

    protected function beginDatabaseTransaction()
    {

    }
}
