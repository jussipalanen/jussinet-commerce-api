<?php 
namespace App\Api;

use App\GolShop;

class ApiCommand 
{
    protected $method = 'GET';
    protected $baseCommand = 'default';
    protected function register()
    {
    }

    public function addEndpoint($_method, $_pattern, $_fallback)
    {
        $_pattern = $this->baseCommand.$_pattern;
        $_pattern = preg_replace('#/+#','/',$_pattern);
        GolShop::getInstance()->getRouter()->add($_method, $_pattern ,$_fallback);
        // $router->get( $url, $fb );
    }

    public function response( array $data )
    {
        echo json_encode( $data );
    }

    public function error( string $message, int $code = 0, array $data = [] )
    {
        echo json_encode([
            'success' => false,
            'message' => $message,
            'data' => $data,
            'code' => $code,
        ]);
    }

    public function success( string $message, int $code = 0, array $data = [] )
    {
        echo json_encode([
            'success' => true,
            'message' => $message,
            'data' => $data,
            'code' => $code,
        ]);
    }

    public function getBaseCommand()
    {
        return $this->baseCommand;
    }

    protected function getMethod()
    {
        return $this->method;
    }

    protected function setMethod( string $method )
    {
        $method = strtoupper( $method );
        return in_array($method, ['GET', 'POST', 'PUT', 'DELETE']) ? $method : 'GET';
    }

    protected function getCommand()
    {
        
    }
}