<?php

get_header();

$i = 1;

global $wp_query;

$paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;

$wp_query = new WP_Query([
    'post_type' => 'post',
    'posts_per_page' => 11,
    'paged' => $paged,
]);

$max_pages = $wp_query->max_num_pages;
?>

    <div class="page-inner">
        <div class="block-blog">
            <div class="container-fluid">
                <h1><?= is_home()?get_the_title(get_option('page_for_posts')):get_queried_object()->name;?></h1>
                <div class="blog-list">

                    <?php if($wp_query->have_posts()):?>

                        <div class="row">
                            <?php while($wp_query->have_posts()): $wp_query->the_post();?>
                                <div class="col-md-<?= $i==1?'12':'6';?> col-lg-<?= $i==1?'8':'4';?>">

                                    <?php get_template_part('parts/blog-item');?>

                                </div>

                            <?php $i++;

                            endwhile;?>
                        </div>

                    <?php endif;?>

                </div>
                <div class="d-none d-md-block">
                    <?php
                    $args = array(
                        'type' => 'list',
                        'show_all'     => false,
                        'end_size'     => 1,
                        'mid_size'     => 3,
                        'prev_next'    => true,
                        'prev_text'    => __('Previous'),
                        'next_text'    => __('Next'),
                        'screen_reader_text' => '',
                        'class'        => 'pagination',
                    );

                     the_posts_pagination($args);?>

                </div>
                <div class="d-md-none">
                    <div class="load-more">
                        <button id="loadmore" data-max-page="<?= $max_pages;?>" data-current="<?= $paged;
                        ?>"><?= __('Load more', 'ionity');?></button>
                    </div>
                </div>
            </div>
        </div>
    </div>


<?php

get_template_part('parts/contacts');

get_footer();
