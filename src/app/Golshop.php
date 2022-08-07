<?php 
namespace App;
class GolShop
{
    public $router;
    public $api;
    public $db;

    protected $services = [
        'router' => RouterController::class,
        'db' => DatabaseConnector::class,
        'api' => Api::class,
    ];
    static $instance;
    public function __construct()
    {
        foreach ($this->services as $key => $service) {
            if( method_exists($service, 'register') !== false )
            {
                $instance = (new $service);
                $this->{$key} = $instance->register();
                $this->setInstance( $this );
            }
        }
        $this->router->run();
    }

    public function getRouter() : RouterController
    {
        return $this->router;
    }

    public function setInstance( $instance )
    {
        self::$instance = $instance;
    }

    public static function getInstance() : GolShop
    {
        return self::$instance;
    }
}