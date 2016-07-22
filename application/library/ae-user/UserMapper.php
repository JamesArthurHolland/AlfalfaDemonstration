<?php

namespace AE\User;

use AE\User\UserEntity;

class UserMapper
{
    public function fromArray($entityArray)
    {
        if(!$entityArray) {
            return null;
        }

        return new UserEntity(
			$entityArray['id'],
			$entityArray['forename'],
			$entityArray['surname'],
			$entityArray['dateOfBirth'],
			$entityArray['mobileNo'],
			$entityArray['emailAddress'],
			$entityArray['dateJoined'],
			$entityArray['lastUpdateTime']
        );
    }
}
