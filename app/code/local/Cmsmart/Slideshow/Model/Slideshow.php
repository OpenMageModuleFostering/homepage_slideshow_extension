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
class Cmsmart_Slideshow_Model_Slideshow extends Mage_Core_Model_Abstract {

    public function _construct() {
		
        parent::_construct();
        $this->_init('slideshow/slideshow');
    }
    public function getPostContent() {
        $content = $this->getData('post_content');
        if (Mage::getStoreConfig(Cmsmart_Slideshow_Helper_Config::XML_BLOG_PARSE_CMS)) {
            $processor = Mage::getModel('core/email_template_filter');
            $content = $processor->filter($content);
        }
        return $content;
    }

    
}
