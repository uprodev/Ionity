<?php

$cards = get_sub_field('cards');
$ind = get_row_index()-1;
if($ind > 9){
    $index = $ind;
}else{
    $index = '0'.$ind;
}
?>

<div class="block-<?= $index;?> color-primary">
    <div class="container-fluid">
        <div class="row">
            <?php if($cards):

                foreach ($cards as $card):
                    $im = $card['background'];
                    $srcset = wp_get_attachment_image_srcset($im['id'], 'full');


                  //  print_r($srcset)

                ?>

                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-image"><img class="lazy" data-src="<?= $im['url'];?>" srcset="<?= $srcset;?>" alt="<?= $im['alt'];?>" /></div>
                            <div class="card-main">
                                <h3><?= $card['title'];?></h3>
                                <p><?= $card['description'];?></p>
                                <?php
                                $dark =$card['button_dark'];
                                $link = $card['button'];

                                if( $link ):
                                    $link_url = $link['url'];
                                    $link_title = $link['title'];
                                    $link_target = $link['target'] ? $link['target'] : '_self';
                                    ?>
                                    <a class="btn btn-outlined<?= $dark?'-dark':'';?>" href="<?= esc_url($link_url); ?>" target="<?= esc_attr($link_target); ?>">
                                        <span><?= esc_html($link_title); ?></span>
                                        <span class="icon icon--lightning">
                                            <svg width="14" height="20" viewBox="0 0 14 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                              <path d="M5.25758 12.3833L0.427955 11.2144L10.8129 0.636425L8.74235 7.61611L13.572 8.78498L3.18703 19.363L5.25758 12.3833Z" fill="black" />
                                            </svg>
                                        </span>
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                <?php endforeach;

            endif;?>
        </div>
    </div>
</div>
