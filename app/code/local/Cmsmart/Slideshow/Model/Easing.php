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
class Cmsmart_Slideshow_Model_Easing{
    public function toOptionArray()
    {
        return array(
			//Ease in-out
			array('value' => 'easeInOutSine',	'label' => Mage::helper('slideshow')->__('easeInOutSine')),
			array('value' => 'easeInOutQuad',	'label' => Mage::helper('slideshow')->__('easeInOutQuad')),
			array('value' => 'easeInOutCubic',	'label' => Mage::helper('slideshow')->__('easeInOutCubic')),
			array('value' => 'easeInOutQuart',	'label' => Mage::helper('slideshow')->__('easeInOutQuart')),
			array('value' => 'easeInOutQuint',	'label' => Mage::helper('slideshow')->__('easeInOutQuint')),
			array('value' => 'easeInOutExpo',	'label' => Mage::helper('slideshow')->__('easeInOutExpo')),
			array('value' => 'easeInOutCirc',	'label' => Mage::helper('slideshow')->__('easeInOutCirc')),
			array('value' => 'easeInOutElastic','label' => Mage::helper('slideshow')->__('easeInOutElastic')),
			array('value' => 'easeInOutBack',	'label' => Mage::helper('slideshow')->__('easeInOutBack')),
			array('value' => 'easeInOutBounce',	'label' => Mage::helper('slideshow')->__('easeInOutBounce')),
			//Ease out
			array('value' => 'easeOutSine',		'label' => Mage::helper('slideshow')->__('easeOutSine')),
			array('value' => 'easeOutQuad',		'label' => Mage::helper('slideshow')->__('easeOutQuad')),
			array('value' => 'easeOutCubic',	'label' => Mage::helper('slideshow')->__('easeOutCubic')),
			array('value' => 'easeOutQuart',	'label' => Mage::helper('slideshow')->__('easeOutQuart')),
			array('value' => 'easeOutQuint',	'label' => Mage::helper('slideshow')->__('easeOutQuint')),
			array('value' => 'easeOutExpo',		'label' => Mage::helper('slideshow')->__('easeOutExpo')),
			array('value' => 'easeOutCirc',		'label' => Mage::helper('slideshow')->__('easeOutCirc')),
			array('value' => 'easeOutElastic',	'label' => Mage::helper('slideshow')->__('easeOutElastic')),
			array('value' => 'easeOutBack',		'label' => Mage::helper('slideshow')->__('easeOutBack')),
			array('value' => 'easeOutBounce',	'label' => Mage::helper('slideshow')->__('easeOutBounce')),
			//Ease in
			array('value' => 'easeInSine',		'label' => Mage::helper('slideshow')->__('easeInSine')),
			array('value' => 'easeInQuad',		'label' => Mage::helper('slideshow')->__('easeInQuad')),
			array('value' => 'easeInCubic',		'label' => Mage::helper('slideshow')->__('easeInCubic')),
			array('value' => 'easeInQuart',		'label' => Mage::helper('slideshow')->__('easeInQuart')),
			array('value' => 'easeInQuint',		'label' => Mage::helper('slideshow')->__('easeInQuint')),
			array('value' => 'easeInExpo',		'label' => Mage::helper('slideshow')->__('easeInExpo')),
			array('value' => 'easeInCirc',		'label' => Mage::helper('slideshow')->__('easeInCirc')),
			array('value' => 'easeInElastic',	'label' => Mage::helper('slideshow')->__('easeInElastic')),
			array('value' => 'easeInBack',		'label' => Mage::helper('slideshow')->__('easeInBack')),
			array('value' => 'easeInBounce',	'label' => Mage::helper('slideshow')->__('easeInBounce'))
        );
    }
}
