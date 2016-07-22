CREATE DATABASE alfalfaExample;

use alfalfaExample;

CREATE TABLE users
(
	id bigint NOT NULL AUTO_INCREMENT,
	forename varchar (256),
	surname varchar (256),
	dateOfBirth bigint,
	mobileNo varchar(256),
	emailAddress varchar (256),
	dateJoined bigint,
	lastUpdateTime bigint,
	PRIMARY KEY(id)
);
