<?php

namespace Lib\Db;

/**
 * Created by PhpStorm.
 * User: bloom
 * Date: 23.09.17
 * Time: 17:25
 */

class Query
{
    protected $select = '*';
    protected $where;
    protected $limit = '';
    protected $offset = '';
    protected $order = '';
    protected $from;

    public function __construct($tableName)
    {
        $this->from = $tableName;
    }

    public function latest()
    {
        $this->order .= '';
    }

    protected function generateQueryString()
    {
        $query = 'SELECT ' . $this->select . ' FROM ' . $this->from;
        $query .= $this->where ?: ' WHERE ' . $this->where;
    }
}