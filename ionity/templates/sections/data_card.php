<?php

$bg = get_sub_field('background');
$srcset = wp_get_attachment_image_srcset($bg['id']);
$nums = get_sub_field('numbers');

$ind = get_row_index()-1;
if($ind > 9){
    $index = $ind;
}else{
    $index = '0'.$ind;
}

 
?>

<div class="block-<?= $index;?> color-primary">
    <div class="container-fluid">
        <div class="card-wide card-wide--two-col">
            <figure class="card-image">
                <img class="lazy" data-src="<?= $bg;?>" srcset="<?= $srcset;?>" alt="" />
            </figure>
            <div class="card-main">
                <div class="wrapper">
                    <div class="col-left">
                        <div class="text">
                            <h3><?php the_sub_field('title');?></h3>
                            <p><?php the_sub_field('description');?></p>
                        </div>
                    </div>
                    <div class="col-right">
                        <?php if($nums):?>
                            <ul>
                                <?php foreach ($nums as $num):?>
                                    <li>
                                        <strong><?= $num['nmbr'];?></strong>
                                        <p><?= $num['text'];?></p>
                                    </li>
                                <?php endforeach;?>
                            </ul>
                        <?php endif;?>
                    </div>
                </div>
                <?php $link = get_sub_field('button');

                if( $link ):
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
            </div>
        </div>
    </div>
</div>
