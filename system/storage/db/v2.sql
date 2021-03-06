ALTER TABLE `websites` ADD `useragent` VARCHAR(500) NULL AFTER `source`;
ALTER TABLE `websites` ADD `geolocation` VARCHAR(500) NULL AFTER `duration`;
ALTER TABLE `exchange` ADD `ip` VARCHAR(200) NULL AFTER `last_run`;
ALTER TABLE `users` ADD `last_run` VARCHAR(250) NULL AFTER `type`;
ALTER TABLE `websites` ADD `reported` INT(20) NULL AFTER `activated`;

CREATE TABLE IF NOT EXISTS `newsletteres` (
  `id` int(20) NULL AUTO_INCREMENT,
  `status` int(20) NULL,
  `name` varchar(200) NULL,
  `to_group` varchar(200) NULL,
  `subject` text NULL,
  `content` longtext NULL,
  `starton` varchar(200) NULL,
  `progress` varchar(200) NULL,
  `offset` varchar(200) NULL,
  `created_at` varchar(200) NULL,
  `updated_at` varchar(200) NULL,
PRIMARY KEY (`id`)) ENGINE = InnoDB;


INSERT INTO `settings` (`id`, `option_name`, `option_value`, `created_at`, `updated_at`) VALUES
(13, 'whitelist', 'a:1:{s:5:"lists";a:5:{i:0;s:11:"youtube.com";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";}}', '', '1458020010'),
(14, 'blacklist', 'a:1:{s:5:"lists";a:9:{i:0;s:6:"adf.ly";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";i:6;s:0:"";i:7;s:0:"";i:8;s:0:"";}}', '', '1458020010'),
(15, 'windows', 'a:1:{s:3:"key";s:21:"MyPrivateKeyForplusurf";}', '', '1458181826'),
(16, 'newsletteres', 'a:5:{s:4:"type";s:4:"mail";s:4:"from";s:19:"contact@plusurf.info";s:7:"replyto";s:19:"contact@plusurf.info";s:3:"max";s:2:"30";s:4:"smtp";a:6:{s:4:"host";s:14:"smtp.gmail.com";s:4:"port";s:3:"587";s:6:"secure";s:3:"tls";s:4:"auth";s:1:"1";s:8:"username";s:0:"";s:8:"password";s:0:"";}}', '', '1478726056'),
(17, 'geotarget', 'a:2:{s:4:"list";a:16:{s:3:"ALL";s:13:"All Countries";s:2:"DZ";s:7:"Algeria";s:2:"AO";s:6:"Angola";s:2:"AU";s:9:"Australia";s:2:"BR";s:6:"Brazil";s:2:"CA";s:6:"Canada";s:2:"CL";s:5:"Chile";s:2:"CO";s:8:"Colombia";s:2:"FR";s:6:"France";s:2:"HK";s:9:"Hong Kong";s:2:"HU";s:7:"Hungary";s:2:"ID";s:9:"Indonesia";s:2:"IE";s:7:"Ireland";s:2:"MA";s:7:"Morocco";s:2:"GB";s:14:"United Kingdom";s:2:"US";s:13:"United States";}s:6:"access";s:4:"free";}', '', '1478725811'),
(18, 'ads', 'a:2:{s:6:"header";s:19:"<!--  your HTML -->";s:6:"footer";s:19:"<!--  your HTML -->";}', '', '1461029713'),
(19, 'seo', 'a:5:{s:5:"title";s:23:"plusurf Traffic Exchange";s:11:"description";s:92:"plusurf is a smart system for traffic exchange, using autosurf function and anonymous traffic";s:8:"keywords";s:42:"plusurf, traffic, alexa, rank, exchange, TE";s:7:"ogimage";s:28:"http://example.com/image.png";s:7:"favicon";s:12:"/favicon.ico";}', '', '1478725778'),
(20, 'analyse', 'a:1:{s:4:"code";s:21:"<!-- Analyse code -->";}', '', '1460610730'),
(21, 'socialauth', 'a:3:{s:8:"facebook";a:2:{s:2:"id";s:1:" ";s:6:"secret";s:1:" ";}s:7:"twitter";a:2:{s:3:"key";s:1:" ";s:6:"secret";s:1:" ";}s:6:"google";a:2:{s:2:"id";s:1:" ";s:6:"secret";s:1:" ";}}', '', '1478725750'),
(22, 'version', 'a:1:{s:6:"plusurf";s:3:"5.0";}', '', '1461029370'),
(23, 'extension', 'a:2:{s:6:"chrome";s:0:"";s:7:"firefox";s:0:"";}', '', '1478727528');

UPDATE settings SET `option_value` = 'a:7:{s:8:"openmode";s:6:"newtab";s:5:"focus";s:2:"no";s:11:"minduration";s:2:"10";s:11:"maxduration";s:3:"300";s:6:"source";s:3:"yes";s:7:"ipcheck";s:3:"all";s:9:"pointcost";s:5:"0.001";}' WHERE option_name = 'exchange'
