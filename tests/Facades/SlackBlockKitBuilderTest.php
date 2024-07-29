<?php

declare(strict_types=1);

use Hosttech\SlackBlockKitBuilder\Facades\SlackBlockKitBuilder;
use Hosttech\SlackBlockKitBuilder\SlackBlockKitBuilderServiceProvider;

it('resolves resources', function () {
    $app = app();

    (new SlackBlockKitBuilderServiceProvider($app))->register();

    SlackBlockKitBuilder::setFacadeApplication($app);

    expect(SlackBlockKitBuilder::make())
        ->toBeInstanceOf(\Hosttech\SlackBlockKitBuilder\SlackBlockKitBuilder::class);
});
