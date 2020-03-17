CREATE TABLE tx_storeinventory_domain_model_product(
	uid int(11) unsigned DEFAULT '0' NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,
	name varchar(255) DEFAULT '' NOT NULL,
	description text NOT NULL,
    image int(11) unsigned DEFAULT '0',
    image_collection int(11) unsigned DEFAULT '0',
	quantity int(11) DEFAULT '0' NOT NULL,
-- 	categories int(11) unsigned DEFAULT '0' NOT NULL,
	tstamp int(11) unsigned DEFAULT 0 NOT NULL,
    crdate int(11) unsigned DEFAULT 0 NOT NULL,
    deleted tinyint(4) unsigned DEFAULT 0 NOT NULL,
	PRIMARY KEY (uid),
	KEY parent (pid)
);


