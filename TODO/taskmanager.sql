CREATE TABLE if  not exists `users` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`name` varchar(255) NOT NULL,
	`password` varchar(100) NOT NULL,
	`admin` BOOLEAN NOT NULL DEFAULT false,
	PRIMARY KEY (`id`)
);

CREATE TABLE if  not exists `tasks` (
	`code` INT NOT NULL AUTO_INCREMENT,
	`taskName` varchar(100) NOT NULL,
	`description` varchar(100) NOT NULL,
	`uploadDate` DATE NOT NULL,
	`completed` BOOL NOT NULL DEFAULT 0 ,
	`userId` INT NOT NULL,
	PRIMARY KEY (`code`)
);



ALTER TABLE `tasks` ADD CONSTRAINT `tasks_fk0` FOREIGN KEY (`userId`) REFERENCES `users`(`id`);



