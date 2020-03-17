#
# Table structure for table 'tx_bks_domain_model_book'
#
CREATE TABLE tx_bks_domain_model_book (

	title varchar(255) DEFAULT '' NOT NULL,
	author int(11) DEFAULT '0' NOT NULL,
	image int(11) unsigned NOT NULL default '0',
	price varchar(255) DEFAULT '' NOT NULL,
	author_name int(11) unsigned DEFAULT '0',

);

#
# Table structure for table 'tx_bks_domain_model_author'
#
CREATE TABLE tx_bks_domain_model_author (

	name varchar(255) DEFAULT '' NOT NULL,
	book_name int(11) unsigned DEFAULT '0',

);
