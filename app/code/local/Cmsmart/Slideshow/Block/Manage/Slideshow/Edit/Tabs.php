<?php
/**
* Name Extension: Slideshow Homepage
* Version: 1.0.0
* Author: The Cmsmart Development Team 
* Date Created: 16/09/2013
* Websites: http://cmsmart.net
* Technical Support: Forum - http://cmsmart.net/support
* GNU General Public License v3 (http://opensource.org/licenses/GPL-3.0)
* Copyright © 2011-2013 Cmsmart.net. All Rights Reserved.
*/
class Cmsmart_Slideshow_Block_Manage_Slideshow_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs {

    public function __construct() {
        parent::__construct();
        $this->setId('slideshow_tabs');
        $this->setDestElementId('edit_form');
        $this->setTitle(Mage::helper('slideshow')->__('Post Information'));
    }

    protected function _beforeToHtml() {
        $this->addTab('form_section', array(
            'label' => Mage::helper('slideshow')->__('Post Information'),
            'title' => Mage::helper('slideshow')->__('Post Information'),
            'content' => $this->getLayout()->createBlock('slideshow/manage_slideshow_edit_tab_form')->toHtml(),
        ));
        return parent::_beforeToHtml();
    }

}
