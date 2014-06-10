<?php
App::uses('AppController', 'Controller');

class GalleryAppController extends AppController
{

    public $helpers = array('Gallery.Gallery', 'Form' => array('className' => 'Gallery.CakePHPFTPForm'));

    public $components = array('Gallery.Util');

    public function beforeFilter()
    {

    }



}
