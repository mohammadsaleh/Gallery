<?php
$this->start('Gallery.style');
    echo $this->Html->css(array());
$this->end();
$this->extend('/Common/admin_edit');

$this->Html
        ->addCrumb($this->Html->icon('home'), '/admin')
        ->addCrumb(__d('gallery', 'Gallery Setting'), array('plugin' => 'gallery', 'controller' => 'Gallery', 'action' => 'setting'));

echo $this->Form->create();
$this->Form->inputDefaults(array('label' => false, 'class' => 'span10'));
?>
<div class="gallerySetting row-fluid">
    <div class="span8">

        <ul class="nav nav-tabs">
            <?php
            echo $this->Croogo->adminTab(__d('gallery', 'Gallery Setting'), '#gallery_setting');
            echo $this->Croogo->adminTabs();
            ?>
        </ul>

        <div class="tab-content">
            <div id="gallery_setting" class="tab-pane">
                <?php
                echo $this->Form->input('Gallery.small_width', array('label' => __('small width')));
                echo $this->Form->input('Gallery.small_height', array('label' => __('small height')));
                ?>                                            
            </div>
            <?php echo $this->Croogo->adminTabs(); ?>
        </div>
    </div>

    <div class="span4">
        <?php
        echo $this->Html->beginBox(__d('croogo', 'Publishing')) .
            $this->Form->button(__d('croogo', 'Apply'), array('name' => 'apply', 'button' => 'default')) .
            $this->Form->button(__d('croogo', 'Save'), array('button' => 'default')) .
            $this->Html->link(__d('croogo', 'Cancel'), array('action' => 'index'), array('button' => 'danger')) .
        $this->Html->endBox();

        echo $this->Croogo->adminBoxes();
        ?>
    </div>

</div>
<?php echo $this->Form->end(); ?>
