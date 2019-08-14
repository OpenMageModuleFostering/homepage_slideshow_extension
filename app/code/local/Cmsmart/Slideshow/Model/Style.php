<?php
/*
* Name Extension: Slideshow Homepage
* Version: 1.0.0
* Author: The Cmsmart Development Team 
* Date Created: 16/09/2013
* Websites: http://cmsmart.net
* Technical Support: Forum - http://cmsmart.net/support
* GNU General Public License v3 (http://opensource.org/licenses/GPL-3.0)
* Copyright © 2011-2013 Cmsmart.net. All Rights Reserved.
*/
class Cmsmart_Slideshow_Model_Style{
    protected $_options;
	const SLIDESHOW_RANDOM = 'random';
	const SLIDESHOW_SF = 'simpleFade';
	const SLIDESHOW_CTL = 'curtainTopLeft';
	const SLIDESHOW_CTR = 'curtainTopRight';
	const SLIDESHOW_CBL = 'curtainBottomLeft';
	const SLIDESHOW_CBR = 'curtainBottomRight';
	const SLIDESHOW_CSL = 'curtainSliceLeft';
	const SLIDESHOW_CSR = 'curtainSliceRight';
	const SLIDESHOW_BCTL = 'blindCurtainTopLeft';
	const SLIDESHOW_BCTR = 'blindCurtainTopRight';
	
	const SLIDESHOW_BCBL = 'blindCurtainBottomLeft';
	const SLIDESHOW_BCBR = 'blindCurtainBottomRight';
	const SLIDESHOW_BCSB = 'blindCurtainSliceBottom';
	const SLIDESHOW_BCST = 'blindCurtainSliceTop';
	const SLIDESHOW_S = 'stampede';
	const SLIDESHOW_M = 'mosaic';
	const SLIDESHOW_MR = 'mosaicReverse';
	const SLIDESHOW_MRD = 'mosaicRandom';
	const SLIDESHOW_MS = 'mosaicSpiral';
	
	const SLIDESHOW_MSR = 'mosaicSpiralReverse';
	const SLIDESHOW_TLBR = 'topLeftBottomRight';
	const SLIDESHOW_BRTL = 'bottomRightTopLeft';
	const SLIDESHOW_BLTR = 'bottomLeftTopRight';
	const SLIDESHOW_SL = 'scrollLeft';
	
	const SLIDESHOW_SR = 'scrollRight';
	const SLIDESHOW_SZ = 'scrollHorz';
	const SLIDESHOW_SB = 'scrollBottom';
	const SLIDESHOW_ST = 'scrollTop';	
      
    
    public function toOptionArray(){
        if (!$this->_options) {
			$this->_options[] = array(
			   'value'=>self::SLIDESHOW_RANDOM,
			   'label'=>Mage::helper('slideshow')->__('Random')
			);
			$this->_options[] = array(
			   'value'=>self::SLIDESHOW_SF,
			   'label'=>Mage::helper('slideshow')->__('Simple Fade')
			);
			$this->_options[] = array(
			   'value'=>self::SLIDESHOW_CTL,
			   'label'=>Mage::helper('slideshow')->__('Curtain Top Left')
			);
			
			$this->_options[] = array(
			   'value'=>self::SLIDESHOW_CTR,
			   'label'=>Mage::helper('slideshow')->__('Curtain Top Right')
			);
			
			$this->_options[] = array(
			   'value'=>self::SLIDESHOW_CBL,
			   'label'=>Mage::helper('slideshow')->__('Curtain Bottom Left')
			);
			
			$this->_options[] = array(
			   'value'=>self::SLIDESHOW_CBR,
			   'label'=>Mage::helper('slideshow')->__('Curtain Bottom Right')
			);
			
			$this->_options[] = array(
			   'value'=>self::SLIDESHOW_CSL,
			   'label'=>Mage::helper('slideshow')->__('Curtain Slice Left')
			);
			
			$this->_options[] = array(
			   'value'=>self::SLIDESHOW_CSR,
			   'label'=>Mage::helper('slideshow')->__('Curtain Slice Right')
			);
			
			$this->_options[] = array(
			   'value'=>self::SLIDESHOW_BCTL,
			   'label'=>Mage::helper('slideshow')->__('Blind Curtain Top Left')
			);
			
			$this->_options[] = array(
			   'value'=>self::SLIDESHOW_BCTR,
			   'label'=>Mage::helper('slideshow')->__('Blind Curtain Top Right')
			);
			
			$this->_options[] = array(
			   'value'=>self::SLIDESHOW_BCBL,
			   'label'=>Mage::helper('slideshow')->__('Blind Curtain Bottom Left')
			);
			
			$this->_options[] = array(
			   'value'=>self::SLIDESHOW_BCBR,
			   'label'=>Mage::helper('slideshow')->__('Blind Curtain Bottom Right')
			);
			
			$this->_options[] = array(
			   'value'=>self::SLIDESHOW_BCSB,
			   'label'=>Mage::helper('slideshow')->__('Blind Curtain Slice Bottom')
			);
			
			$this->_options[] = array(
			   'value'=>self::SLIDESHOW_BCST,
			   'label'=>Mage::helper('slideshow')->__('Blind Curtain Slice Top')
			);
			
			$this->_options[] = array(
			   'value'=>self::SLIDESHOW_S,
			   'label'=>Mage::helper('slideshow')->__('Stampede')
			);
			
			$this->_options[] = array(
			   'value'=>self::SLIDESHOW_M,
			   'label'=>Mage::helper('slideshow')->__('Mosaic')
			);
			
			$this->_options[] = array(
			   'value'=>self::SLIDESHOW_MR,
			   'label'=>Mage::helper('slideshow')->__('Mosaic Reverse')
			);
			
			$this->_options[] = array(
			   'value'=>self::SLIDESHOW_MRD,
			   'label'=>Mage::helper('slideshow')->__('Mosaic Random')
			);
			
			$this->_options[] = array(
			   'value'=>self::SLIDESHOW_MS,
			   'label'=>Mage::helper('slideshow')->__('Mosaic Spiral')
			);
			
			$this->_options[] = array(
			   'value'=>self::SLIDESHOW_MSR,
			   'label'=>Mage::helper('slideshow')->__('Mosaic Spiral Reverse')
			);
			
			$this->_options[] = array(
			   'value'=>self::SLIDESHOW_TLBR,
			   'label'=>Mage::helper('slideshow')->__('Top Left Bottom Right')
			);
			
			$this->_options[] = array(
			   'value'=>self::SLIDESHOW_BRTL,
			   'label'=>Mage::helper('slideshow')->__('Bottom Right Top Left')
			);
			
			$this->_options[] = array(
			   'value'=>self::SLIDESHOW_BLTR,
			   'label'=>Mage::helper('slideshow')->__('Bottom Left Top Right')
			);
			
			$this->_options[] = array(
			   'value'=>self::SLIDESHOW_SL,
			   'label'=>Mage::helper('slideshow')->__('Scroll Left')
			);
			
			$this->_options[] = array(
			   'value'=>self::SLIDESHOW_SR,
			   'label'=>Mage::helper('slideshow')->__('Scroll Right')
			);
			
			$this->_options[] = array(
			   'value'=>self::SLIDESHOW_SZ,
			   'label'=>Mage::helper('slideshow')->__('Scroll Horz')
			);
			
			$this->_options[] = array(
			   'value'=>self::SLIDESHOW_SB,
			   'label'=>Mage::helper('slideshow')->__('Scroll Bottom')
			);
			
			$this->_options[] = array(
			   'value'=>self::SLIDESHOW_ST,
			   'label'=>Mage::helper('slideshow')->__('Scroll Top')
			);
			
			
					

		}
		return $this->_options;
	}
}
