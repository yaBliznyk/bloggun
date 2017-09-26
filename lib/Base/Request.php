<?php

namespace Lib\Base;

/**
 * Created by PhpStorm.
 * User: bloom
 * Date: 23.09.17
 * Time: 10:13
 */

class Request
{
    protected $_params = [];

    public function __construct()
    {
        $this->_params = $_REQUEST;
    }

    public function input($name = null)
    {

    }
}