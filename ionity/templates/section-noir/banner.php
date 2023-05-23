<?php

$video = get_sub_field('video');
$link = get_sub_field('button');
$flag = get_sub_field('flag');

?>
<div class="banner-home">
    <figure class="banner-bg">
        <video src="<?= $video['url'];?>" loop autoplay muted playsinline></video>
    </figure>

    <div class="banner-text">
        <h1><?php the_sub_field('title');?></h1>
        <p><?php the_sub_field('flag_text');?> <img src="<?= $flag['url'];?>" alt="<?= $flag['alt'];?>" /></p>
        <div class="btn-wrapper d-lg-none">
            <?php if( $link ):
                $link_url = $link['url'];
                $link_title = $link['title'];
                $link_target = $link['target'] ? $link['target'] : '_self';
                ?>
                <a class="btn btn-light" href="<?= esc_url($link_url); ?>" target="<?= esc_attr($link_target); ?>"><?= esc_html($link_title); ?></a>
            <?php endif; ?>
        </div>
    </div>
    <?php if(get_sub_field('scroll_text')):?>
        <div class="scroll-down">
            <p><img src="<?= get_template_directory_uri();?>/assets/img/icons/scroll.svg" alt="" /> <?php the_sub_field('scroll_text');?></p>
        </div>
    <?php endif;?>
</div>