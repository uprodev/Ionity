<?php

$image = get_sub_field('image');
$imagem = get_sub_field('image_mob');

$srcset = wp_get_attachment_image_srcset($image['id'], 'large');
$srcset_mob = wp_get_attachment_image_srcset($imagem['id'], 'full');

$content = get_sub_field('content');
$ind = get_row_index()-1;
if($ind > 9){
    $index = $ind;
}else{
    $index = '0'.$ind;
}




?>

<div class="block-<?= $index;?> color-primary">
    <figure class="image">
        <picture>
            <source media="(min-width: 768px)" srcset="<?= $srcset;?>" />
            <img   class="lazy" data-src="<?= $imagem['url'];?>" srcset="<?= $srcset_mob;?>" alt="" />
        </picture>
    </figure>
    <div class="stats">
        <?php if($content):?>

            <ul>

                <?php foreach($content as $item):?>

                    <li>
                        <strong><span><?= $item['numbers'];?></span></strong>
                        <p><?= $item['text'];?></p>
                    </li>

                <?php endforeach;?>

            </ul>

        <?php endif;?>

    </div>
</div>
