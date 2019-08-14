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
class Cmsmart_Slideshow_Helper_Data extends Mage_Core_Helper_Abstract
{
	public function magentoLess14()
    {
        return version_compare(Mage::getVersion(), '1.4', '<');
    }
	public function recursiveReplace($search, $replace, $subject)
    {
        if (!is_array($subject))
            return $subject;

        foreach ($subject as $key => $value)
            if (is_string($value))
                $subject[$key] = str_replace($search, $replace, $value);
            elseif (is_array($value))
                $subject[$key] = self::recursiveReplace($search, $replace, $value);

        return $subject;
    }
	public function convertSlashes($tag, $direction = 'back')
    {
        if ($direction == 'forward') {
            $tag = preg_replace("#/#is", "&#47;", $tag);
            $tag = preg_replace("#\\\#is", "&#92;", $tag);
            return $tag;
        }

        $tag = str_replace("&#47;", "/", $tag);
        $tag = str_replace("&#92;", "\\", $tag);

        return $tag;
    }
	public function getCfg($optionString)
    {
        return Mage::getStoreConfig('slideshow/' . $optionString);
    }
	public function getAllOptions()
	{
        $this->_options = null;
		if (!$this->_options) {
             $this->_options = Mage::getResourceModel('cms/block_collection')
                 ->load()
                 ->toOptionArray();
             array_unshift($this->_options, array('value'=>'', 'label'=>Mage::helper('catalog')->__('Please select static block ...')));
        }
		
        return $this->_options;
	}	
	public function getEasing(){
		$Easing = Mage::getModel('slideshow/easing')->toOptionArray();
		return $Easing;
	}
	public function getClass(){
		$Class = Mage::getModel('slideshow/class')->toOptionArray();
		return $Class;
	}
	public function getDatarevolution($datacontent,$numberslide,$datanumberlidiv,$m,$n){
		$datacontentu = array();
		for ($i=0; $i <= $dataupdate['numberslide']; $i++){
				if($i==0){
					for ($j=0; $j < $datanumberlidiv[$i]; $j++){
						$datacontentu[$i] .= $datacontent[$j];
						$datacontentu[$i] .= ',';
					}
				} 
			}
		for ($i=1; $i < $numberslide; $i++){
			for ($j=$datanumberlidiv[$i-1]; $j < $datanumberlidiv[$i]; $j++){
					$datacontentu[$i] .= $datacontent[$j];
					$datacontentu[$i] .= ',';
			}
		}
		
		for ($i=0; $i <= $numberslide; $i++){
			$datadiv[$i] = explode(",",$datacontentu[$i]);
		}
		return $datadiv[$m-1][$n-1];
	}
}
