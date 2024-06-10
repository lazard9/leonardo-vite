<?php
$block = $args['block'];
$data = $args['data'];
$block_id = $args['block_id'];
$class_name = $args['class_name'];
?>

<div id="<?php echo $block_id; ?>" class="<?php echo $class_name; ?> max-w-sm my-12 shadow-lg not-prose">

    <!-- Avatar Image -->
    <img class="rounded-t-md w-full object-cover mx-auto" src="<?= esc_url($data['avatar']['url']); ?>" alt="<?= esc_attr($data['avatar']['alt']); ?>">

    <div class="rounded-b-md p-4 bg-white">
        <!-- Name and Position -->
        <div class=" space-y-1 text-lg font-medium leading-6">
            <h3 class="text-lg font-semibold"><?= $data['name']; ?></h3>
            <p class="text-indigo-600"><?= $data['position']; ?></p>
        </div>

        <!-- Bio -->
        <div class="text-lg mt-4">
            <p class="text-gray-400"><?= $data['bio']; ?></p>
        </div>

        <?php
        // Check if either Twitter or LinkedIn has been set
        if ($data['twitter_handle'] || $data['linkedin']) :  ?>

            <!-- Social Links -->
            <ul role="list" class="flex space-x-5 mt-4 list-none p-0">
                <?php if ($data['twitter_handle']) { ?>
                    <li>
                        <a href="https://twitter.com/<?= esc_url($data['twitter_handle']); ?>" class="text-gray-400 hover:text-gray-500">
                            <span class="sr-only">Twitter</span>
                            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                                <path d="M6.29 18.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0020 3.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.073 4.073 0 01.8 7.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 010 16.407a11.616 11.616 0 006.29 1.84"></path>
                            </svg>
                        </a>
                    </li>
                <?php } ?>

                <?php if ($data['linkedin']) { ?>
                    <li>
                        <a href="<?= esc_url($data['linkedin']); ?>" class="text-gray-400 hover:text-gray-500">
                            <span class="sr-only">LinkedIn</span>
                            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                                <path fill-rule="evenodd" d="M16.338 16.338H13.67V12.16c0-.995-.017-2.277-1.387-2.277-1.39 0-1.601 1.086-1.601 2.207v4.248H8.014v-8.59h2.559v1.174h.037c.356-.675 1.227-1.387 2.526-1.387 2.703 0 3.203 1.778 3.203 4.092v4.711zM5.005 6.575a1.548 1.548 0 11-.003-3.096 1.548 1.548 0 01.003 3.096zm-1.337 9.763H6.34v-8.59H3.667v8.59zM17.668 1H2.328C1.595 1 1 1.581 1 2.298v15.403C1 18.418 1.595 19 2.328 19h15.34c.734 0 1.332-.582 1.332-1.299V2.298C19 1.581 18.402 1 17.668 1z" clip-rule="evenodd"></path>
                            </svg>
                        </a>
                    </li>
                <?php } ?>
            </ul>

        <?php endif ?>
    </div>
</div>