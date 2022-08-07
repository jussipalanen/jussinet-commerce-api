<?php

namespace App;

use App\Api\Customer;
use App\Api\Product;
use App\Api\ProductCategory;
class Api
{
    public $commands = [
        Customer::class,
        Product::class,
        ProductCategory::class,
    ];

    public function register()
    {
        foreach ($this->commands as $key => $command) {
            if (method_exists($command, 'register') !== false) {
                $instance = (new $command);
                $instance->register();
            }
        }
    }
}
