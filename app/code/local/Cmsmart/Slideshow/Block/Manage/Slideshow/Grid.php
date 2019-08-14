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
class Cmsmart_Slideshow_Block_Manage_Slideshow_Grid extends Mage_Adminhtml_Block_Widget_Grid {

    public function __construct() {
        parent::__construct();
        $this->setId('slideshowGrid');
        $this->setDefaultSort('created_time');
		$this->setDefaultDir('DESC');
        $this->setSaveParametersInSession(true);
    }

    protected function _getStore() {
        $storeId = (int) $this->getRequest()->getParam('store', 0);
        return Mage::app()->getStore($storeId);
    }

    protected function _prepareCollection() {
		$slideshow =  Mage::getStoreConfig('slideshow/settings/type');
		if(	$slideshow =='sequence-master'){
			$collection = Mage::getModel('slideshow/slideshow')->getCollection()
				->addFilter('sequencemaster','1')
				->addFilter('revolution','0');
		} else {
			$collection = Mage::getModel('slideshow/slideshow')->getCollection()
			->addFilter('sequencemaster','0')
			->addFilter('revolution','0');
		}
        
        $store = $this->_getStore();
        if ($store->getId()) {
            $collection->addStoreFilter($store);
        }
        $this->setCollection($collection);
        return parent::_prepareCollection();
    }

    protected function _prepareColumns() {
		$slideshow =  Mage::getStoreConfig('slideshow/settings/type');
        $this->addColumn('post_id', array(
            'header' => Mage::helper('slideshow')->__('ID'),
            'align' => 'right',
            'width' => '50px',
            'index' => 'slideshow_id',
        ));

        $this->addColumn('title', array(
            'header' => Mage::helper('slideshow')->__('Title'),
            'align' => 'left',
            'index' => 'title',
        ));
		$this->addColumn('images', array(
            'header'    => Mage::helper('slideshow')->__('Images'),
            'align'     => 'center',
            'index'     => 'image',
            'width'     => '200px',
            'renderer'  => 'slideshow/adminhtml_template_grid_renderer_image' 
        ));
        $this->addColumn('created_time', array(
            'header' => Mage::helper('slideshow')->__('Created at'),
            'index' => 'created_time',
            'type' => 'datetime',
            'width' => '120px',
            'gmtoffset' => true,
            'default' => ' -- '
        ));
        $this->addColumn('status', array(
            'header' => Mage::helper('slideshow')->__('Status'),
            'align' => 'left',
            'width' => '80px',
            'index' => 'status',
            'type' => 'options',
            'options' => array(
                0 => Mage::helper('slideshow')->__('Enabled'),
                1 => Mage::helper('slideshow')->__('Disabled'),
            ),
        ));

        $this->addColumn('action', array(
            'header' => Mage::helper('slideshow')->__('Action'),
            'width' => '100',
            'type' => 'action',
            'getter' => 'getId',
            'actions' => array(
                array(
                    'caption' => Mage::helper('slideshow')->__('Edit'),
                    'url' => array('base' => '*/*/edit'),
                    'field' => 'id'
                )
            ),
            'filter' => false,
            'sortable' => false,
            'index' => 'stores',
            'is_system' => true,
        ));

        return parent::_prepareColumns();
    }

    protected function _prepareMassaction() {
        $this->setMassactionIdField('post_id');
        $this->getMassactionBlock()->setFormFieldName('slideshow');

        $this->getMassactionBlock()->addItem('delete', array(
            'label' => Mage::helper('slideshow')->__('Delete'),
            'url' => $this->getUrl('*/*/massDelete'),
            'confirm' => Mage::helper('slideshow')->__('Are you sure?')
        ));
		$statuses = Mage::getSingleton('slideshow/status')->getOptionArray();

        array_unshift($statuses, array('label' => '', 'value' => ''));
        $this->getMassactionBlock()->addItem('status', array(
            'label' => Mage::helper('slideshow')->__('Change status'),
            'url' => $this->getUrl('*/*/massStatus', array('_current' => true)),
            'additional' => array(
                'visibility' => array(
                    'name' => 'status',
                    'type' => 'select',
                    'class' => 'required-entry',
                    'label' => Mage::helper('slideshow')->__('Status'),
                    'values' => $statuses
                )
            )
        ));
      
        return $this;
    }

    public function getRowUrl($row) {
        return $this->getUrl('*/*/edit', array('id' => $row->getId()));
    }

}
