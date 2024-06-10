<?php
/**
 * Testimonial Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// echo('<pre>');
// print_r($block);
// echo('</pre>');

// Create id attribute allowing for custom "anchor" value.
$id = 'testimonial-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'testimonial';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}

// Load values and handle defaults.
$title = get_field('title') ?: 'Testimonial title';
$description = get_field('description') ?: 'Your testimonial here...';
$full_name = get_field('full_name') ?: 'Author name';
$job_title = get_field('job_title') ?: 'Author title';
$image = get_field('image');

// Check if the field returns a URL or ID
if (is_numeric($image)) {
    $image_url = wp_get_attachment_image_url($image, 'full');
    $image_alt = get_post_meta($image, '_wp_attachment_image_alt', true);
} else {
    $image_url = $image;
    $image_alt = '';
}

$image_url = $image_url ?: '/wp-content/uploads/woocommerce-placeholder.png';
$image_alt = $image_alt ?: 'Avatar of person';

?>
<div id="<?php echo esc_attr($id); ?>" class="my-12 <?php echo esc_attr($className); ?>">
    <div class="max-w-lg mx-auto">
        <div class="relative">
            <div class="flex justify-center items-center bg-gradient-to-r from-purple-600 to-pink-600 rounded-lg overflow-hidden">
                <div class="w-full px-8 py-12">
                    <blockquote class="testimonial-blockquote">
                        <p class="text-lg font-medium text-white mb-2">"<?php echo $title; ?>"</p>
                        <p class="text-white"><?php echo $description; ?></p>
                    </blockquote>
                    <div class="mt-4 flex items-center">
                        <img class="h-10 w-10 rounded-full mr-4" src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>">
                        <div>
                            <p class="text-white font-medium"><?php echo $full_name; ?></p>
                            <p class="text-gray-200"><?php echo $job_title; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>