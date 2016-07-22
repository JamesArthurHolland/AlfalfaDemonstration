<?php

namespace AE\User;

use AE\Stdlib\ServiceAbstract;
use AE\Stdlib\StorageInterface;

class UserService  extends ServiceAbstract
{
    public function __construct(StorageInterface $repository)
    {
        $this->setRepository($repository);
    }
}
