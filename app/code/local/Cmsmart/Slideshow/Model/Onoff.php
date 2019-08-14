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
class Cmsmart_Slideshow_Model_Onoff {
    protected $_options;
	const SLIDESHOW_ON = 'on';
	const SLIDESHOW_OFF = 'off';
	
    public function toOptionArray(){
        if (!$this->_options) {
			$this->_options[] = array(
			   'value'=>self::SLIDESHOW_ON,
			   'label'=>Mage::helper('slideshow')->__('On')
			);
			$this->_options[] = array(
			   'value'=>self::SLIDESHOW_OFF,
			   'label'=>Mage::helper('slideshow')->__('Off')
			);
		}
		return $this->_options;
	}

}
