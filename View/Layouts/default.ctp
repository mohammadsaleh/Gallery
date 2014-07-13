<!DOCTYPE html>
<html lang="en" class="no-js">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <title><?php echo $title_for_layout; ?> - <?php echo __d('gallery', 'Croogo'); ?></title>
        <link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/themes/smoothness/jquery-ui.css"/>
        <?php

        echo $this->Html->css(
            array(
                '/croogo/css/croogo-bootstrap',
                '/croogo/css/croogo-bootstrap-responsive',
                '/croogo/css/thickbox'
                )
            );
        $this->startIfEmpty('Gallery.style');
            echo $this->Html->css(array(
                'Gallery.themes/' . Configure::read('GalleryOptions.App.theme') . '.min',
                'Gallery.dropzone',
                'Gallery.style'
            ));
        $this->end();
        echo $this->fetch('Gallery.style');
        
        echo $this->Layout->js();
        echo $this->Html->script('Gallery.lib/modernizr');

        echo $this->Html->script(array(
            '/croogo/js/html5',
            '/croogo/js/jquery/jquery.min',
            '/croogo/js/jquery/jquery-ui.min',
            '/croogo/js/jquery/jquery.slug',
            '/croogo/js/jquery/jquery.cookie',
            '/croogo/js/jquery/jquery.hoverIntent.minified',
            '/croogo/js/jquery/superfish',
            '/croogo/js/jquery/supersubs',
            '/croogo/js/jquery/jquery.tipsy',
            '/croogo/js/jquery/jquery.elastic-1.6.1.js',
            '/croogo/js/jquery/thickbox-compressed',
            '/croogo/js/underscore-min',
            '/croogo/js/admin',
            '/croogo/js/choose',
            '/croogo/js/croogo-bootstrap.js',
        ));
?>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
<script>window.jQuery || document.write('<script src="<?php echo $this->params->webroot ?>js/lib/jquery.min.js"><\/script>')</script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<?php echo $this->Html->script(array('Gallery.lib/dropzone.min.js', 'Gallery.scripts.js')); ?>

<?php 
        echo $this->fetch('script');
        echo $this->fetch('css');

        ?>
    </head>
    <body class="<?php echo $this->params->params['controller'] . '_' . $this->params->params['action'] ?>"
          data-base-url="<?php echo $this->params->webroot ?>"
          data-plugin-base-url="<?php echo $this->Html->url(
              array('plugin' => 'gallery', 'controller' => 'gallery', 'action' => 'index')
          ) ?>">
        <div id="wrap">
            <?php echo $this->element('admin/header'); ?>
            <?php echo $this->element('admin/navigation'); ?>
            <div id="push"></div>
            <div id="content-container" class="container-fluid">
                <div class="row-fluid">
                    <div id="content" class="clearfix">
                        <?php echo $this->element('admin/breadcrumb'); ?>
                        <div id="inner-content" class="span12">
                            <?php echo $this->Layout->sessionFlash(); ?>
                            <?php echo $this->fetch('content'); ?>
                        </div>
                    </div>
                    &nbsp;
                </div>
            </div>
        </div>
        <?php echo $this->element('admin/footer'); ?>
        <?php
        echo $this->Blocks->get('scriptBottom');
        echo $this->Js->writeBuffer();
        ?>
    </body>
</html>