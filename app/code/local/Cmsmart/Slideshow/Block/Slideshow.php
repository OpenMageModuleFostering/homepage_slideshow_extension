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
class Cmsmart_Slideshow_Block_Slideshow extends Mage_Core_Block_Template implements Mage_Widget_Block_Interface
{
	//public $test;
	
    public function getLayout()
    {
		if (!Mage::getStoreConfig('slideshow/settings/enabled')) return;
		return $this->_layout;
    }
     public function _prepareLayout()
    {
		return parent::_prepareLayout();	
    }
	public function getImageCollection() {
	
		$collection = Mage::getModel('slideshow/slideshow')->getCollection()
			->addFieldToFilter('revolution',0)
			->addFieldToFilter('sequencemaster',0)
			->addFieldToFilter('status',0);		
		$banners = array();
		foreach ($collection as $banner) {			
				$banners[] = $banner;
		}
		return $banners;
	}
	public function getSequencemasteCollection() {
	
		$collection = Mage::getModel('slideshow/slideshow')->getCollection()
			->addFieldToFilter('sequencemaster',1)
			->addFieldToFilter('status',0);		
		$banners = array();
		foreach ($collection as $banner) {			
				$banners[] = $banner;
		}
		return $banners;
	}
	
	public function getRevolution(){
		$content_slideshow = $this->getData('content_slideshow');
		$collection = Mage::getModel('slideshow/slideshow')->getCollection()
			->addFieldToFilter('slideshow_id',$content_slideshow)
			->addFieldToFilter('status',0)
			->addFieldToFilter('revolution',1);		
		$banners = array();
		foreach ($collection as $banner) {			
				$banners[] = $banner;
		}
		return $banners;
	}
	public function getResizedImage($image,$width, $height = null, $quality = 100) {
		$imageUrl = Mage::getBaseDir('media').'/'.$image;
		$name=$width.'x'.$height.'_'.basename($image);
		$img = 'cmsmart/slideshow/thumbs/';
		$imageResized = Mage::getBaseDir('media').'/'.$img.$name;
		if (!file_exists($imageResized)&&file_exists($imageUrl)) {
				$imageObj = new Varien_Image($imageUrl);
				$imageObj->constrainOnly(TRUE);
				$imageObj->keepAspectRatio(TRUE);
				$imageObj->keepFrame(FALSE);
				$imageObj->quality($quality);
				$imageObj->resize($width,$height);
				$imageObj->save($imageResized);	
				return $img.$name;		
			}
		if (file_exists($imageResized)) 	return $img.$name;
		return '';
	}
}
