<?php

$list = get_sub_field('list');

?>

<div class="block-marked-list">
    <div class="container-fluid">
        <h3><?php the_sub_field('subtitle');?></h3>
        <h2><?php the_sub_field('title');?></h2>
        <?php if($list):?>
            <ul class="marked-list">
                <?php foreach($list as $li):?>

                    <li>
                        <strong><?= $li['title'];?></strong>
                        <p><?= $li['text'];?></p>
                    </li>

                <?php endforeach;?>
            </ul>
        <?php endif;?>

    </div>
</div>
