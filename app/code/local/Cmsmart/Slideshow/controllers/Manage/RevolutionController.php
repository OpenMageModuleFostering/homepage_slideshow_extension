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
class Cmsmart_Slideshow_Manage_RevolutionController extends Mage_Adminhtml_Controller_Action {

    public function preDispatch() {
        parent::preDispatch();
    }

    protected function _isAllowed() {
        return Mage::getSingleton('admin/session')->isAllowed('admin/slideshow/slideshows');
    }

    protected function _initAction() {
	
        $this->loadLayout()
                ->_setActiveMenu('slideshow/slideshows');

        return $this;
    }
	public function indexAction(){
		$this->displayTitle('Slideshows');
	    $this->_initAction()->renderLayout();
	}
    public function newAction() {
        $this->loadLayout();
        $this->_setActiveMenu('slideshow/slideshows');
        $this->displayTitle('Add slideshow slideshow');

        $this->getLayout()->getBlock('head')->setCanLoadExtJs(true);

        $this->_addContent($this->getLayout()->createBlock('slideshow/manage_slideshow_edittabsrevolution'));
		$this->_addLeft($this->getLayout()->createBlock('slideshow/manage_slideshow_edit_tabsrevolution'));

       $this->getLayout()->getBlock('head')->setCanLoadTinyMce(true);
		
       $this->renderLayout();
    }

    public function editAction() {
        $id = $this->getRequest()->getParam('id');
        $model = Mage::getModel('slideshow/slideshow')->load($id);
        if ($model->getId() || $id == 0) {
            $data = Mage::getSingleton('adminhtml/session')->getFormData(true);
            if (!empty($data)) {
                $model->setData($data);
            }

            Mage::register('slideshow_data', $model);
            $this->loadLayout();
            $this->_setActiveMenu('slideshow/slideshows');
            $this->displayTitle('Edit slideshow');
            $this->getLayout()->getBlock('head')->setCanLoadExtJs(true);
			$this->_addContent($this->getLayout()->createBlock('slideshow/manage_revolution_edit'));
			$this->_addLeft($this->getLayout()->createBlock('slideshow/manage_revolution_edit_tabs'));
            $this->getLayout()->getBlock('head')->setCanLoadTinyMce(true);

            $this->renderLayout();
        } else {
            Mage::getSingleton('adminhtml/session')->addError(Mage::helper('slideshow')->__('slideshow does not exist'));
            $this->_redirect('*/*/');
        }
    }
    public function duplicateAction() {
        $oldIdentifier = $this->getRequest()->getParam('identifier');
        $i = 1;
        $newSlideshow = $oldIdentifier . $i;
        while (Mage::getModel('slideshow/slideshow')->loadByIdentifier($newSlideshow)->getData())
            $newSlideshow = $oldIdentifier . ++$i;
        $this->getRequest()->setslideshow('slideshow', $newSlideshow);
        $this->_forward('save');
    }

    public function saveAction() {
		
		$id = $this->getRequest()->getParam('id');
		if($id) {
			$collection = Mage::getModel('slideshow/slideshow')->getCollection()
					->addFieldToFilter('slideshow_id',$id)
					->addFieldToFilter('status',0)
					->addFieldToFilter('revolution',1);	
			$data = array();
			foreach ($collection->getData() as $dat){
						$slideshow_id = $dat['idslideshow'];
					}
		} else{
			$collection = Mage::getModel('slideshow/slideshow')->getCollection()
					->addFieldToFilter('status',0)
					->addFieldToFilter('revolution',1);	
			foreach ($collection->getData() as $dat){
						$slideshow_id = $dat['slideshow_id'];
					}
			
			$slideshow_id = $slideshow_id+1;
		}
		
        if ($data = $this->getRequest()->getPost()) {	
			$i=1;
			for($i = 1; $i <= $data['numberslide']; $i++ ) {	
			
				if(isset($_FILES[$slideshow_id.'_image-li_'.$i]['name']) and (file_exists($_FILES[$slideshow_id.'_image-li_'.$i]['tmp_name']))) {
					$uploader = new Varien_File_Uploader($slideshow_id.'_image-li_'.$i);
					$uploader->setAllowedExtensions(array('jpg','jpeg','gif','png'));
					$uploader->setAllowRenameFiles(false);
					$uploader->setFilesDispersion(false);
					$path = Mage::getBaseDir('media') . DS . 'cmsmart/slideshow/' ;
					$uploader->save($path, $_FILES[$slideshow_id.'_image-li_'.$i]['name']);
					$data[$slideshow_id.'_image-li_'.$i] = 'cmsmart/slideshow/'.$_FILES[$slideshow_id.'_image-li_'.$i]['name'];
				}else {
					if(isset($data[$slideshow_id.'_image-li'.$i]['delete']) && $data[$slideshow_id.'_image-li'.$i]['delete'] == 1) {
						$data[$slideshow_id.'_image-li_'.$i] = '';
					} else {
						$data[$slideshow_id.'_image-li_'.$i] = $data[$slideshow_id.'_image-li_'.$i.'old'];
					}
				}
					
			}
		//print_r($data); exit();
		$htmlslide='';
		$htmlslide.= '<ul>';
			
		for($i = 1; $i <= $data['numberslide']; $i++ ) {	
			$htmlslide.='<li class="netbase" ' ;
			if($data[$slideshow_id.'_transition-li_'.$i]){
			$htmlslide.= ' data-transition="'.$data[$slideshow_id.'_transition-li_'.$i].'"';
			
			if($data[$slideshow_id.'_data-delay-li_'.$i]) {
			$htmlslide.= ' data-delay="'.$data[$slideshow_id.'_data-delay-li_'.$i].'"';
			}
			if($data[$slideshow_id.'_data-slotamouny-li_'.$i]){
			$htmlslide.= ' data-slotamount="'.$data[$slideshow_id.'_data-slotamouny-li_'.$i].'"';
			}
			$htmlslide.='>';	
			$htmlslide.='<img src="'. Mage::getBaseUrl('media').$data[$slideshow_id.'_image-li_'.$i].'"/>';
				for($j=1; $j < count($data); $j++) {
					if($data[$slideshow_id.'_content'.$i.'-'.$j]) {
						$htmlslide.='<div class="caption '.$data[$slideshow_id.'_class'.$i.'-'.$j].'" data-x="'.$data[$slideshow_id.'_data-x'.$i.'-'.$j].'"  data-y="'.$data[$slideshow_id.'_data-y'.$i.'-'.$j].'" data-speed="'.$data[$slideshow_id.'_data-speed'.$i.'-'.$j].'" data-start="'.$data[$slideshow_id.'_data-start'.$i.'-'.$j].'" data-easing="'.$data[$slideshow_id.'_data-easing'.$i.'-'.$j].'">'.$this->getLayout()->createBlock('cms/block')->setBlockId($data[$slideshow_id.'_content'.$i.'-'.$j])->toHtml().'</div>';
					}
				}
			$htmlslide.='</li>';
			}
		}
		$htmlslide.= '</ul>';
		
		if($data['post_content']) {
			$datasave['post_content']  =  $data['post_content']	;
		} else {
			$datasave['post_content'] = $htmlslide;          
		}
		
		$datasave['revolution']   = '1';
		$datasave['title']		  =  $data[$slideshow_id.'_title']	;
		$datasave['imagethumbs']  =  $data[$slideshow_id.'_thumbnail_image'];
		$datasave['transition-li'] = '';
		for( $i = 1 ; $i <= $data['numberslide']; $i++){
			$datasave['transition-li'] .= $data[$slideshow_id.'_transition-li_'.$i];
			if($i < $data['numberslide']) {
			$datasave['transition-li'] .= ',';	
			}
		}
		$datasave['data-slotamouny-li'] = '';
		for( $i = 1 ; $i <= $data['numberslide']; $i++){
			$datasave['data-slotamouny-li'] .= $data[$slideshow_id.'_data-slotamouny-li_'.$i]; 
			if($i < $data['numberslide']) {
			$datasave['data-slotamouny-li'] .= ',';	
			}
		}
		$datasave['data-delay-li'] = '';
		for( $i = 1 ; $i <= $data['numberslide']; $i++){
			$datasave['data-delay-li'] .= $data[$slideshow_id.'_data-delay-li_'.$i];
			 
			if($i < $data['numberslide']) {
			$datasave['data-delay-li'] .= ',';	
			}
		}
		$datasave['data-content'] = '';
		
		for( $i = 1 ; $i <= $data['numberslide']; $i++){
			for($j=1; $j<= $data[$slideshow_id.'_numberslide-li'.$i]; $j++){
				$datasave['data-content'] .= $data[$slideshow_id.'_content'.$i.'-'.$j];
				
				if($j <= $data[$slideshow_id.'_numberslide-li'.$i]) {
				$datasave['data-content'] .= ',';	
				}
			}
		}
		$datasave['data-x'] = '';
		for( $i = 1 ; $i <= $data['numberslide']; $i++){
			for($j=1; $j<= $data[$slideshow_id.'_numberslide-li'.$i]; $j++){
				$datasave['data-x'] .= $data[$slideshow_id.'_data-x'.$i.'-'.$j];
				if($j <= $data[$slideshow_id.'_numberslide-li'.$i]) {
				$datasave['data-x'] .= ',';	
				}
			}
		}
		$datasave['data-y'] = '';
		for( $i = 1 ; $i <= $data['numberslide']; $i++){
			for($j=1; $j<= $data[$slideshow_id.'_numberslide-li'.$i]; $j++){
				$datasave['data-y'] .= $data[$slideshow_id.'_data-y'.$i.'-'.$j];
				if($j <= $data[$slideshow_id.'_numberslide-li'.$i]) {
				$datasave['data-y'] .= ',';	
				}
			}
		}
		$datasave['data-speed'] = '';
		for( $i = 1 ; $i <= $data['numberslide']; $i++){
			for($j=1; $j<= $data[$slideshow_id.'_numberslide-li'.$i]; $j++){
				$datasave['data-speed'] .= $data[$slideshow_id.'_data-speed'.$i.'-'.$j];
				if($j <= $data[$slideshow_id.'_numberslide-li'.$i]) {
				$datasave['data-speed'] .= ',';	
				}
			}
		}
		$datasave['data-start'] = '';
		for( $i = 1 ; $i <= $data['numberslide']; $i++){
			for($j=1; $j<= $data[$slideshow_id.'_numberslide-li'.$i]; $j++){
				$datasave['data-start'] .= $data[$slideshow_id.'_data-start'.$i.'-'.$j];
				if($j <= $data[$slideshow_id.'_numberslide-li'.$i]) {
				$datasave['data-start'] .= ',';	
				}
			}
		}
		$datasave['data-easing'] = '';
		for( $i = 1 ; $i <= $data['numberslide']; $i++){
			for($j=1; $j<= $data[$slideshow_id.'_numberslide-li'.$i]; $j++){
				$datasave['data-easing'] .= $data[$slideshow_id.'_data-easing'.$i.'-'.$j]; 
				if($j <= $data[$slideshow_id.'_numberslide-li'.$i]) {
				$datasave['data-easing'] .= ',';	
				}
			}
		}
		$datasave['class'] = '';
		for( $i = 1 ; $i <= $data['numberslide']; $i++){
			for($j=1; $j<= $data[$slideshow_id.'_numberslide-li'.$i]; $j++){
				$datasave['class'] .= $data[$slideshow_id.'_class'.$i.'-'.$j];
				if($j <= $data[$slideshow_id.'_numberslide-li'.$i]) {
				$datasave['class'] .= ',';	
				}
			}
		}
		$datasave['numberslide-li'] = '';
		for( $i = 1 ; $i <= $data['numberslide']; $i++){
			$datasave['numberslide-li'] .= $data[$slideshow_id.'_numberslide-li'.$i];
			if($i <= $data['numberslide']) {
				$datasave['numberslide-li'] .= ',';	
			}	
		}
		$datasave['image-li'] = '';
		for( $i = 1 ; $i <= $data['numberslide']; $i++){
			$datasave['image-li'] .= $data[$slideshow_id.'_image-li_'.$i];
			if($i <= $data['numberslide']) {
				$datasave['image-li'] .= ',';	
			}	
		}
		$datasave['numberli-div'] = '';
		$div = 0;
		for( $i = 1 ; $i <= $data['numberslide']; $i++){
			$div = $div + $data[$slideshow_id.'_numberslide-li'.$i];
			$datasave['numberli-div'] .= $div;
			if($i <= $data['numberslide']) {
				$datasave['numberli-div'] .= ',';	
			}	
		}
		$datasave['numberslide'] 	= $data['numberslide'];
		$datasave['idslideshow'] 	= $slideshow_id;
		
		$model = Mage::getModel('slideshow/slideshow');
		$model->setData($datasave)->setId($this->getRequest()->getParam('id'));
            try {
                $format = Mage::app()->getLocale()->getDateTimeFormat(Mage_Core_Model_Locale::FORMAT_TYPE_MEDIUM);
                if (isset($data['created_time']) && $data['created_time']) {
                    $dateFrom = Mage::app()->getLocale()->date($data['created_time'], $format);
                    $model->setCreatedTime(Mage::getModel('core/date')->gmtDate(null, $dateFrom->getTimestamp()));
                    $model->setUpdateTime(Mage::getModel('core/date')->gmtDate());
                } else {
                    $model->setCreatedTime(Mage::getModel('core/date')->gmtDate());
                }
			
                $model->save();
				
				Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('slideshow')->__('slideshow was successfully saved'));
                Mage::getSingleton('adminhtml/session')->setFormData(false);

                if ($this->getRequest()->getParam('back')) {
                    $this->_redirect('*/*/edit', array('id' => $model->getId()));
                    return;
                }
                $this->_redirect('*/*/');
                return;
			} catch (Exception $e){
				Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                Mage::getSingleton('adminhtml/session')->setFormData($data);
                $this->_redirect('*/*/edit', array('id' => $this->getRequest()->getParam('id')));
                return;
			}

		}
		Mage::getSingleton('adminhtml/session')->addError(Mage::helper('slideshow')->__('Unable to find slideshow to save'));
        $this->_redirect('*/*/');

    }

    public function deleteAction() {
        $slideshowId = (int) $this->getRequest()->getParam('id');
        if ($slideshowId) {
            try {
                $this->_slideshowDelete($slideshowId);
                Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('adminhtml')->__('slideshow was successfully deleted'));
                $this->_redirect('*/*/');
            } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                $this->_redirect('*/*/edit', array('id' => $this->getRequest()->getParam('id')));
            }
        }
        $this->_redirect('*/*/');
    }

    public function massDeleteAction() {
        $slideshowIds = $this->getRequest()->getParam('slideshow');
        if (!is_array($slideshowIds)) {
            Mage::getSingleton('adminhtml/session')->addError(Mage::helper('adminhtml')->__('Please select slideshow(s)'));
        } else {
            try {
                foreach ($slideshowIds as $slideshowId) {
                    $this->_slideshowDelete($slideshowId);
                }
                Mage::getSingleton('adminhtml/session')->addSuccess(
                        Mage::helper('adminhtml')->__(
                                'Total of %d record(s) were successfully deleted', count($slideshowIds)
                        )
                );
            } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
            }
        }
        $this->_redirect('*/*/index');
    }

    protected function _slideshowDelete($slideshowId) {
        $model = Mage::getModel('slideshow/slideshow')->load($slideshowId);
        $_tags = explode(',', $model->getData('tags'));
        $model->delete();
        $_stores = Mage::getSingleton('adminhtml/system_store')->getStoreCollection();
        foreach ($_tags as $tag) {
            foreach ($_stores as $store)
                if (trim($tag)) {
                    Mage::getModel('slideshow/tag')->loadByName($tag, $store->getId())->refreshCount();
                }
        }
    }

    public function massStatusAction() {
        $slideshowIds = $this->getRequest()->getParam('slideshow');
        if (!is_array($slideshowIds)) {
            Mage::getSingleton('adminhtml/session')->addError($this->__('Please select slideshow(s)'));
        } else {
            try {

                foreach ($slideshowIds as $slideshowId) {
                    $slideshow = Mage::getModel('slideshow/slideshow')
                            ->load($slideshowId)
                            ->setStatus($this->getRequest()->getParam('status'))
                            ->setStores('')
                            ->setIsMassupdate(true)
                            ->save();
                }
                $this->_getSession()->addSuccess(
                        $this->__('Total of %d record(s) were successfully updated', count($slideshowIds))
                );
            } catch (Exception $e) {

                $this->_getSession()->addError($e->getMessage());
            }
        }
        $this->_redirect('*/*/index');
    }

    protected function displayTitle($data = null, $root = 'slideshow') {

        if (!Mage::helper('slideshow')->magentoLess14()) {
            if ($data) {
                if (!is_array($data)) {
                    $data = array($data);
                }
                foreach ($data as $title) {
                    $this->_title($this->__($title));
                }
                $this->_title($this->__($root));
            } else {
                $this->_title($this->__('slideshow'))->_title($root);
            }
        }
        return $this;
    }

}
