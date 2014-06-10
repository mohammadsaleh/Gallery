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
            
            return true;
	}

	// public function beforeDeactivation(&$controller) {
 //            return true;
	// }

	// public function onDeactivation(&$controller) {
 //            $setting = ClassRegistry::init('Setting');
 //            $setting->deleteKey('aparnicTemplate.rtl');
 //            $setting->deleteKey('aparnicTemplate.theme');
 //            return true;
	// }

}
