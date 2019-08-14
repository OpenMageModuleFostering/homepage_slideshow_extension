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
class Cmsmart_Slideshow_Model_Navigationtype {
    protected $_options;
	const SLIDESHOW_NONE = 'none';
	const SLIDESHOW_BOTH = 'both';
    public function toOptionArray(){
        if (!$this->_options) {
			$this->_options[] = array(
			   'value'=>self::SLIDESHOW_NONE,
			   'label'=>Mage::helper('slideshow')->__('None')
			);
			$this->_options[] = array(
			   'value'=>self::SLIDESHOW_BOTH,
			   'label'=>Mage::helper('slideshow')->__('Both')
			);
		}
		return $this->_options;
	}

}
