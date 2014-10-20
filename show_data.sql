CREATE TABLE `users` (
	`id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
	`username` VARCHAR(50) NOT NULL DEFAULT '0',
	`password` VARCHAR(120) NOT NULL DEFAULT '0',
	`role` ENUM('ADMIN','AUTHOR') NOT NULL DEFAULT 'AUTHOR',
	PRIMARY KEY (`id`),
	UNIQUE INDEX `username` (`username`)
)
COLLATE='utf8_unicode_ci'
ENGINE=InnoDB
AUTO_INCREMENT=2;

INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES (1, 'jano', '$2y$10$/HeOa8as9GSp7M556SXxO.uqeNw9DUMtmBbeiE2nXZkwLH3Nw.jqO', 'ADMIN');

CREATE TABLE `articles` (
	`id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
	`author_id` INT(10) UNSIGNED NOT NULL,
	`title` VARCHAR(200) NOT NULL DEFAULT '0',
	`content` MEDIUMTEXT NOT NULL,
	`date_created` DATETIME NOT NULL DEFAULT '2014-10-16 00:00:00',
	PRIMARY KEY (`id`),
	INDEX `fk_author_id` (`author_id`),
	CONSTRAINT `fk_author_id` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`) ON UPDATE NO ACTION ON DELETE NO ACTION
)
COLLATE='utf8_unicode_ci'
ENGINE=InnoDB
AUTO_INCREMENT=37;


INSERT INTO `articles` (`id`, `author_id`, `title`, `content`, `date_created`) VALUES (1, 1, 'Lore ipsum title', 'Lorem Ipsum je fiktívny text, používaný pri návrhu tlačovín a typografie. Lorem Ipsum je štandardným výplňovým textom už od 16. storočia, keď neznámy tlačiar zobral sadzobnicu plnú tlačových znakov a pomiešal ich, aby tak vytvoril vzorkovú knihu. Prežil nielen päť storočí, ale aj skok do elektronickej sadzby, a pritom zostal v podstate nezmenený. Spopularizovaný bol v 60-tych rokoch 20.storočia, vydaním hárkov Letraset, ktoré obsahovali pasáže Lorem Ipsum, a neskôr aj publikačným softvérom ako Aldus PageMaker, ktorý obsahoval verzie Lorem Ipsum.', '2015-09-20 04:00:00');
INSERT INTO `articles` (`id`, `author_id`, `title`, `content`, `date_created`) VALUES (2, 1, 'New Research Reveals Why High Intensity Training Is So Beneficial for Health?It May Even Help Prevent Cancer', 'Recent research reveals that myokines?a class of cell-signaling proteins produced by muscle fibers?can combat cancer and metabolic syndrome\r\n                            High intensity training effectively stimulates your muscles to release anti-inflammatory myokines\r\n                            Myokines increase your insulin sensitivity and glucose use inside your muscles. They also increase liberation of fat from adipose cells and the burning of the fat within the skeletal muscle\r\n                            Acting as chemical messengers, myokines inhibit the release and the effect of the inflammatory cytokines produced by body fat. They also significantly reduce body fat irrespective of calorie intake\r\n                            90-98 percent of people who exercise are NOT doing high intensity exercises. By focusing on slow endurance-type exercises, you actually forgo many of the most profound benefits of exercise', '2028-02-20 01:00:00');
INSERT INTO `articles` (`id`, `author_id`, `title`, `content`, `date_created`) VALUES (3, 1, 'Reinventing Our Food System, One Small Farm at a Time', 'The food you eat plays a major role in your health, and the health of the average American is a testament to the abject failure of processed foods to support good health\r\n                            The Greenhorns demonstrates how we can collectively transform the current industrial monoculture, chemical-based agricultural paradigm into a healthier, more sustainable way of feeding ourselves\r\n                            People across America are starting to reinvent our food system by growing their own food, and starting up new farms, in ever-growing numbers\r\n                            Not only do using organic principles improve the quantity, but it also improves the quality of the food you?re growing', '2014-10-20 00:00:00');
INSERT INTO `articles` (`id`, `author_id`, `title`, `content`, `date_created`) VALUES (4, 1, 'Gamification', 'Gamification is the application of digital game design techniques to non-game problems, such as business and social impact challenges. Video games are the dominant entertainment form of our time because they are powerful tools for motivating behavior. Effective games leverage both psychology and technology, in ways that can be applied outside the immersive environments of games themselves. Gamification as a business practice has exploded over the past two years. Organizations are applying it in areas such as marketing, human resources, productivity enhancement, sustainability, training, health and wellness, innovation, and customer engagement. Game thinking means more than just dropping in badges and leaderboards; it requires a thoughtful understanding of motivation and design techniques. This course examines the mechanisms of gamification and provides an understanding of its effective use. ', '2001-12-20 12:00:00');
INSERT INTO `articles` (`id`, `author_id`, `title`, `content`, `date_created`) VALUES (13, 1, 'Antipattern: Use Null as an Ordinary Value, or Vice Versa', 'Many software developers are caught off-guard by the behavior of null\r\nin SQL. Unlike in most programming languages, SQL treats null as a\r\nspecial value, different from zero, false, or an empty string. This is true\r\nin standard SQL and most brands of database. However, in Oracle and\r\nSybase, null is exactly the same as a string of zero length. The null\r\nvalue follows some special behavior, too.', '2014-10-16 00:00:00');
