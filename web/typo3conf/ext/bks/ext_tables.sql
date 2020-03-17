#
# Table structure for table 'tx_bks_domain_model_book'
#
CREATE TABLE tx_bks_domain_model_book (

	title varchar(255) DEFAULT '' NOT NULL,
	price varchar(255) DEFAULT '' NOT NULL,
	id int(11) unsigned DEFAULT '0' NOT NULL,

);

#
# Table structure for table 'tx_bks_domain_model_author'
#
CREATE TABLE tx_bks_domain_model_author (

	book int(11) unsigned DEFAULT '0' NOT NULL,

	name varchar(255) DEFAULT '' NOT NULL,
	id int(11) unsigned DEFAULT '0',

);

#
# Table structure for table 'tx_bks_domain_model_author'
#
CREATE TABLE tx_bks_domain_model_author (

	book int(11) unsigned DEFAULT '0' NOT NULL,

);
