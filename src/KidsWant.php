<?php

namespace Seekx2y\KidsWantSDK;

use Hanson\Foundation\Foundation;

class KidsWant extends Foundation
{
    protected $providers = [
        Order\ServiceProvider::class
    ];

    public function __construct($config)
    {
        $config['debug'] = $config['debug'] ?? false;
        parent::__construct($config);
    }
}