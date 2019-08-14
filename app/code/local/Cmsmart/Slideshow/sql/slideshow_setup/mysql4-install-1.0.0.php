<?php
/*
* Name Extension: Slideshow Homepage
* Version: 1.0.0
* Author: The Cmsmart Development Team 
* Date Created: 16/09/2013
* Websites: http://cmsmart.net
* Technical Support: Forum - http://cmsmart.net/support
* GNU General Public License v3 (http://opensource.org/licenses/GPL-3.0)
* Copyright © 2011-2013 Cmsmart.net. All Rights Reserved.
*/

$installer = $this;

$installer->startSetup();

$installer->run("
CREATE TABLE `cmsmart_slideshow` (
  `slideshow_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `numberslide` int(11) NOT NULL,
  `idslideshow` int(11) NOT NULL,
  `title` varchar(255) NOT NULL DEFAULT '',
  `filename` varchar(255) NOT NULL DEFAULT '',
  `post_content` text,
  `status` smallint(6) NOT NULL DEFAULT '0',
  `weblink` varchar(255) DEFAULT NULL,
  `created_time` datetime DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `imagesky` varchar(500) NOT NULL,
  `imagethumbs` varchar(500) NOT NULL,
  `class_images_sequence` varchar(255) NOT NULL,
  `revolution` int(11) NOT NULL DEFAULT '0',
  `sequencemaster` int(11) NOT NULL,
  `transition-li` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `data-slotamouny-li` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `data-delay-li` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `data-content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `data-x` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `data-y` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `data-speed` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `data-start` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `data-easing` text CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `class` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `numberslide-li` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `image-li` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `numberli-div` varchar(500) NOT NULL,
  PRIMARY KEY (`slideshow_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;");

$installer->endSetup(); 