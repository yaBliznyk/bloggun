<?php

namespace Lib\Base;

use Lib\Traits\Singleton;

/**
 * Class ConnectionAbstract
 * @package Lib\Base
 */
abstract class ConnectionAbstract
{
    use Singleton;

    /**
     * @var array Предпологает, что данные параметры не должны изменяться пользователем
     * Они предназначены непосредственно для фрэймворка и корректной работы приложения
     */
    protected $protectedParams = [];

    /**
     * @var array
     */
    protected $publicParams = [];

    protected $responseType;
    protected $response;

    protected function __construct()
    {
        $this->protectedParams['uri'] = $_SERVER['REQUEST_URI'];
    }

    public function __get($name)
    {
        return (isset($this->publicParams[$name])) ? $this->publicParams[$name] : null;
    }

    public function assign($name, $value)
    {
        $this->publicParams[$name] = $value;
        return $this;
    }

    public function assigns() {
        return $this->publicParams;
    }

    public function param($name, $default = null)
    {
        return isset($this->protectedParams[$name]) ? $this->protectedParams[$name] : $default;
    }
}