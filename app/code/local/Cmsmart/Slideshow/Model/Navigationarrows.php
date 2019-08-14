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
class Cmsmart_Slideshow_Model_Navigationarrows {
    protected $_options;
	const SLIDESHOW_NEXTTOBULLETS = 'nexttobullets';
	const SLIDESHOW_VERTICALCENTERED = 'verticalcentered';
	const SLIDESHOW_NONE = 'none';
    public function toOptionArray(){
        if (!$this->_options) {
			$this->_options[] = array(
			   'value'=>self::SLIDESHOW_NEXTTOBULLETS,
			   'label'=>Mage::helper('slideshow')->__('Nexttobullets')
			);
			$this->_options[] = array(
			   'value'=>self::SLIDESHOW_VERTICALCENTERED,
			   'label'=>Mage::helper('slideshow')->__('Verticalcentered')
			);
			$this->_options[] = array(
			   'value'=>self::SLIDESHOW_NONE,
			   'label'=>Mage::helper('slideshow')->__('None')
			);
		}
		return $this->_options;
	}

}
