<?php

$video = get_sub_field('video');
$link = get_sub_field('button');
$ind = get_row_index();

?>

<div class="banner-home color-primary">
    <figure class="banner-bg">
        <video src="<?= $video['url'];?>" loop autoplay muted playsinline></video>
    </figure>
    <div class="container-fluid">
        <div class="inner">
            <div class="banner-text">
                <?php the_sub_field('title');?>
            </div>
            <div class="d-flex justify-content-between">
                <?php if( $link ):
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
                <?php $languages = icl_get_languages('skip_missing=1');

                if(1 < count($languages)):?>

                    <div class="lang-switch">
                        <ul>

                            <?php foreach($languages as $l){?>

                                <li <?= $l['active']?'class="active"':'';?>><a href="<?= $l['url'];?>"><?= $l['translated_name'];?></a></li>

                            <?php }?>

                        </ul>
                    </div>
                <?php endif;?>
                
            </div>
        </div>
    </div>
</div>