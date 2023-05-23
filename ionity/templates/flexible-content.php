<?php

/*

Template Name: Flexible Content

*/

get_header();

$id = get_the_ID();


if( have_rows('content', $id) ):

    while( have_rows('content', $id) ): the_row();

        get_template_part('templates/sections/' . get_row_layout());

    endwhile;

endif;

get_template_part('parts/contacts');

get_footer();