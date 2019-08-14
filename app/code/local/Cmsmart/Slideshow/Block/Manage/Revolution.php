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
class Cmsmart_Slideshow_Block_Manage_Revolution extends Mage_Adminhtml_Block_Widget_Grid_Container
 {
 public function __construct() {

       $this->_controller = 'manage_revolution';
       //$this->_blockGroup = 'slideshow';
       $this->_blockGroup = 'revolution';
       $this->_headerText = Mage::helper('slideshow')->__('Post Revolution');
	   
	   parent::__construct();
    }
    protected function _prepareLayout() {
        $this->setChild('add_new_button', $this->getLayout()->createBlock('adminhtml/widget_button')
                        ->setData(array(
                            'label' => Mage::helper('slideshow')->__('Add Post'),
                            'onclick' => "setLocation('" . $this->getUrl('*/*/revolution') . "')",
                            'class' => 'add'
                        ))
        );
        /**
         * Display store switcher if system has more one store
         */
        if (!Mage::app()->isSingleStoreMode()) {
            $this->setChild('store_switcher', $this->getLayout()->createBlock('adminhtml/store_switcher')
                            ->setUseConfirm(false)
                            ->setSwitchUrl($this->getUrl('*/*/*', array('store' => null)))
            );
        }
        
        return parent::_prepareLayout();
    }

    public function getAddNewButtonHtml() {
	
        return $this->getChildHtml('add_revolution_button');
    }

    public function getGridHtml() {
	
        return $this->getChildHtml('grid');
    }

    public function getStoreSwitcherHtml() {
        return $this->getChildHtml('store_switcher');
    }

}