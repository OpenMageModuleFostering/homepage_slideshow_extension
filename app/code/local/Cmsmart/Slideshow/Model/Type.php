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

class Cmsmart_Slideshow_Model_Type {
    protected $_options;
	const SLIDESHOW_CAMERA = 'camera';
	const SLIDESHOW_LOFSLIDER = 'lofslider';
    const SLIDESHOW_REVOLUTION = 'revolution';
	const SLIDESHOW_SEQUENCEMASTER = 'sequence-master';
	
    public function toOptionArray(){
        if (!$this->_options) {
			$this->_options[] = array(
			   'value'=>self::SLIDESHOW_CAMERA,
			   'label'=>Mage::helper('slideshow')->__('Camera')
			);
			$this->_options[] = array(
			   'value'=>self::SLIDESHOW_REVOLUTION,
			   'label'=>Mage::helper('slideshow')->__('Revolution')
			);
			/*
			$this->_options[] = array(
			   'value'=>self::SLIDESHOW_LOFSLIDER,
			   'label'=>Mage::helper('slideshow')->__('Lofslides')
			);*/
			$this->_options[] = array(
			   'value'=>self::SLIDESHOW_SEQUENCEMASTER,
			   'label'=>Mage::helper('slideshow')->__('Sequence Master')
			);
		}
		return $this->_options;
	}

}
