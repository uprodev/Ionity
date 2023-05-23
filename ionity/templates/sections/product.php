<?php

$cards = get_sub_field('about_product');
$btn1 = get_sub_field('button_1');
$btn2 = get_sub_field('button_2');
$ind = get_row_index()-1;
if($ind > 9){
    $index = $ind;
}else{
    $index = '0'.$ind;
}
?>

<div class="block-<?= $index;?> color-secondary">
    <?php if($cards):?>

        <div class="swiper-headline">
            <div class="swiper-wrapper">
                <?php foreach ($cards as $card):?>
                    <div class="swiper-slide">
                        <div class="headline"><?= $card['title'];?></div>
                    </div>
                <?php endforeach;?>
            </div>
        </div>

        <div class="swiper-image">
            <div class="swiper-wrapper">
                <?php foreach ($cards as $card):
                    $im = $card['image_2x'];
                    $imm = $card['image_2x_mob'];
                    $srcset = wp_get_attachment_image_srcset($im['id']);
                    $srcset_mob = wp_get_attachment_image_srcset($imm['id']);?>
                    <div class="swiper-slide">
                        <div class="image">
                            <picture>
                                <source media="(min-width: 768px)" srcset="<?= $srcset;?>" />
                                <img class="lazy" data-src="<?= $imm['url'];?>" srcset="<?= $srcset_mob;?>" alt="" />
                            </picture>
                        </div>
                    </div>
                <?php endforeach;?>
            </div>
        </div>

        <div class="swiper-card">
            <div class="swiper-wrapper">
                <?php foreach ($cards as $card):?>
                    <div class="swiper-slide">
                        <div class="slide-card">
                            <div class="card-header">
                                <span class="icon"><img src="<?= $card['icon'];?>" alt="" /></span>
                                <?= $card['title_card'];?>
                            </div>
                            <?= $card['description'];?>
                            <span class="price"><?= $card['price'];?></span>
                        </div>
                    </div>
                <?php endforeach;?>
            </div>
            <div class="swiper-button-prev">
                <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M6.00004 11.3334L6.95004 10.4001L3.21671 6.66675H11.3334V5.33342H3.21671L6.95004 1.60008L6.00004 0.666748L0.666707 6.00008L6.00004 11.3334Z" fill="#969696" />
                </svg>
            </div>
            <div class="swiper-button-next">
                <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M5.99996 11.3334L5.04996 10.4001L8.78329 6.66675H0.666626V5.33342H8.78329L5.04996 1.60008L5.99996 0.666748L11.3333 6.00008L5.99996 11.3334Z" fill="#969696" />
                </svg>
            </div>
        </div>

        <div class="swiper-mobile">
            <div class="swiper-wrapper">
                <?php foreach ($cards as $card):
                    $imm = $card['image_mob'];
                    $imm2 = $card['image_2x_mob'];?>
                    <div class="swiper-slide">
                        <div class="slide-card-main">
                            <div class="card-image">
                                <img class="lazy" data-src="<?= $imm;?>" srcset="<?= $imm;?> 1x, <?= $imm2;?> 2x" alt="" />
                            </div>
                            <div class="card-description">
                                <div class="card-header">
                                    <span class="icon"><img src="<?= $card['icon'];?>" alt="" /></span>
                                    <?= $card['title_card'];?>
                                </div>
                                <p><?= $card['description'];?></p>
                            </div>
                            <span class="price"><?= $card['price'];?></span>
                        </div>
                    </div>
                <?php endforeach;?>
            </div>
            <div class="swiper-pagination"></div>
        </div>

    <?php endif;?>

    <div class="buttons">
        <?php if( $btn1 ):
            $btn1_url = $btn1['url'];
            $btn1_title = $btn1['title'];
            $btn1_target = $btn1['target'] ? $btn1['target'] : '_self';
            ?>
            <a class="btn btn-solid" href="<?= esc_url($btn1_url); ?>" target="<?= esc_attr($btn1_target); ?>">
                <span><?= esc_html($btn1_title); ?></span>
                <span class="icon icon--lightning">
                    <svg width="14" height="20" viewBox="0 0 14 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M5.25758 12.3833L0.427955 11.2144L10.8129 0.636425L8.74235 7.61611L13.572 8.78498L3.18703 19.363L5.25758 12.3833Z" fill="black" />
                    </svg>
                </span>
            </a>
        <?php endif; ?>
        <?php if( $btn2 ):
            $btn2_url = $btn2['url'];
            $btn2_title = $btn2['title'];
            $btn2_target = $btn2['target'] ? $btn2['target'] : '_self';
            ?>
            <a class="btn btn-outlined" href="<?= esc_url($btn2_url); ?>" target="<?= esc_attr($btn2_target); ?>">
                <span><?= esc_html($btn2_title); ?></span>
                <span class="icon icon--lightning">
                    <svg width="14" height="20" viewBox="0 0 14 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M5.25758 12.3833L0.427955 11.2144L10.8129 0.636425L8.74235 7.61611L13.572 8.78498L3.18703 19.363L5.25758 12.3833Z" fill="black" />
                    </svg>
                </span>
            </a>
        <?php endif; ?>
    </div>
</div>