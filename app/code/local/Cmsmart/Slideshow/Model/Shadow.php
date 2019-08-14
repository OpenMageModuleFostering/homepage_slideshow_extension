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
class Cmsmart_Slideshow_Model_Shadow {
    protected $_options;
	const SLIDESHOW_ZERO   = '0';
	const SLIDESHOW_ONE    = '1';
	const SLIDESHOW_TWO    = '2';
	const SLIDESHOW_THREE  = '3';
    public function toOptionArray(){
        if (!$this->_options) {
			$this->_options[] = array(
			   'value'=>self::SLIDESHOW_ZERO,
			   'label'=>Mage::helper('slideshow')->__('0 No Shadow')
			);
			$this->_options[] = array(
			   'value'=>self::SLIDESHOW_ONE,
			   'label'=>Mage::helper('slideshow')->__('1')
			);
			$this->_options[] = array(
			   'value'=>self::SLIDESHOW_TWO,
			   'label'=>Mage::helper('slideshow')->__('2')
			);
			$this->_options[] = array(
			   'value'=>self::SLIDESHOW_THREE,
			   'label'=>Mage::helper('slideshow')->__('3')
			);
		}
		return $this->_options;
	}

}
