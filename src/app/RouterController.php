<?php

namespace App;

use Bramus\Router\Router;

class RouterController
{
    public $instance;
    public $mapping;
    public function register()
    {
        $this->instance = (new Router);
        $this->instance->setBasePath('/v1');
        $this->instance->get('/', function () {
            echo 'Index';
        });

        $this->instance->set404('(/.*)?', function() {
            header('HTTP/1.1 404 Not Found');
            header('Content-Type: application/json');
        
            $jsonArray = array();
            $jsonArray['status'] = "404";
            $jsonArray['status_text'] = "Route not defined";
            echo json_encode($jsonArray);
        });

        return $this;
    }

    public function add($_method, $_pattern, $_fb)
    {
        $this->mapping[] = [
            'method' => $_method,
            'pattern' => $_pattern,
            'fallback' => $_fb,
        ];
    }

    public function get($pattern, $fb)
    {
        $this->instance->get($pattern, $fb);
    }

    public function post($pattern, $fb)
    {
        $this->instance->post($pattern, $fb);
    }

    public function build()
    {
        foreach ($this->mapping as $item) {
            $_method = $item['method'];
            $_pattern = $item['pattern'];
            $_fallback = $item['fallback'];
            switch ($_method) {
                case 'GET':
                    $this->get($_pattern, $_fallback);
                    break;
                case 'POST':
                    $this->post($_pattern, $_fallback);
                    break;
                default:
                    # code...
                    break;
            }
        }
    }


    public function run()
    {
        $this->build();
        $this->instance->run();
    }
}
