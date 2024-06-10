<?php

/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Leonardo Vite
 */

get_header();
?>

<main id="primary" class="site-main">
    <div class="container mx-auto flex flex-wrap px-5 xl:px-12 py-24">

        <div class="w-full md:w-3/4 md:pe-8">
            <?php if (have_posts()) : ?>

                <header class="page-header">
                    <?php
                    the_archive_title('<h1 class="page-title">', '</h1>');
                    the_archive_description('<div class="archive-description">', '</div>');
                    ?>
                </header><!-- .page-header -->

            <?php
                /* Start the Loop */
                while (have_posts()) :
                    the_post();

                    /*
                        * Include the Post-Type-specific template for the content.
                        * If you want to override this in a child theme, then include a file
                        * called content-___.php (where ___ is the Post Type name) and that will be used instead.
                        */
                    get_template_part('template-parts/content', get_post_type());

                endwhile;

                the_posts_navigation();

            else :

                get_template_part('template-parts/content', 'none');

            endif;
            ?>
        </div>

        <div class="w-full md:w-1/4">
            <?php get_sidebar(); ?>
        </div>

    </div>
</main><!-- #main -->

<?php
get_footer();
