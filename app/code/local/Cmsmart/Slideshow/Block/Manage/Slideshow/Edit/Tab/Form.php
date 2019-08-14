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
class Cmsmart_Slideshow_Block_Manage_Slideshow_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form {

    protected function _prepareForm() {

        $form = new Varien_Data_Form();
        $this->setForm($form);
        $fieldset = $form->addFieldset('slideshow_form', array('legend' => Mage::helper('slideshow')->__('Post information')));
		$slideshow =  Mage::getStoreConfig('slideshow/settings/type');
		$class_images_sequence =  Mage::getStoreConfig('slideshow/settings/class_images_sequence');
		$calss = explode(",", $class_images_sequence);
		$class_images = array();
		foreach ($calss as $cat) {
            $class_images[] = ( array(
                'label' => $cat,
                'value' => $cat
                    ));
        }
        $fieldset->addField('title', 'text', array(
            'label' => Mage::helper('slideshow')->__('Title'),
            'class' => 'required-entry',
            'required' => true,
            'name' => 'title',
        ));
		if( $slideshow !='revolution'){
			$fieldset->addField('image', 'image', array(
				'name' => 'image',
				'label' => Mage::helper('slideshow')->__('Image'),
				'title' => Mage::helper('slideshow')->__('Image'),
				'src' => "media/Cmsmart/slideshow/",
				'required' => false
			));
		} 
		
		if( $slideshow =='sequence-master'){
			$fieldset->addField('imagesky', 'image', array(
				'name' => 'imagesky',
				'label' => Mage::helper('slideshow')->__('Image Sky'),
				'title' => Mage::helper('slideshow')->__('Image Sky'),
				'src' => "media/Cmsmart/slideshow/",
				'required' => false
			));
			$fieldset->addField('class_images_sequence', 'select', array(
				'label' => Mage::helper('slideshow')->__('Class Images Sequence'),
				'class' => 'required-entry',
				'required' => false,
				'values' => $class_images,
				'name' => 'class_images_sequence',
			));
		} 
		if( $slideshow !='sequence-master'){
			 $fieldset->addField('weblink', 'text', array(
				'label' => Mage::helper('slideshow')->__('Link'),
				'name' => 'weblink',
			));
        }
		 $fieldset->addField('status', 'select', array(
            'label' => Mage::helper('slideshow')->__('Status'),
            'name' => 'status',
            'values' => array(
                array(
                    'value' => 0,
                    'label' => Mage::helper('slideshow')->__('Enabled'),
                ),
                array(
                    'value' => 1,
                    'label' => Mage::helper('slideshow')->__('Disabled'),
                ),
            ),
        ));
        try {
            $config = Mage::getSingleton('cms/wysiwyg_config')->getConfig();
            $config->setData(Mage::helper('slideshow')->recursiveReplace(
                            '/slideshow_admin/', '/' . (string) Mage::app()->getConfig()->getNode('admin/routers/adminhtml/args/frontName') . '/', $config->getData()
                    )
            );
        } catch (Exception $ex) {
            $config = null;
        }

        $fieldset->addField('post_content', 'editor', array(
            'name' => 'post_content',
            'title' => Mage::helper('slideshow')->__('Content'),
            'style' => 'width:700px; height:500px;',
            'config' => $config
        ));

        if (Mage::getSingleton('adminhtml/session')->getslideshowData()) {
            $form->setValues(Mage::getSingleton('adminhtml/session')->getslideshowData());
            Mage::getSingleton('adminhtml/session')->setslideshowData(null);
        } elseif (Mage::registry('slideshow_data')) {
            Mage::registry('slideshow_data')->setTags(Mage::helper('slideshow')->convertSlashes(Mage::registry('slideshow_data')->getTags()));
            $form->setValues(Mage::registry('slideshow_data')->getData());
        }
        return parent::_prepareForm();
    }

}
