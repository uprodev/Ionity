<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset');?>">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title><?php echo wp_get_document_title(); ?></title>
		<?php wp_head();?>
</head>

<body <?php body_class('home'); ?>>

    <?php get_template_part('parts/menu');?>

    <div class="page-wrapper">
        <!-- start header-->
        <header id="header" class="header">
            <div class="container-fluid">
                <div class="logo">

                    <?php $logo = get_field('logo', 'options');?>
                    <a href="<?= get_home_url();?>">
                        <img src="<?= $logo['url'];?>" alt="<?= $logo['alt'];?>" />
                    </a>
                </div>
                <button type="button" class="btn-menu-open"><span></span></button>
            </div>
        </header>
        <div class="page-content">