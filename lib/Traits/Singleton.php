<?php

namespace Lib\Traits;

/**
 * Created by PhpStorm.
 * User: bloom
 * Date: 23.09.17
 * Time: 11:44
 */

trait Singleton
{
    protected static $instance = null;

    protected function __construct()
    {
    }

    protected function __clone()
    {
    }

    public static function getInstance()
    {
        if (null == static::$instance) {
            static::$instance = new static();
        }
        return static::$instance;
    }
}