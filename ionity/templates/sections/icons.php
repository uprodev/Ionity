<?php

$llist = get_sub_field('left_list');
$rlist = get_sub_field('right_list');

?>

<div class="block-icons">
    <div class="container-fluid">
        <h3><?php the_sub_field('subtitle');?></h3>
        <h2><?php the_sub_field('title');?></h2>
        <div class="row">
            <div class="col-lg-6">
                <?php if($llist):?>
                    <ul class="icons-list">
                        <?php foreach($llist as $ll):?>
                            <li>
                                <span class="icon"><img src="<?= $ll['icon']['url'];?>" alt="<?= $ll['icon']['alt'];?>" /></span>
                                <p><strong><?= $ll['title'];?></strong><?= $ll['text'];?></p>
                            </li>
                        <?php endforeach;?>
                    </ul>
                <?php endif;?>
            </div>
            <div class="col-lg-6">
                <?php if($rlist):?>
                    <ul class="icons-list">
                        <?php foreach($rlist as $rl):?>
                            <li>
                                <span class="icon"><img src="<?= $rl['icon']['url'];?>" alt="<?= $rl['icon']['alt'];?>" /></span>
                                <p><strong><?= $rl['title'];?></strong><?= $rl['text'];?></p>
                            </li>
                        <?php endforeach;?>
                    </ul>
                <?php endif;?>
            </div>
        </div>
    </div>
</div>