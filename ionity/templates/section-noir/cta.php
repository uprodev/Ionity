<?php

$image = get_sub_field('background');
$imagem = get_sub_field('background_mob');

$srcset = wp_get_attachment_image_srcset($image['id']);
$srcset_mob = wp_get_attachment_image_srcset($imagem['id']);

$link = get_sub_field('button');

?>


<div class="block-01">
    <div class="image">
        <picture>
            <source media="(min-width: 768px)" srcset="<?= $srcset;?>" />
            <img class="lazy" data-src="<?= $imagem['url'];?>" srcset="<?= $srcset_mob;?>" alt="" />
        </picture>
    </div>
    <div class="container-fluid">
        <div class="row justify-content-end g-0">
            <div class="col-md-6">
                <div class="text">
                    <h2><?php the_sub_field('title');?></h2>
                    <p><?php the_sub_field('description');?></p>
                    <?php if( $link ):
                        $link_url = $link['url'];
                        $link_title = $link['title'];
                        $link_target = $link['target'] ? $link['target'] : '_self';
                        ?>
                        <a class="btn btn-dark" href="<?= esc_url($link_url); ?>" target="<?= esc_attr($link_target); ?>"><?= esc_html($link_title); ?></a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>