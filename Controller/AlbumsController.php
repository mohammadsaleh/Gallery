<?php
class AlbumsController extends GalleryAppController
{

    public $helpers = array('Form' => array('className' => 'Gallery.CakePHPFTPForm'));

    public $uses = array('Gallery.Album', 'Gallery.Picture');
/**
 *  beforeFilter method
 *
 * @return void
 */
	public function beforeFilter() {
		parent::beforeFilter();
		$this->Security->unlockedActions = array('admin_update','admin_delete');
	}


/**
 *  admin_add method
 *
 * @return void
 */
	public function admin_add(){
		
	}

/**
 *  method
 *
 * @return void
 */
	public function admin_view($id = null){
	    $this->Album->id = $id;
	    if (!$this->Album->exists()) {
	        throw new NotFoundException("This album does not exist");
	    }
	    $this->set('album', $this->Album->read(null));
	}


/**
 * admin_update method
 *
 * @return void
 */
	public function admin_update(){    	
	    if ($this->request->is('post')) {
	        if ($this->Album->save($this->request->data)) {
	            echo "You configurations are saved.";
	        }
	    }
	    $this->render(false, false);
	}


/**
 * Create or find the requested album
 * @param null $model
 * @param null $model_id
 */
	public function admin_upload($model = null, $model_id = null){
	    ini_set("memory_limit", "10000M");

	    if (isset($this->params['named']['gallery_id']) && !empty($this->params['named']['gallery_id'])) {
	        $album = $this->Album->findById($this->params['named']['gallery_id']);
	    } else {
	        # If the gallery doesnt exists, create a new one and redirect back to this page with the
	        # gallery_id
	        $album = $this->Album->init($model, $model_id);

	        # Redirect back to this page with an album ID
	        $this->redirect(
	            array(
	                'action' => 'upload',
	                'admin' => true,
	                'gallery_id' => $album['Album']['id']
	            )
	        );
	    }

	    $files = $album['Picture'];

	    $this->set(compact('model', 'model_id', 'album', 'files'));
	}


/**
 * admin_delete method
 *
 * @return void
 */
	public function admin_delete($id){    	
	    $this->Album->id = $id;
	    $album = $this->Album->read(null);

	    if (count($album['Picture'])) {
	        foreach ($album['Picture'] as $pic) {
	            # Original
	            if ($pic['style'] = 'full') {
	                # Remove from database and all files
	                $this->Picture->deletePictures($pic['id']);
	            }
	        }
	    }

	    if ($this->Album->delete($id)) {
	        # Delete album folders
	        $album_dir = WWW_ROOT . 'files' . DS . 'gallery' . DS . $id . DS;
	        $this->Util->deleteDir($album_dir);

	        $this->Session->setFlash("Album deleted.");

	        $this->redirect(array('controller' => 'gallery', 'action' => 'index', 'plugin' => 'gallery'));
	    }
	}


}

?>
