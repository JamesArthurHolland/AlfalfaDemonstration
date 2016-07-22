<?php

namespace AE\User;

use AE\Stdlib\EntityTrait;


class UserEntity implements \JsonSerializable
{
    use EntityTrait;

    protected $id;
    protected $forename;
    protected $surname;
    protected $dateOfBirth;
    protected $mobileNo;
    protected $emailAddress;
    protected $dateJoined;
    protected $lastUpdateTime;

    public function __construct(
        $id,
        $forename,
        $surname,
        $dateOfBirth,
        $mobileNo,
        $emailAddress,
        $dateJoined,
        $lastUpdateTime
    ) {
		$this->setId($id)
			->setForename($forename)
			->setSurname($surname)
			->setDateOfBirth($dateOfBirth)
			->setMobileNo($mobileNo)
			->setEmailAddress($emailAddress)
			->setDateJoined($dateJoined)
			->setLastUpdateTime($lastUpdateTime);
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }
    public function setForename($forename)
    {
        $this->forename = $forename;
        return $this;
    }
    public function setSurname($surname)
    {
        $this->surname = $surname;
        return $this;
    }
    public function setDateOfBirth($dateOfBirth)
    {
        $this->dateOfBirth = $dateOfBirth;
        return $this;
    }
    public function setMobileNo($mobileNo)
    {
        $this->mobileNo = $mobileNo;
        return $this;
    }
    public function setEmailAddress($emailAddress)
    {
        $this->emailAddress = $emailAddress;
        return $this;
    }
    public function setDateJoined($dateJoined)
    {
        $this->dateJoined = $dateJoined;
        return $this;
    }
    public function setLastUpdateTime($lastUpdateTime)
    {
        $this->lastUpdateTime = $lastUpdateTime;
        return $this;
    }

    public function getId()
    {
        return $this->id;
    }
    public function getForename()
    {
        return $this->forename;
    }
    public function getSurname()
    {
        return $this->surname;
    }
    public function getDateOfBirth()
    {
        return $this->dateOfBirth;
    }
    public function getMobileNo()
    {
        return $this->mobileNo;
    }
    public function getEmailAddress()
    {
        return $this->emailAddress;
    }
    public function getDateJoined()
    {
        return $this->dateJoined;
    }
    public function getLastUpdateTime()
    {
        return $this->lastUpdateTime;
    }

}
