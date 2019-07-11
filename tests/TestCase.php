<?php

namespace BinaryTorch\Blogged\Tests;

use Mockery;
use Illuminate\Support\Facades\Config;
use Mews\Purifier\PurifierServiceProvider;
use BinaryTorch\Blogged\Tests\Fixture\User;
use Illuminate\Contracts\Auth\Authenticatable;
use BinaryTorch\Blogged\BloggedServiceProvider;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TestCase extends \Orchestra\Testbench\TestCase
{
    use DatabaseTransactions;

    /**
     * The user the request is currently authenticated as.
     *
     * @var mixed
     */
    protected $authenticatedAs;

    /**
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();

        $this->loadMigrationsFrom(__DIR__.'/Fixture/Migrations');
        
        $this->artisan('migrate');

        $this->createDummyUser();
    }

    /**
     * @return void
     */
    protected function createDummyUser()
    {
        Config::set('blogged.settings.user', User::class);
        User::create(['name' => 'Saleem']);
    }

    /**
     * @param \Illuminate\Foundation\Application $app
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [
            BloggedServiceProvider::class,
            PurifierServiceProvider::class
        ];
    }

    /**
     * Define environment setup.
     *
     * @param \Illuminate\Foundation\Application $app
     *
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('database.default', 'testbench');
        $app['config']->set('database.connections.testbench', [
            'driver'   => 'sqlite',
            'database' => ':memory:',
            'prefix'   => '',
        ]);
    }

    /**
     * Authenticate as an anonymous user.
     *
     * @return $this
     */
    protected function authenticate()
    {
        $this->actingAs($this->authenticatedAs = Mockery::mock(Authenticatable::class));

        $this->authenticatedAs->shouldReceive('getAuthIdentifier')->andReturn(1);
        $this->authenticatedAs->shouldReceive('getKey')->andReturn(1);

        return $this;
    }
}
