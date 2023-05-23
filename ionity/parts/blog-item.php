<?php

$img = get_field('thumb');
$thumb_id = $img['id'];

$srcset = wp_get_attachment_image_srcset($thumb_id);

?>


    <a href="<?php the_permalink(); ?>" class="card-blog blog-featured">
        <figure class="card-image">
            <img class="lazy" data-src="<?= $img['url'];?>" srcset="<?= $srcset;?>" alt="" />
        </figure>
        <span class="card-main">
            <p><?php the_title(); ?></p>
            <span class="d-flex">
                <span href="<?php the_permalink(); ?>" class="btn-more">
                    <?= __('Read more', 'ionity');?>
                    <svg width="11" height="11" viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1 10.5L10 0.5M10 0.5H2.05882M10 0.5V8.83333" stroke="white" />
                    </svg>
                </span>
                <span class="date"><?php the_time('d.m.Y');?></span>
            </span>
        </span>
    </a>
