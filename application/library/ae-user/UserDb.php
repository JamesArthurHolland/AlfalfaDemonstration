<?php

namespace AE\User;

use AE\Stdlib\MysqlDbAbstract;
use AE\Stdlib\StorageInterface;

class UserDb extends MysqlDbAbstract implements StorageInterface
{
    protected $table = 'users';// INSERT TABLE NAME;
    protected $mapper;

    public function __construct($mapper)
    {
        $this->setMapper($mapper);
    }
    
    protected function getDbName()
    {
        return $this->dbName;
    }
}
