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
class Cmsmart_Slideshow_Model_Status extends Varien_Object {
    const STATUS_ENABLED = 1;
    const STATUS_DISABLED = 2;
    const STATUS_HIDDEN = 3;

    public function addEnabledFilterToCollection($collection) {
        $collection->addEnableFilter(array('in' => $this->getEnabledStatusIds()));
        return $this;
    }

    public function addCatFilterToCollection($collection, $cat) {
        $collection->addCatFilter($cat);
        return $this;
    }

    public function getEnabledStatusIds() {
        return array(self::STATUS_ENABLED);
    }

    public function getDisabledStatusIds() {
        return array(self::STATUS_DISABLED);
    }

    public function getHiddenStatusIds() {
        return array(self::STATUS_HIDDEN);
    }

    static public function getOptionArray() {
        return array(
            self::STATUS_ENABLED => Mage::helper('slideshow')->__('Enabled'),
            self::STATUS_DISABLED => Mage::helper('slideshow')->__('Disabled'),
            self::STATUS_HIDDEN => Mage::helper('slideshow')->__('Hidden')
        );
    }

}
