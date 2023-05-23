<?php

$image = get_sub_field('image_1');
$imagem = get_sub_field('image_1_mob');

$srcset = wp_get_attachment_image_srcset($image['id']);
$srcset_mob = wp_get_attachment_image_srcset($imagem['id']);

$slides = get_sub_field('about_slides');

$count = count($slides);

?>

<div class="block-02">
    <div class="row g-0">
        <div class="col-md-5 col-lg-6">
            <div class="promo-image">
                <picture>
                    <source media="(min-width: 768px)" srcset="<?= $srcset;?>" />
                    <img class="lazy" data-src="<?= $imagem['url'];?>" srcset="<?= $srcset_mob;?>" alt="" />
                </picture>
                <div class="dots">
                    <?php for ($i = 0; $i<$count; $i++):?>
                    <div class="dot d-0<?= $i+1;?> <?= $i==0?'active':'';?>" data-slide="<?= $i;?>"></div>
                    <?php endfor;?>
                </div>
            </div>
        </div>
        <div class="col-md-7 col-lg-6">
            <div class="promo-slider-wrapper">
                <button class="button-close">
                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1.4 14L0 12.6L5.6 7L0 1.4L1.4 0L7 5.6L12.6 0L14 1.4L8.4 7L14 12.6L12.6 14L7 8.4L1.4 14Z" fill="black" />
                    </svg>
                </button>
                <div class="promo-slider">
                    <div class="swiper-wrapper">
                        <?php foreach($slides as $slide):
                            $simage = $slide['image_1'];
                            $simagem = $slide['image_1_mob'];

                            $ssrcset = wp_get_attachment_image_srcset($simage['id']);
                            $ssrcset_mob = wp_get_attachment_image_srcset($simagem['id']);
                            ?>
                            <div class="swiper-slide">
                                <div class="card">
                                    <div class="card-img">
                                        <picture>
                                            <source media="(min-width: 768px)" srcset="<?= $ssrcset;?>" />
                                            <img class="lazy" data-src="<?= $simagem['url'];?>" srcset="<?= $ssrcset_mob;?>" alt="" />
                                        </picture>
                                    </div>
                                    <div class="card-text">
                                        <h2><?= $slide['title'];?></h2>
                                        <p><?= $slide['description'];?></p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach;?>
                    </div>
                    <div class="slider-controls">
                        <div class="swiper-btn-prev">
                            <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M5.99992 11.3332L6.94992 10.3998L3.21659 6.6665H11.3333V5.33317H3.21659L6.94992 1.59984L5.99992 0.666504L0.666585 5.99984L5.99992 11.3332Z" fill="#969696" />
                            </svg>
                        </div>
                        <div class="swiper-btn-next">
                            <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M6.00008 11.3332L5.05008 10.3998L8.78341 6.6665H0.666748V5.33317H8.78341L5.05008 1.59984L6.00008 0.666504L11.3334 5.99984L6.00008 11.3332Z" fill="#969696" />
                            </svg>
                        </div>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
    </div>
</div>