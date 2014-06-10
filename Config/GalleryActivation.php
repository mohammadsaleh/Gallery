<?php

class GalleryActivation {

	public function beforeActivation(&$controller) {
            return true;
	}

	public function onActivation(&$controller) {
            $setting = ClassRegistry::init('Setting');
            $setting->write('Gallery.small_width', '50', array(
                'editable' => '1'
            ));
            $setting->write('Gallery.small_height', '50', array(
                'editable' => '1'
            ));
            $setting->write('Gallery.medium_width', '255', array(
                'editable' => '1'
            ));
            $setting->write('Gallery.medium_height', '170', array(
                'editable' => '1'
            ));
            $setting->write('Gallery.large_width', '0', array(
                'editable' => '1'
            ));
            $setting->write('Gallery.large_height', '533', array(
                'editable' => '1'
            ));
            
            return true;
	}

	public function beforeDeactivation(&$controller) {
            return true;
	}

	public function onDeactivation(&$controller) {
            $setting = ClassRegistry::init('Setting');
            $setting->deleteKey('Gallery.small_width');
            $setting->deleteKey('Gallery.small_height');
            $setting->deleteKey('Gallery.medium_width');
            $setting->deleteKey('Gallery.medium_height');
            $setting->deleteKey('Gallery.large_width');
            $setting->deleteKey('Gallery.large_height');
            return true;
	}

}
