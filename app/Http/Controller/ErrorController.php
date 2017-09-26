<?php

namespace App\Http\Controller;

use Lib\Base\Connection;

/**
 * Created by PhpStorm.
 * User: bloom
 * Date: 23.09.17
 * Time: 17:10
 */

class ErrorController extends Controller
{
    public function index(Connection $conn)
    {
        return $conn->view('error.index');
    }
}