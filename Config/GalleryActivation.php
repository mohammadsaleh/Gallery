<?php
App::uses('CakeSchema', 'Model');
App::uses('ConnectionManager', 'Model');
class GalleryActivation {

        /**
         * 
         * @param type $controller
         * @return boolean
         */
	public function beforeActivation(&$controller) {
            return true;
	}
        /**
         * 
         * @param type $controller
         * @return boolean
         */
	public function onActivation(&$controller) {
            $this->__createTables();
            $controller->Setting->write('Gallery.small_width', '50', array('editable' => '1'));
            $controller->Setting->write('Gallery.small_height', '50', array('editable' => '1'));
            $controller->Setting->write('Gallery.medium_width', '255', array('editable' => '1'));
            $controller->Setting->write('Gallery.medium_height', '170', array('editable' => '1'));
            $controller->Setting->write('Gallery.large_width', '0', array('editable' => '1'));
            $controller->Setting->write('Gallery.large_height', '533', array('editable' => '1'));
            
            return true;
	}
        /**
         * Made require tables
         */
        private function __createTables() {
            $pluginName ='Gallery';
            $db = ConnectionManager::getDataSource('default');
            $tables = $db->listSources();
            $schema = new CakeSchema(array(
                'name' => $pluginName,
                'path' => APP.'plugin'.DS.$pluginName.DS.'Config'.DS.'Schema',
            ));
            $schema = $schema->load();
            foreach ($schema->tables as $table => $fields) {
                if(!in_array($table, $tables)){
                    $create = $db->createSchema($schema, $table);
                    try {
                        $db->execute($create);
                    } catch (PDOException $e) {
                        die(__('Could not create table: %s', $e->getMessage()));
                    }
                }
            }
        }
        /**
         * 
         * @param type $controller
         * @return boolean
         */
	public function beforeDeactivation(&$controller) {
            return true;
	}
        /**
         * 
         * @param type $controller
         * @return boolean
         */
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
