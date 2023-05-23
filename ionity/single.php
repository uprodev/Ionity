<?php

get_header();

$ids = get_the_ID();

$thumb_id = get_post_thumbnail_id( $ids );
$srcset = wp_get_attachment_image_srcset($thumb_id);

$img = get_field('mobile_image');
$mobile_id = $img['id'];
$srcsetmob = wp_get_attachment_image_srcset($mobile_id);

$other = new WP_Query([
	'post_type' => 'post',
	'posts_per_page' => 3,
	'post__not_in' => array($ids),
]);

$link = get_field('similar_post_button', 'options');

if( $link ){
    $link_url = $link['url'];
    $link_title = $link['title'];
    $link_target = $link['target'] ? $link['target'] : '_self';
}

?>

	<div class="page-inner">
		<div class="block-text">
			<div class="container-fluid">
				<div class="article-wrapper">
					<div class="article-banner">
						<figure>
							<picture>
								<source media="(min-width: 768px)" srcset="<?= $srcset;?>" />
								<img class="lazy" data-src="<?= $img['url'];?>" srcset="<?= $srcsetmob;?>" alt="<?= $img['alt'];?>" />
							</picture>
						</figure>
						<div class="text">
							<h1><?php the_title();?></h1>
							<div class="date"><?php the_time('d.m.Y');?></div>
						</div>
					</div>
					<?php the_content();?>
				</div>
			</div>
		</div>
	</div>

	<div class="block-blog-promo color-primary">
		<div class="container-fluid">
			<div class="block-header">
				<div class="text">
					<h3><?php the_field('similar_post_subtitle', 'options');?></h3>
					<h2><?php the_field('similar_post_title', 'options');?></h2>
				</div>
				<div class="btn-wrapper d-none d-md-block">
					<a href="<?= esc_url($link_url); ?>" target="<?= esc_attr($link_target); ?>" class="btn-more">
                        <?= esc_html($link_title); ?>
						<svg width="11" height="11" viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M1 10.5L10 0.5M10 0.5H2.05882M10 0.5V8.83333" stroke="white" />
						</svg>
					</a>
				</div>
			</div>
			<div class="wrapper-bg">
				<?php if($other->have_posts()):?>
					<div class="blog-slider" data-slides="3">
						<div class="swiper-wrapper">
							<?php while($other->have_posts()): $other->the_post();

								get_template_part('parts/post-item');

							endwhile; wp_reset_postdata();?>

						</div>
						<div class="swiper-pagination"></div>
					</div>

				<?php endif;?>

				<div class="btn-wrapper d-md-none">
					<a href="<?= esc_url($link_url); ?>" target="<?= esc_attr($link_target); ?>" class="btn-more">
                        <?= esc_html($link_title); ?>
						<svg width="11" height="11" viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M1 10.5L10 0.5M10 0.5H2.05882M10 0.5V8.83333" stroke="white" />
						</svg>
					</a>
				</div>
			</div>
		</div>
	</div>

<?php

get_template_part('parts/contacts');

get_footer();