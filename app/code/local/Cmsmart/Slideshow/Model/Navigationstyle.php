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
class Cmsmart_Slideshow_Model_Navigationstyle {
    protected $_options;
	const SLIDESHOW_ROUND = 'round';
	const SLIDESHOW_SQUARE = 'square';
	const SLIDESHOW_NAVBAR = 'navbar';
    public function toOptionArray(){
        if (!$this->_options) {
			$this->_options[] = array(
			   'value'=>self::SLIDESHOW_ROUND,
			   'label'=>Mage::helper('slideshow')->__('Round')
			);
			$this->_options[] = array(
			   'value'=>self::SLIDESHOW_SQUARE,
			   'label'=>Mage::helper('slideshow')->__('Square')
			);
			$this->_options[] = array(
			   'value'=>self::SLIDESHOW_NAVBAR,
			   'label'=>Mage::helper('slideshow')->__('Navbar')
			);
		}
		return $this->_options;
	}

}
