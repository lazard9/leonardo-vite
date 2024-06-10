<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Leonardo Vite
 */

get_header();
?>

<main id="primary" class="site-main">
    <div class="container mx-auto flex flex-wrap px-5 xl:px-12 py-24">

        <div class="w-full md:w-3/4 md:pe-8">
            <?php
            while (have_posts()) :
                the_post();

                get_template_part('template-parts/content', get_post_type());

                the_post_navigation(
                    array(
                        'prev_text' => '<span class="nav-subtitle">' . esc_html__('Previous:', 'leonardo-vite') . '</span> <span class="nav-title">%title</span>',
                        'next_text' => '<span class="nav-subtitle">' . esc_html__('Next:', 'leonardo-vite') . '</span> <span class="nav-title">%title</span>',
                    )
                );

                // If comments are open or we have at least one comment, load up the comment template.
                if (comments_open() || get_comments_number()) :
                    comments_template();
                endif;

            endwhile; // End of the loop.
            ?>
        </div>

        <div class="w-full md:w-1/4">
            <?php get_sidebar(); ?>
        </div>

    </div>
</main><!-- #main -->

<?php
get_footer();
