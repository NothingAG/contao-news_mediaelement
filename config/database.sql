-- ********************************************************
-- *                                                      *
-- * IMPORTANT NOTE                                       *
-- *                                                      *
-- * Do not import this file manually but use the Contao  *
-- * install tool to create and maintain database tables! *
-- *                                                      *
-- ********************************************************

--
-- Table `tl_news`
--

CREATE TABLE `tl_news` (
	`addVideo` char(1) NOT NULL default '',
	`video_headline` varchar(255) NOT NULL default '',
	`mejs_size` varchar(255) NOT NULL default '',
	`mejs_youtube` varchar(16) NOT NULL default '',
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
