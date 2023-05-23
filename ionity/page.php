<?php

get_header();

$id = get_the_ID();

if(is_woocommerce()):

    the_content();

else:
?>


<div class="page-inner">

<?php if( have_rows('content', $id) ):

	while( have_rows('content', $id) ): the_row();

		get_template_part('templates/sections/' . get_row_layout());

	endwhile;

endif;?>

</div>

<?php

get_template_part('parts/contacts');

endif;

get_footer();