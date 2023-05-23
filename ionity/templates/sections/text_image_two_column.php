<?php

$image = get_sub_field('image');
$imagem = get_sub_field('image_mob');


$srcset = wp_get_attachment_image_srcset($image['id']);
$srcset_mob = wp_get_attachment_image_srcset($imagem['id']);

?>

<div class="block-text">
    <div class="container-fluid">
        <?php the_sub_field('titles');?>
        <div class="row">
            <div class="col-md-6">
                <?php the_sub_field('text_left_column');?>
            </div>
            <div class="col-md-6">
                <div class="image">
                    <picture>
                        <source media="(min-width: 768px)" srcset="<?= $srcset;?>" />
                        <img class="lazy" data-src="<?= $imagem['url'];?>" srcset="<?= $srcset_mob;?>" alt="" />
                    </picture>
                </div>
            </div>
        </div>
    </div>
</div>
