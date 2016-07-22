<?php

    $di->set('userMapper', array(
            'className' => 'AE\User\UserMapper'
        ));

    $di->set('userService', array(
            'className' => 'AE\User\UserService',
            'arguments' => array(
            array('type' => 'service', 'name' => 'userDb')
        )
    ));

    $di->set('userDb', array(
        'className' => 'AE\User\UserDb',
        'arguments' => array(
            array('type' => 'service', 'name' => 'userMapper')
        )
    ));

    $di->set('userFilter', array(
        'className' => 'AE\User\UserFilter'
    ));

    $di->set('userFilterMapper', array(
        'className' => 'AE\Stdlib\FilterMapperAbstract',
        'arguments' => array(
            array('type' => 'service', 'name' => 'userFilter')
        )
    ));
