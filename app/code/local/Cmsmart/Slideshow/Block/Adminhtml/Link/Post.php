<?php
/*
* Name Extension: Cmsmart megamenu
* Author: The Cmsmart Development Team 
* Date Created: 06/09/2013
* Websites: http://cmsmart.net
* Technical Support: Forum - http://cmsmart.net/support
* GNU General Public License v3 (http://opensource.org/licenses/GPL-3.0)
* Copyright © 2011-2013 Cmsmart.net. All Rights Reserved.
*/
class Cmsmart_Slideshow_Block_Adminhtml_Link_Post extends Mage_Adminhtml_Block_System_Config_Form_Field
{
    /**
     * Add color picker
     *
     * @param Varien_Data_Form_Element_Abstract $element
     * @return String
     */
    protected function _getElementHtml(Varien_Data_Form_Element_Abstract $element)
    {
		$slideshow =  Mage::getStoreConfig('slideshow/settings/type');
		if($slideshow == 'camera' || $slideshow == 'lofslider' || $slideshow == 'sequence-master') {
			$html .= '<a target="_blank" href="'. Mage::helper("adminhtml")->getUrl("slideshow_admin/manage_slideshow/index/").'">Link post</a> ( After Save)';
		} else {
			$html .= '<a target="_blank" href="'. Mage::helper("adminhtml")->getUrl("slideshow_admin/manage_revolution/index/").'">Link post</a> ( After Save)';
		}
        return $html;
    }
}
