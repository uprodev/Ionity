<?php

$image = get_sub_field('image');
$imagem = get_sub_field('image_mob');


$srcset = wp_get_attachment_image_srcset($image['id']);
$srcset_mob = wp_get_attachment_image_srcset($imagem['id']);

?>

    <div class="block-text">
        <div class="container-fluid">
            <div class="article-wrapper">
                <div class="article-banner">
                    <figure>
                        <picture>
                            <source media="(min-width: 768px)" srcset="<?= $srcset;?>" />
                            <img class="lazy" data-src="<?= $imagem['url'];?>" srcset="<?= $srcset_mob;?>" alt="" />
                        </picture>
                    </figure>
                    <div class="text">
                        <h1><?php the_sub_field('title');?></h1>
                    </div>
                </div>
                <?php if( have_rows('content_page') ):

                    while ( have_rows('content_page') ) : the_row();

                        if( get_row_layout() == 'text' ):

                            echo get_sub_field('text');

                        elseif( get_row_layout() == 'image' ):
                            $image = get_sub_field('image');
                            $imagem = get_sub_field('image_mob');


                            $srcset = wp_get_attachment_image_srcset($image['id']);
                            $srcset_mob = wp_get_attachment_image_srcset($imagem['id']);?>

                            <div class="image">
                                <picture>
                                    <source media="(min-width: 768px)" srcset="<?= $srcset;?>" />
                                    <img class="lazy" data-src="<?= $imagem['url'];?>" srcset="<?= $srcset_mob;?>" alt="" />
                                </picture>
                            </div>

                        <?php endif;

                    endwhile;

                endif;?>



            </div>
        </div>
    </div>