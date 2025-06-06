<?php

declare(strict_types=1);

namespace Hosttech\SlackBlockKitBuilder\Tests;

use Hosttech\SlackBlockKitBuilder\SlackBlockKitBuilderServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase
{
    protected function getPackageProviders($app)
    {
        return [
            SlackBlockKitBuilderServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app) {}
}
