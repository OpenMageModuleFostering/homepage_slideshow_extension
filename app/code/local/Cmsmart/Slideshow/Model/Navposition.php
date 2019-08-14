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
class Cmsmart_Slideshow_Model_Navposition{
    protected $_options;
	const SLIDESHOWNAVPOSITON_HORIZONTAL = 'horizontal';
	const SLIDESHOWNAVPOSITON_VERTICAL = 'vertical';  
    
    public function toOptionArray(){
        if (!$this->_options) {
			$this->_options[] = array(
			   'value'=>self::SLIDESHOWNAVPOSITON_HORIZONTAL,
			   'label'=>Mage::helper('slideshow')->__('Horizontal')
			);
			$this->_options[] = array(
			   'value'=>self::SLIDESHOWNAVPOSITON_VERTICAL,
			   'label'=>Mage::helper('slideshow')->__('Vertical')
			);
		}
		return $this->_options;
	}

}
