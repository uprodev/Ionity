<?php

$image = get_sub_field('image');
$imagem = get_sub_field('image_mob');

$srcset = wp_get_attachment_image_srcset($image['id']);
$srcset_mob = wp_get_attachment_image_srcset($imagem['id']);

$btns = get_sub_field('marketplace_button');

?>


<div class="block-download color-secondary">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="image">
                    <picture>
                        <source media="(min-width: 768px)" srcset="<?= $srcset;?>" />
                        <img class="lazy" data-src="<?= $imagem['url'];?>" srcset="<?= $srcset_mob;?>" alt="" />
                    </picture>
                </div>
            </div>
            <div class="col-md-6">
                <div class="text">
                    <div class="subtitle"><?php the_sub_field('subtitle');?></div>
                    <div class="h1">
                        <?php the_sub_field('title');?>
                        <?php $link = get_sub_field('button');

                        if( $link ):
                            $link_url = $link['url'];
                            $link_title = $link['title'];
                            $link_target = $link['target'] ? $link['target'] : '_self';
                            ?>
                            <a class="btn btn-outlined" href="<?= esc_url($link_url); ?>" target="<?= esc_attr($link_target); ?>">
                                <span><?= esc_html($link_title); ?></span>
                                <span class="icon icon--lightning">
                                    <svg width="14" height="20" viewBox="0 0 14 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                      <path d="M5.25758 12.3833L0.427955 11.2144L10.8129 0.636425L8.74235 7.61611L13.572 8.78498L3.18703 19.363L5.25758 12.3833Z" fill="black" />
                                    </svg>
                                </span>
                            </a>
                        <?php endif; ?>
                    </div>
                    <?php if($btns):?>
                        <div class="buttons">
                            <?php foreach($btns as $btn):?>
                                <a href="<?= $btn['link'];?>" target="_blank"><img src="<?= $btn['icon'];?>" alt="" /></a>
                            <?php endforeach;?>
                        </div>
                    <?php endif;?>
                </div>
            </div>
        </div>
        <div class="btn-wrapper d-md-none">
            <a href="#" class="btn btn-outlined">
                <span>Learn More</span>
                <span class="icon icon--lightning">
                  <svg width="14" height="20" viewBox="0 0 14 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M5.25758 12.3833L0.427955 11.2144L10.8129 0.636425L8.74235 7.61611L13.572 8.78498L3.18703 19.363L5.25758 12.3833Z" fill="black" />
                  </svg>
                </span>
            </a>
        </div>
    </div>
</div>
