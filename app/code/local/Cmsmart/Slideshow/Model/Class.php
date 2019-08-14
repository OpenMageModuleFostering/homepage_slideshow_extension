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
class Cmsmart_Slideshow_Model_Class{
    public function toOptionArray()
    {
        return array(
			//Ease in-out
			array('value' => 'sft',	'label' => Mage::helper('slideshow')->__('Short from Top')),
			array('value' => 'sfb',	'label' => Mage::helper('slideshow')->__('Short from Bottom')),
			array('value' => 'sfr',	'label' => Mage::helper('slideshow')->__('Short from Right')),
			array('value' => 'sfl',	'label' => Mage::helper('slideshow')->__('Short from Left')),
			array('value' => 'lft',	'label' => Mage::helper('slideshow')->__('Long from Top')),
			array('value' => 'lfb',	'label' => Mage::helper('slideshow')->__('Long from Bottom')),
			array('value' => 'lfr',	'label' => Mage::helper('slideshow')->__('Long from Right')),
			array('value' => 'lfl','label' => Mage::helper('slideshow')->__('Long from Left')),
			array('value' => 'fade',	'label' => Mage::helper('slideshow')->__('Fading')),
        );
    }
}
