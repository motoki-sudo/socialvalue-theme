<?php
/**
 * Template Name: english-page
 */
get_header('en');

while ( have_posts() ) :
    the_post();
    the_content();
endwhile;

get_footer();
?>
