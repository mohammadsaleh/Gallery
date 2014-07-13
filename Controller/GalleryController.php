<?php
App::uses('GalleryAppController', 'Gallery.Controller');
class GalleryController extends GalleryAppController
{
    public $uses = array('Gallery.Album');

/**
 *  beforeFilter method
 *
 * @return void
 */
	public function beforeFilter(){
	    parent::beforeFilter();
	}

/**
 *  admin_index method
 *
 * @return void
 */
	public function admin_index(){	    
	    $search_status = "Published";
	    $page_title    = __d('gallery',"Published albums");

	    if (isset($_GET['status']) && $_GET['status'] == 'draft') {
	        $search_status = $_GET['status'];
	        $page_title = "Drafts";
	        $is_draft = true;
	    }
	    $galleries = $this->Album->findAllByStatus($search_status);
	    $this->set(compact('galleries', 'page_title', 'search_status'));
	}

/**
 * admin_setting method
 *
 * @return void
 */
	public function admin_setting(){		
            if (!empty($this->request->data)) {
                $small_width = $this->request->data['Gallery']['small_width'];
                $small_height = $this->request->data['Gallery']['small_height'];

                $this->Setting->write('Gallery.small_width', $small_width, array(
                    'editable' => '1'
                ));
                $this->Setting->write('Gallery.small_height', $small_height, array(
                    'editable' => '1'
                ));	
            }
	}
} 