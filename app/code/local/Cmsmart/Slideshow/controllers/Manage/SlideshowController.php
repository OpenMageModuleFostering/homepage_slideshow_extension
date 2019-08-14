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
class Cmsmart_Slideshow_Manage_SlideshowController extends Mage_Adminhtml_Controller_Action {

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

    public function indexAction() {
        $this->displayTitle('Slideshows');
        $this->_initAction()->renderLayout();
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

            $this->_addContent($this->getLayout()->createBlock('slideshow/manage_slideshow_edit'))
                    ->_addLeft($this->getLayout()->createBlock('slideshow/manage_slideshow_edit_tabs'));

            $this->getLayout()->getBlock('head')->setCanLoadTinyMce(true);

            $this->renderLayout();
        } else {
            Mage::getSingleton('adminhtml/session')->addError(Mage::helper('slideshow')->__('slideshow does not exist'));
            $this->_redirect('*/*/');
        }
    }

    public function newAction() {

        $id = $this->getRequest()->getParam('id');
        $model = Mage::getModel('slideshow/slideshow')->load($id);

        $data = Mage::getSingleton('adminhtml/session')->getFormData(true);
        if (!empty($data)) {
            $model->setData($data);
        }

        Mage::register('slideshow_data', $model);

        $this->loadLayout();
        $this->_setActiveMenu('slideshow/slideshows');
        $this->displayTitle('Add slideshow slideshow');

        $this->getLayout()->getBlock('head')->setCanLoadExtJs(true);

        $this->_addContent($this->getLayout()->createBlock('slideshow/manage_slideshow_edit'));
		$this->_addLeft($this->getLayout()->createBlock('slideshow/manage_slideshow_edit_tabs'));

       $this->getLayout()->getBlock('head')->setCanLoadTinyMce(true);
		// echo  $this->getLayout()->getBlock('content')->toHtml();
		// echo  $this->getLayout()->getBlock('left')->toHtml();
       $this->renderLayout();
    }

    public function duplicateAction() {
        $oldIdentifier = $this->getRequest()->getParam('slideshow');
        $i = 1;
        $newSlideshow = $oldIdentifier . $i;
        while (Mage::getModel('slideshow/slideshow')->loadByIdentifier($newSlideshow)->getData())
            $newSlideshow = $oldIdentifier . ++$i;
        $this->getRequest()->setslideshow('slideshow', $newSlideshow);
        $this->_forward('save');
    }

    public function saveAction() {
		$imagewidththumbnails			=	 Mage::getStoreConfig('slideshow/settings/imagewidththumbnails');
		$imageheightthumbnails			=	 Mage::getStoreConfig('slideshow/settings/imageheightthumbnails');
	
		
        if ($data = $this->getRequest()->getPost()) {
			
			//upload image dangtx
			
			if (isset($_FILES['image']['name']) and (file_exists($_FILES['image']['tmp_name']))) {
				$uploader = new Varien_File_Uploader('image');
				$uploader->setAllowedExtensions(array('jpg','jpeg','gif','png'));
				$uploader->setAllowRenameFiles(false);
				$uploader->setFilesDispersion(false);
				$path = Mage::getBaseDir('media') . DS . 'cmsmart/slideshow/' ;
				$uploader->save($path, $_FILES['image']['name']);
				$data['image'] = 'cmsmart/slideshow/'.$_FILES['image']['name'];
				$imageUrl = Mage::getBaseDir('media').DS."cmsmart/slideshow/".$_FILES['image']['name'];
				$imageResized = Mage::getBaseDir('media').DS."cmsmart/slideshow/thumbs/".$_FILES['image']['name'];	
				$data['imagethumbs'] = 'cmsmart/slideshow/thumbs/'.$_FILES['image']['name'];
				
				if (!file_exists($imageResized)&&file_exists($imageUrl)) :
						$imageObj = new Varien_Image($imageUrl);
						$imageObj->constrainOnly(TRUE);
						$imageObj->keepAspectRatio(FALSE);
						$imageObj->keepFrame(FALSE);
						$imageObj->quality(100);
						$imageObj->resize($imagewidththumbnails, $imageheightthumbnails);
						$imageObj->save($imageResized);
					endif;	
			} else {
				if(isset($data['image']['delete']) && $data['image']['delete'] == 1) {
					$data['image'] = '';
				} else {
					unset($data['image']);
				}
			}			
			if (isset($_FILES['imagesky']['name']) and (file_exists($_FILES['imagesky']['tmp_name']))) {
				$uploader = new Varien_File_Uploader('imagesky');
				$uploader->setAllowedExtensions(array('jpg','jpeg','gif','png'));
				$uploader->setAllowRenameFiles(false);
				$uploader->setFilesDispersion(false);
				$path = Mage::getBaseDir('media') . DS . 'cmsmart/slideshow/' ;
				$uploader->save($path, $_FILES['imagesky']['name']);
				$data['imagesky'] = 'cmsmart/slideshow/'.$_FILES['imagesky']['name'];
				$imageUrl = Mage::getBaseDir('media').DS."cmsmart/slideshow/".$_FILES['imagesky']['name'];	
			} else {
				if(isset($data['imagesky']['delete']) && $data['imagesky']['delete'] == 1) {
					$data['imagesky'] = '';
				} else {
					unset($data['imagesky']);
				}
			}
			$slideshow =  Mage::getStoreConfig('slideshow/settings/type');
			if(	$slideshow =='sequence-master'){
				$data['sequencemaster']   = '1';
			}
			
			//end upload image dangtx
			
            $model = Mage::getModel('slideshow/slideshow');
            if (isset($data['stores'])) {
                if ($data['stores'][0] == 0) {
                    unset($data['stores']);
                    $data['stores'] = array();
                    $stores = Mage::getSingleton('adminhtml/system_store')->getStoreCollection();
                    foreach ($stores as $store)
                        $data['stores'][] = $store->getId();
                }
            }
			
            $model->setData($data)
                    ->setId($this->getRequest()->getParam('id'));
			
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


                /* recount affected tags */
                if (isset($data['stores'])) {
                    $stores = $data['stores'];
                } else {
                    $stores = array(null);
                }

                $affectedTags = array_merge($addedTags, $removedTags);

                foreach ($affectedTags as $tag) {
                    foreach ($stores as $store) {
                        if (trim($tag)) {
                            Mage::getModel('slideshow/tag')->loadByName($tag, $store)->refreshCount();
                        }
                    }
                }




                Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('slideshow')->__('slideshow was successfully saved'));
                Mage::getSingleton('adminhtml/session')->setFormData(false);

                if ($this->getRequest()->getParam('back')) {
                    $this->_redirect('*/*/edit', array('id' => $model->getId()));
                    return;
                }
                $this->_redirect('*/*/');
                return;
            } catch (Exception $e) {
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
