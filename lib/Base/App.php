<?php

namespace Lib\Base;

/**
 * Created by PhpStorm.
 * User: bloom
 * Date: 23.09.17
 * Time: 10:17
 */

class App
{
    protected $connection;
    protected $middleware = [];

    /**
     * @param Connection $conn
     * @return Connection
     */
    public function run(Connection $conn)
    {
        session_start();
        foreach ($this->middleware as $middleware) {
            $reflation = new \ReflectionClass($middleware);
            $object = $reflation->newInstance();
            if ($reflation->getMethod('init')->invoke($object, $conn)) {
                $reflation->getMethod('call')->invoke($object);
            };
        }
        return $conn;
    }

    public function close()
    {
        session_write_close();
    }

    /**
     * @param $names
     */
    public function addMiddlewareList($names)
    {
        $this->middleware = array_merge($this->middleware, $names);
    }

    /**
     * @param $name
     */
    public function addMiddleware($name)
    {
        $this->middleware[] = $name;
    }
}