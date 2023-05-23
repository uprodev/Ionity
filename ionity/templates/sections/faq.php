<?php

$faq = get_sub_field('faqs');

?>

<div class="block-accordion color-primary">
        <div class="container-fluid">
            <div class="wrapper">
                <div class="col-left">
                    <div class="text">
                        <h3><?php the_sub_field('title');?></h3>
                        <h2><?php the_sub_field('subtitle');?></h2>
                    </div>
                </div>
                <div class="col-right">

                    <?php if( $faq ): ?>

                        <div class="accordion">

                            <?php foreach( $faq as $post): setup_postdata($post); ?>

                                <div class="accordion-item">
                                    <button type="button" class="accordion-trigger"><?php the_title(); ?></button>
                                    <div class="accordion-panel">
                                        <?php the_content();?>
                                    </div>
                                </div>

                            <?php endforeach; wp_reset_postdata(); ?>

                        </div>

                    <?php endif; ?>
                    
                </div>
            </div>
        </div>
    </div>