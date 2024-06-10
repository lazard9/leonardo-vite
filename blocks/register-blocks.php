<?php

/**
 * Registers a custom block type in the Gutenberg editor.
 *
 * @link https://www.advancedcustomfields.com/resources/acf_register_block_type/
 *
 * @package Leonardo Vite
 */


add_action('init', 'register_acf_blocks_init');

function register_acf_blocks_init()
{
    register_block_type(__DIR__ . '/team-member');
    register_block_type(__DIR__ . '/testimonial');
}


// add_action('acf/init', 'register_acf_blocks_acf_init');

// function register_acf_blocks_acf_init()
// {
//     if (function_exists('acf_register_block_type')) {

//         // Testimonial block
//         acf_register_block_type(array(
//             'name'              => 'testimonial',
//             'title'             => __('Testimonial'),
//             'description'       => __('A custom testimonial block.'),
//             'render_template'   => 'blocks/testimonial/testimonial.php',
//             'category'          => 'leonardo-vite',
//             'icon'              => 'testimonial',
//             'keywords'          => array('testimonial'),
//             'supports'          => array(
//                 'anchor' => true,
//             ),
//             'mode'              => 'preview',
//         ));

//         // Team Member block
//         acf_register_block_type(array(
//             'name'              => 'team-member',
//             'title'             => __('Team Member'),
//             'description'       => __('Display a team member in a card'),
//             'render_template'   => '/blocks/team-member/team-member.php',
//             'category'          => 'leonardo-vite',
//             'icon'              => 'admin-users',
//             'keywords'          => array('team', 'member'),
//             'supports'          => array(
//                 'anchor' => true,
//             ),
//             'mode'              => 'preview',
//         ));
//     }
// }
