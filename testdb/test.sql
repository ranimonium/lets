DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
	`userid` INTEGER AUTO_INCREMENT,
	`username` VARCHAR(20) UNIQUE,
	`points` INTEGER DEFAULT 0,
	`password` VARCHAR(20),
	`about` TEXT,
	`isOrg` BOOLEAN DEFAULT 0, 
	CONSTRAINT `userPK` PRIMARY KEY (`userid`)
) Engine=InnoDB;

INSERT INTO `user` (`username`, `password`, `about`, `isOrg`) VALUES 
('jdavalos', 'password', 'maganda ako', 0),
('bvelasco', 'password', 'cool ako', 0),
('dcs', 'password', 'department of computer science ako', 1);

DROP TABLE IF EXISTS `favor`;
CREATE TABLE IF NOT EXISTS `favor` (
	`favorid` INTEGER AUTO_INCREMENT,
	`owner` INTEGER NOT NULL,
	`name` VARCHAR(20) UNIQUE,
	`worth` INTEGER NOT NULL,
	`qty` INTEGER,
	`type` ENUM('Service', 'Event', 'Good') NOT NULL,
	`status` ENUM('Ongoing','Finished'),
	`description` TEXT,
	CONSTRAINT `favorPK` PRIMARY KEY (`favorid`),
	CONSTRAINT `favorFKuser` FOREIGN KEY (`owner`) REFERENCES `user` (`userid`)
) Engine=InnoDB;

INSERT INTO `favor` (`name`, `owner`, `worth`, `qty`, `type`, `status`, `description`) VALUES 
('ballpen', 2, 1, 5, 'Good', 'Ongoing', 'cool ballpen ko yo'),
('training', 3, 5, 30, 'Service', 'Ongoing', 'we teach python yo'),
('hackathon', 3, 3, 30, 'Event', 'Ongoing', 'get points here yo');

DROP TABLE IF EXISTS `exchange`;
CREATE TABLE IF NOT EXISTS `exchange` (
	`exchangeid` INTEGER AUTO_INCREMENT,
	`to` INTEGER NOT NULL,
	`favor` INTEGER NOT NULL,
	`status` ENUM('Pending','Accepted','Rejected'),
	CONSTRAINT `exchangePK` PRIMARY KEY (`exchangeid`),
	CONSTRAINT `exFKuser` FOREIGN KEY (`to`) REFERENCES `user` (`userid`),
	CONSTRAINT `exFKfavor` FOREIGN KEY (`favor`) REFERENCES `favor` (`favorid`)
) Engine=InnoDB;

DROP TABLE IF EXISTS `member`;
CREATE TABLE IF NOT EXISTS `member` (
	`orgid` INTEGER NOT NULL,
	`memberid` INTEGER NOT NULL,
	`isOwner` BOOLEAN NOT NULL DEFAULT 0,
	CONSTRAINT `memberPK` PRIMARY KEY (`orgid`, `memberid`),
	CONSTRAINT `memFKuser1` FOREIGN KEY (`orgid`) REFERENCES `user` (`userid`),
	CONSTRAINT `memFKuser2` FOREIGN KEY (`memberid`) REFERENCES `user` (`userid`)
) Engine=InnoDB;

INSERT INTO `member` (`orgid`, `memberid`, `isOwner`) VALUES 
(3, 2, 0),
(3, 1, 1);