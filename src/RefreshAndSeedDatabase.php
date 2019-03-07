<?php

namespace RefreshAndSeedDatabase;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\RefreshDatabaseState;
use Illuminate\Contracts\Console\Kernel;

/**
 * Trait RefreshAndSeedDatabase
 *
 * @mixin \Illuminate\Foundation\Testing\TestCase
 * @package RefreshAndSeedDatabase
 */
trait RefreshAndSeedDatabase
{
    use RefreshDatabase;

    /**
     * Refresh the in-memory database.
     *
     * @return void
     */
    protected function refreshInMemoryDatabase()
    {
        $this->artisan('migrate', $this->shouldSeed() ? [
            '--seed' => true,
        ] : []);

        $this->app[Kernel::class]->setArtisan(null);
    }
    
    /**
     * Refresh and seed a conventional test database.
     *
     * @return void
     */
    protected function refreshTestDatabase()
    {
        if (! RefreshDatabaseState::$migrated) {
            $params = [];
            if ($this->shouldDropViews()) {
                $params['--drop-views'] = true;
            }
            if ($this->shouldSeed()) {
                $params['--seed'] = true;
            }

            $this->artisan('migrate:fresh', $params);

            $this->app[Kernel::class]->setArtisan(null);

            RefreshDatabaseState::$migrated = true;
        }

        $this->beginDatabaseTransaction();
    }

    /**
     * Determine if views should be dropped when refreshing the database.
     *
     * @return bool
     */
    protected function shouldSeed()
    {
        return property_exists($this, 'seed')
            ? $this->seed
            : true;
    }
}
