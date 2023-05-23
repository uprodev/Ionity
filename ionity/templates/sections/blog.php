<?php

$blog = get_sub_field('blog');
$link = get_sub_field('button');

if( $link ) {
    $link_url = $link['url'];
    $link_title = $link['title'];
    $link_target = $link['target'] ? $link['target'] : '_self';
}

?>

<div class="block-blog-promo color-primary">
    <div class="container-fluid">
        <div class="block-header">
            <div class="text">
                <h3><?php the_sub_field('subtitle');?></h3>
                <h2><?php the_sub_field('title');?></h2>
            </div>
            <div class="btn-wrapper d-none d-md-block">
                <?php if($link):?>
                    <a class="btn-more" href="<?= esc_url($link_url); ?>" target="<?= esc_attr($link_target); ?>">
                        <?= esc_html($link_title); ?>
                        <svg width="11" height="11" viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1 10.5L10 0.5M10 0.5H2.05882M10 0.5V8.83333" stroke="white" />
                        </svg>
                    </a>
                <?php endif; ?>
            </div>
        </div>
        <div class="wrapper-bg">
            <?php if( $blog ): ?>

                <div class="blog-slider" data-slides="2">
                    <div class="swiper-wrapper">

                        <?php foreach( $blog as $post): setup_postdata($post);

                            get_template_part('parts/post-item');

                        endforeach; wp_reset_postdata(); ?>

                    </div>
                    <div class="swiper-pagination"></div>
                </div>

            <?php endif; ?>

            <div class="btn-wrapper d-md-none">
                <?php if($link):?>
                    <a class="btn-more" href="<?= esc_url($link_url); ?>" target="<?= esc_attr($link_target); ?>">
                        <?= esc_html($link_title); ?>
                        <svg width="11" height="11" viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1 10.5L10 0.5M10 0.5H2.05882M10 0.5V8.83333" stroke="white" />
                        </svg>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>