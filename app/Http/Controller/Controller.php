<?php

namespace App\Http\Controller;

use Lib\Base\Connection;

/**
 * Base controller
 */

class Controller
{
    public function __construct(Connection $conn)
    {
        $conn->layout('layouts.main');
    }
}