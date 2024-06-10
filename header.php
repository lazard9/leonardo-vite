<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Leonardo Vite
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <div id="page" class="site">
        <a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'leonardo-vite'); ?></a>

        <header id="masthead" class="site-header relative">
            <!-- navbar -->
            <nav class="flex justify-between bg-gray-900">
                <div class="container mx-auto px-5 xl:px-12 py-6 flex w-full items-center">
                    <div class="site-branding">
                        <?php
                        the_custom_logo();
                        if (is_front_page() && is_home()) :
                        ?>
                            <h1 class="site-title"><a class="text-3xl font-bold font-heading text-slate-200 hover:text-amber-400 transition-colors" href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
                        <?php
                        else :
                        ?>
                            <p class="site-title"><a class="text-3xl font-bold font-heading text-slate-200 hover:text-amber-400 transition-colors" href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></p>
                        <?php
                        endif;
                        $leonardo_vite_description = get_bloginfo('description', 'display');
                        if ($leonardo_vite_description || is_customize_preview()) :
                        ?>
                            <p class="site-description text-sm font-bold text-amber-400"><?php echo $leonardo_vite_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
                                                                                            ?></p>
                        <?php endif; ?>
                    </div><!-- .site-branding -->
                    <!-- Nav Links -->
                    <nav id="site-navigation" class="main-navigation flex items-center justify-center text-slate-200 px-4 mx-auto my-0 font-semibold font-heading space-x-12 list-none">
                        <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e('Primary Menu', 'leonardo-vite'); ?></button>
                        <?php
                            wp_nav_menu(
                                array(
                                    'theme_location' => 'menu-1',
                                    'menu_id'        => 'primary-menu',
                                )
                            );
                        ?>
                    </nav><!-- #site-navigation -->
                    <!-- Header Icons -->
                    <div class="flex items-center space-x-5">
                        <a class="text-slate-200 hover:text-slate-400 transition-colors" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                            </svg>
                        </a>
                        <a class="flex items-center text-slate-200 hover:text-slate-400 transition-colors" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                            <span class="flex absolute -mt-5 ml-4">
                                <span class="animate-ping absolute inline-flex h-3 w-3 rounded-full bg-pink-400 opacity-75"></span>
                                <span class="relative inline-flex rounded-full h-3 w-3 bg-pink-500">
                                </span>
                            </span>
                        </a>
                        <!-- Sign In / Register      -->
                        <a class="flex items-center text-slate-200 hover:text-slate-400 transition-colors" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-slate-200 hover:text-slate-400 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </a>

                    </div>
                </div>
            </nav>
        </header><!-- #masthead -->