CREATE TABLE `playlists` (
	`id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(50) NOT NULL,
	`owner` VARCHAR(50) NOT NULL,
	`dateCreated` DATETIME NOT NULL,
	PRIMARY KEY (`id`)
)
COLLATE='utf8_general_ci'
ENGINE=InnoDB
AUTO_INCREMENT=2
;

CREATE TABLE `playlist_songs` (
	`id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
	`songId` INT(10) UNSIGNED NOT NULL,
	`playlistId` INT(10) UNSIGNED NOT NULL,
	`playlistOrder` INT(10) UNSIGNED NOT NULL,
	PRIMARY KEY (`id`)
)
COLLATE='utf8_general_ci'
ENGINE=InnoDB
AUTO_INCREMENT=3
;
