<?php

$bg = get_sub_field('background_2x');
$imagem = get_sub_field('image_mob_2x');

$srcset = wp_get_attachment_image_srcset($bg['id'], 'full');
$srcset_mob = wp_get_attachment_image_srcset($imagem['id'], 'full');
$position = get_sub_field('position_text');
$dark = get_sub_field('dark__light');

?>

<div  class="block-<?= $position?'11':'05';?> color-primary<?= $dark?' color-white':'';?>">
    <div class="container-fluid">
        <?= $position?'':'<div class="wrapper-bg">';?>
            <div class="card-wide card-wide--text-<?= $position?'left':'right';?>">
                <figure class="card-image">
                    <?php if($imagem):?>
                        <picture>
                            <source media="(min-width: 768px)" srcset="<?= $srcset;?>">
                            <img  class="lazy" data-src="<?= $imagem['url'];?>" srcset="<?= $srcset_mob;?>" alt="" />
                        </picture>
                    <?php else:?>
                        <img class="lazy" data-src="<?= $bg;?>" srcset="<?= $srcset;?>" alt="" />
                    <?php endif;?>
                </figure>
                <div class="card-main">
                    <div class="text">
                        <h3><?php the_sub_field('title');?></h3>
                        <p><?php the_sub_field('text');?></p>
                        <?php $link = get_sub_field('button');

                        if( $link ):
                            $link_url = $link['url'];
                            $link_title = $link['title'];
                            $link_target = $link['target'] ? $link['target'] : '_self';
                            ?>
                            <a class="btn btn-outlined<?= $dark?'-dark':'';?>" href="<?= esc_url($link_url); ?>" target="<?= esc_attr($link_target); ?>">
                                <span><?= esc_html($link_title); ?></span>
                                <span class="icon icon--lightning">
                                    <svg width="14" height="20" viewBox="0 0 14 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                      <path d="M5.25758 12.3833L0.427955 11.2144L10.8129 0.636425L8.74235 7.61611L13.572 8.78498L3.18703 19.363L5.25758 12.3833Z" fill="black" />
                                    </svg>
                                </span>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?= $position?'':'</div>';?>
    </div>
</div>
