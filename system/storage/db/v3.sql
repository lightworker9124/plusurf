ALTER TABLE `exchange` ADD `ip` VARCHAR(200) NULL AFTER `last_run`;
ALTER TABLE `users` ADD `last_run` VARCHAR(250) NULL AFTER `type`;
ALTER TABLE `websites` ADD `reported` INT(20) NULL AFTER `activated`;

INSERT INTO `settings` (`id`, `option_name`, `option_value`, `created_at`, `updated_at`) VALUES
(18, 'ads', 'a:2:{s:6:"header";s:19:"<!--  your HTML -->";s:6:"footer";s:19:"<!--  your HTML -->";}', '', '1461029713'),
(19, 'seo', 'a:5:{s:5:"title";s:23:"plusurf Traffic Exchange";s:11:"description";s:92:"plusurf is a smart system for traffic exchange, using autosurf function and anonymous traffic";s:8:"keywords";s:42:"plusurf, traffic, alexa, rank, exchange, TE";s:7:"ogimage";s:28:"http://example.com/image.png";s:7:"favicon";s:12:"/favicon.ico";}', '', '1478725778'),
(20, 'analyse', 'a:1:{s:4:"code";s:21:"<!-- Analyse code -->";}', '', '1460610730'),
(21, 'socialauth', 'a:3:{s:8:"facebook";a:2:{s:2:"id";s:1:" ";s:6:"secret";s:1:" ";}s:7:"twitter";a:2:{s:3:"key";s:1:" ";s:6:"secret";s:1:" ";}s:6:"google";a:2:{s:2:"id";s:1:" ";s:6:"secret";s:1:" ";}}', '', '1478725750'),
(22, 'version', 'a:1:{s:6:"plusurf";s:3:"5.0";}', '', '1461029370'),
(23, 'extension', 'a:2:{s:6:"chrome";s:0:"";s:7:"firefox";s:0:"";}', '', '1478727528');

UPDATE settings SET `option_value` = 'a:7:{s:8:"openmode";s:6:"newtab";s:5:"focus";s:2:"no";s:11:"minduration";s:2:"10";s:11:"maxduration";s:3:"300";s:6:"source";s:3:"yes";s:7:"ipcheck";s:3:"all";s:9:"pointcost";s:5:"0.001";}' WHERE option_name = 'exchange'
