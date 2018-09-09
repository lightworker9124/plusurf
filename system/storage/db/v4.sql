ALTER TABLE `exchange` ADD `ip` VARCHAR(200) NULL AFTER `last_run`;
ALTER TABLE `users` ADD `last_run` VARCHAR(250) NULL AFTER `type`;
ALTER TABLE `websites` ADD `reported` INT(20) NULL AFTER `activated`;

INSERT INTO `settings` (`option_name`, `option_value`, `created_at`, `updated_at`) VALUES
('extension', 'a:2:{s:6:"chrome";s:0:"";s:7:"firefox";s:0:"";}', '', '1478727528');

UPDATE settings SET `option_value` = 'a:7:{s:8:"openmode";s:6:"newtab";s:5:"focus";s:2:"no";s:11:"minduration";s:2:"10";s:11:"maxduration";s:3:"300";s:6:"source";s:3:"yes";s:7:"ipcheck";s:3:"all";s:9:"pointcost";s:5:"0.001";}' WHERE option_name = 'exchange'
