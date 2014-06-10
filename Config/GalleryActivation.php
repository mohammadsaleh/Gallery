<?php

class GalleryActivation {

	public function beforeActivation(&$controller) {
            return true;
	}

	public function onActivation(&$controller) {
            
            $controller->Setting->write('Gallery.small_width', '50', array(
                'editable' => '1'
            ));
            $controller->Setting->write('Gallery.small_height', '50', array(
                'editable' => '1'
            ));
            $controller->Setting->write('Gallery.medium_width', '255', array(
                'editable' => '1'
            ));
            $controller->Setting->write('Gallery.medium_height', '170', array(
                'editable' => '1'
            ));
            $controller->Setting->write('Gallery.large_width', '0', array(
                'editable' => '1'
            ));
            $controller->Setting->write('Gallery.large_height', '533', array(
                'editable' => '1'
            ));
            
            return true;
	}

	public function beforeDeactivation(&$controller) {
            return true;
	}

	public function onDeactivation(&$controller) {
            $controller->Setting->deleteKey('Gallery.small_width');
            $controller->Setting->deleteKey('Gallery.small_height');
            $controller->Setting->deleteKey('Gallery.medium_width');
            $controller->Setting->deleteKey('Gallery.medium_height');
            $controller->Setting->deleteKey('Gallery.large_width');
            $controller->Setting->deleteKey('Gallery.large_height');
            return true;
	}

}
