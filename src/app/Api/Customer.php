<?php 
namespace App\Api;

use App\GolShop;
use Exception;

class Customer extends ApiCommand
{

    protected $baseCommand = '/customer/';

    public function register()
    {
        $this->addEndpoint('GET', '/view/{+d}', [$this, 'actionView']);
        $this->addEndpoint('GET', '/list', [$this, 'actionList']);
        $this->addEndpoint('POST', '/add', [$this, 'actionAdd']);
        $this->addEndpoint('POST', '/edit', [$this, 'actionEdit']);
        $this->addEndpoint('POST', '/remove', [$this, 'actionRemove']);
    }

    public function actionAdd()
    {
        # Example: localhost/customer/add
        return $this->response(['add']);
    }

    public function actionView( $id )
    {
        if( !is_numeric($id) )
        {
            return $this->error('The value is not integer');
        }
        # Example: localhost/customer/edit
        return $this->response(['view']);
    }

    public function actionEdit()
    {
        # Example: localhost/customer/edit
        return $this->response(['edit']);
    }

    public function actionRemove()
    {
        # Example: localhost/customer/remove
        return $this->response(['remove']);
    }

    public function actionList()
    {
        # Example: localhost/customer/list
        return $this->response(['list']);
    }
}