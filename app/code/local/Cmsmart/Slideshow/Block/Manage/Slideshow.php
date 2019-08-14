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
class Cmsmart_Slideshow_Block_Manage_Slideshow extends Mage_Adminhtml_Block_Widget_Grid_Container {

    public function __construct() {
       $this->_controller = 'manage_slideshow';
       $this->_blockGroup = 'slideshow';
       $this->_headerText = Mage::helper('slideshow')->__('Slideshow Post ');
       parent::__construct();
    }
	
    protected function _prepareLayout() {
		    $this->setChild( 'grid',
            $this->getLayout()->createBlock( $this->_blockGroup.'/' . $this->_controller . '_grid',
            $this->_controller . '.grid')->setSaveParametersInSession(true) );
        return parent::_prepareLayout();
    }

    public function getAddNewButtonHtml() {
        return $this->getChildHtml('add_slideshow_button');
    }

    public function getGridHtml() {
        return $this->getChildHtml('grid');
    }

    public function getStoreSwitcherHtml() {
        return $this->getChildHtml('store_switcher');
    }

}