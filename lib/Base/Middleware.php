<?php

namespace Lib\Base;

use Lib\Interfaces\Middleware as MiddlewareInterface;

/**
 * Base middleware
 */
abstract class Middleware implements MiddlewareInterface
{
    protected $conn;

    /**
     * @inheritdoc
     */
    public function init($conn)
    {
        $this->conn = $conn;
        return true;
    }

    /**
     * @inheritdoc
     */
    public function call()
    {
    }
}