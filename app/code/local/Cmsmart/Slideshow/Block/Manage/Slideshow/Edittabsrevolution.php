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
class Cmsmart_Slideshow_Block_Manage_Slideshow_Edittabsrevolution extends Mage_Adminhtml_Block_Widget_Form_Container {

    public function __construct() {
        parent::__construct();
		
        $this->_objectId = 'id';
        $this->_blockGroup = 'slideshow';
        $this->_controller = 'manage_slideshow';

        $this->_updateButton('save', 'label', Mage::helper('slideshow')->__('Save Slideshow revolution'));
        $this->_updateButton('delete', 'label', Mage::helper('slideshow')->__('Delete Slideshow revolution'));
		$this->_addButton('saveandcontinue', array(
            'label' => Mage::helper('adminhtml')->__('Save And Continue Edit'),
            'onclick' => 'saveAndContinueEdit()',
            'class' => 'save',
                ), -100);
		 if ($this->getRequest()->getParam('id')) {
            $this->_addButton('diplicate', array(
                'label' => Mage::helper('slideshow')->__('Duplicate Slideshow'),
                'onclick' => 'duplicate()',
                'class' => 'save'
                    ), 0);
        }
        $this->_formScripts[] = "
            function toggleEditor() {
                if (tinyMCE.getInstanceById('news_content') == null) {
                    tinyMCE.execCommand('mceAddControl', false, 'post_content');
                } else {
                    tinyMCE.execCommand('mceRemoveControl', false, 'post_content');
                }
            }

            function saveAndContinueEdit(){
                editForm.submit($('edit_form').action+'back/edit/');
            }
            
            function duplicate() {
                $(editForm.formId).action = '" . $this->getUrl('*/*/duplicate') . "';
                editForm.submit();
            }
        ";
		
    }
}