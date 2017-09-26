<?php

namespace Lib\DB;

/**
 * Created by PhpStorm.
 * User: bloom
 * Date: 23.09.17
 * Time: 11:28
 */

class Model
{
    protected static $tableName;

    public static function find()
    {
        return new Query(static::$tableName);
    }
}