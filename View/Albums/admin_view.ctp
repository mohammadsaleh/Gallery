<div class="row">
    <div class="col-md-10">
        <h2><?php echo $album['Album']['title'] ?></h2>
    </div>
    <div class="col-md-2">
        <?php echo $this->Html->link(
            '<i class="fa fa-edit"></i>'. __d('gallery','Edit album'),
            array(
                'controller' => 'albums',
                'action' => 'upload',
                'gallery_id' => $album['Album']['id']
            ),
            array(
                'class' => 'btn btn-primary btn-sm pull-right',
                'style' => 'margin-top: 20px',
                'escape' => false
            )
        );
        ?>
    </div>
</div>

<hr/>

<div class="row">
    <div class="col-md-12">
        <div class="row">

            <?php if (empty($album['Picture'])) { ?>
                <div class="container-empty">
                    <div class="img"><i class="fa fa-picture-o"></i></div>
                    <h2><?php  echo __d('gallery','This album has no photos yet.') ?></h2>
                </div>
            <?php } else { ?>
                <?php foreach ($album['Picture'] as $picture) { ?>
                    <div class="col-sm-6 col-md-3">
                        <div class="thumbnail">
                            <?php
                            echo $this->Html->image('/'.str_replace('\\', '/', $picture['styles']['medium']));
                            ?>
                        </div>
                    </div>
                <?php } ?>
            <?php } ?>

        </div>
    </div>
</div>
