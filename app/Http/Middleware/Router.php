<?php

namespace App\Http\Middleware;

use Lib\Base\HttpRouter;
use Lib\Base\Middleware;

/**
 * Created by PhpStorm.
 * User: bloom
 * Date: 23.09.17
 * Time: 10:39
 */
class Router extends Middleware
{
    public function call()
    {
        $conn = $this->conn;
        $router = new HttpRouter($conn);
        $conn = $router->parseRequest()->callController();
        return $conn;
    }
}