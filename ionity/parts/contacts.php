<div class="block-contacts color-primary">
    <div class="container-fluid">
        <div class="d-md-none">
            <h3><?php the_field('contact_subtitle', 'options');?></h3>
            <h2><?php the_field('contact_title', 'options');?></h2>
        </div>
        <div class="row">
            <div class="col-lg-5">
                <div class="d-none d-md-block">
                    <h3><?php the_field('contact_subtitle', 'options');?></h3>
                    <h2><?php the_field('contact_title', 'options');?></h2>
                </div>
                <div class="form">
                    <?= do_shortcode('[contact-form-7 id="'. get_field('contact_form', 'options').'"]');?>
                </div>
            </div>
            <div class="col-lg-7">
                <?php if(get_field('contacts', 'options')):?>

                    <div class="contact-list">
                        <ul>

                            <?php foreach(get_field('contacts', 'options') as $con):
                                $link = $con['link'];

                                if( $link ) {
                                    $link_url = $link['url'];
                                    $link_title = $link['title'];
                                    $link_target = $link['target'] ? $link['target'] : '_self';
                                }?>

                                <li>
                                    <div class="text">
                                        <a href="<?= esc_url($link_url); ?>" target="<?= esc_attr($link_target); ?>">
                                            <strong>
                                                <?= $con['text_link'];?>
                                                <svg width="11" height="11" viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M1 10.5L10 0.5M10 0.5H2.05882M10 0.5V8.83333" stroke="white" />
                                                </svg>
                                            </strong>
                                            <?php if($con['description']):?>
                                                <p><?= $con['description'];?></p>
                                            <?php endif;?>
                                        </a>
                                    </div>
                                    <div class="link">
                                        <a class="btn-more" href="<?= esc_url($link_url); ?>" target="<?= esc_attr($link_target); ?>">
                                            <?= esc_html($link_title); ?>
                                            <svg width="11" height="11" viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M1 10.5L10 0.5M10 0.5H2.05882M10 0.5V8.83333" stroke="white" />
                                            </svg>
                                        </a>
                                    </div>
                                </li>

                            <?php endforeach;?>

                        </ul>
                    </div>

                <?php endif;?>

            </div>
        </div>
    </div>
</div>