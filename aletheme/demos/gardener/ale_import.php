<?php


/**
 * Categories and Custom Taxonomies
 */

//Categories for Posts
$preview_post_cat_1_id = ale_demo_category::add_category(array(
    'category_name' => 'For Gardeners',
    'parent_id' => 0,
    'description' => '',
));
$preview_post_cat_2_id = ale_demo_category::add_category(array(
    'category_name' => 'Gardening',
    'parent_id' => 0,
    'description' => '',
));
$preview_post_cat_3_id = ale_demo_category::add_category(array(
    'category_name' => 'News',
    'parent_id' => 0,
    'description' => '',
));
$preview_post_cat_4_id = ale_demo_category::add_category(array(
    'category_name' => 'Specials',
    'parent_id' => 0,
    'description' => '',
));


//Categories for Projects Shop
$preview_projects_cat_1_id = ale_demo_category::add_term(array(
    'term_name' => 'For Event',
    'taxonomy'=>'projects-category',
    'parent_id' => 0,
    'description' => '',
));
$preview_projects_cat_2_id = ale_demo_category::add_term(array(
    'term_name' => 'For Home',
    'taxonomy'=>'projects-category',
    'parent_id' => 0,
    'description' => '',
));
$preview_projects_cat_3_id = ale_demo_category::add_term(array(
    'term_name' => 'Gardener Suply',
    'taxonomy'=>'projects-category',
    'parent_id' => 0,
    'description' => '',
));
$preview_projects_cat_4_id = ale_demo_category::add_term(array(
    'term_name' => 'Industrial',
    'taxonomy'=>'projects-category',
    'parent_id' => 0,
    'description' => '',
));
$preview_projects_cat_5_id = ale_demo_category::add_term(array(
    'term_name' => 'Other',
    'taxonomy'=>'projects-category',
    'parent_id' => 0,
    'description' => '',
));



/**
 * Posts Settings
 */

// Blog posts
ale_demo_content::add_post(array(
    'title' => "Proin porta, odio at sagittis vehicula",
    'file' => get_template_directory() . '/aletheme/demos/gardener/data/post_default.dat',
    'post_excerpt' => '',
    'categories_id_array' => array($preview_post_cat_1_id),
    'featured_image_ale_id' => 'ale_img1',
    'post_type' => 'post',
    'ale_post_sub_title' => 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some ',
    'ale_post_to_slider' => '',
    'ale_main_image' => '',
    'ale_background_image' => '',
));

ale_demo_content::add_post(array(
    'title' => "Lorem ipsum dolor sit amet, consectetur",
    'file' => get_template_directory() . '/aletheme/demos/gardener/data/post_default.dat',
    'post_excerpt' => '',
    'categories_id_array' => array($preview_post_cat_2_id),
    'featured_image_ale_id' => 'ale_img2',
    'post_type' => 'post',
    'ale_post_sub_title' => 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some ',
    'ale_post_to_slider' => '',
    'ale_main_image' => '',
    'ale_background_image' => '',
));
ale_demo_content::add_post(array(
    'title' => "Mauris eu lectus nec ex elementum tincidun",
    'file' => get_template_directory() . '/aletheme/demos/gardener/data/post_default.dat',
    'post_excerpt' => '',
    'categories_id_array' => array($preview_post_cat_3_id),
    'featured_image_ale_id' => '',
    'post_type' => 'post',
    'ale_post_sub_title' => 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some ',
    'ale_post_to_slider' => 'on',
    'ale_main_image' => 'ale_homeslide1',
    'ale_background_image' => 'ale_homeslider1_bg',
));
ale_demo_content::add_post(array(
    'title' => "Mauris eu lectus nec ex elementum tincidun",
    'file' => get_template_directory() . '/aletheme/demos/gardener/data/post_default.dat',
    'post_excerpt' => '',
    'categories_id_array' => array($preview_post_cat_4_id),
    'featured_image_ale_id' => 'ale_img3',
    'post_type' => 'post',
    'ale_post_sub_title' => 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some ',
    'ale_post_to_slider' => 'on',
    'ale_main_image' => 'ale_homeslide2',
    'ale_background_image' => 'ale_homeslider2_bg',
));
ale_demo_content::add_post(array(
    'title' => "Donec augue sem, elementum ac neque et",
    'file' => get_template_directory() . '/aletheme/demos/gardener/data/post_default.dat',
    'post_excerpt' => '',
    'categories_id_array' => array($preview_post_cat_1_id),
    'featured_image_ale_id' => '',
    'post_type' => 'post',
    'ale_post_sub_title' => 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some ',
    'ale_post_to_slider' => '',
    'ale_main_image' => '',
    'ale_background_image' => '',
));
ale_demo_content::add_post(array(
    'title' => "Nullam et est ac metus vulputate tristique ",
    'file' => get_template_directory() . '/aletheme/demos/gardener/data/post_default.dat',
    'post_excerpt' => '',
    'categories_id_array' => array($preview_post_cat_2_id),
    'featured_image_ale_id' => 'ale_img4',
    'post_type' => 'post',
    'ale_post_sub_title' => 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some ',
    'ale_post_to_slider' => '',
    'ale_main_image' => '',
    'ale_background_image' => '',
));
ale_demo_content::add_post(array(
    'title' => "Praesent hendrerit auctor urna, in finibus",
    'file' => get_template_directory() . '/aletheme/demos/gardener/data/post_default.dat',
    'post_excerpt' => '',
    'categories_id_array' => array($preview_post_cat_3_id),
    'featured_image_ale_id' => '',
    'post_type' => 'post',
    'ale_post_sub_title' => 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some ',
    'ale_post_to_slider' => '',
    'ale_main_image' => '',
    'ale_background_image' => '',
));
ale_demo_content::add_post(array(
    'title' => "Nunc faucibus, arcu sed viverra mollis",
    'file' => get_template_directory() . '/aletheme/demos/gardener/data/post_default.dat',
    'post_excerpt' => '',
    'categories_id_array' => array($preview_post_cat_4_id),
    'featured_image_ale_id' => '',
    'post_type' => 'post',
    'ale_post_sub_title' => 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some ',
    'ale_post_to_slider' => '',
    'ale_main_image' => '',
    'ale_background_image' => '',
));
ale_demo_content::add_post(array(
    'title' => "Morbi facilisis orci sit amet lectus",
    'file' => get_template_directory() . '/aletheme/demos/gardener/data/post_default.dat',
    'post_excerpt' => '',
    'categories_id_array' => array($preview_post_cat_1_id),
    'featured_image_ale_id' => '',
    'post_type' => 'post',
    'ale_post_sub_title' => 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some ',
    'ale_post_to_slider' => '',
    'ale_main_image' => '',
    'ale_background_image' => '',
));
ale_demo_content::add_post(array(
    'title' => "Praesent hendrerit auctor urna, in finibus",
    'file' => get_template_directory() . '/aletheme/demos/gardener/data/post_default.dat',
    'post_excerpt' => '',
    'categories_id_array' => array($preview_post_cat_1_id),
    'featured_image_ale_id' => '',
    'post_type' => 'post',
    'ale_post_sub_title' => 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some ',
    'ale_post_to_slider' => '',
    'ale_main_image' => '',
    'ale_background_image' => '',
));
ale_demo_content::add_post(array(
    'title' => "Lorem ipsum dolor sit amet, consectetur",
    'file' => get_template_directory() . '/aletheme/demos/gardener/data/post_default.dat',
    'post_excerpt' => '',
    'categories_id_array' => array($preview_post_cat_2_id),
    'featured_image_ale_id' => 'ale_img2',
    'post_type' => 'post',
    'ale_post_sub_title' => 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some ',
    'ale_post_to_slider' => '',
    'ale_main_image' => '',
    'ale_background_image' => '',
));


/*
 * Projects Posts
 * */
ale_demo_content::add_post(array(
    'title' => "Morbi facilisis orci sit amet lectus",
    'file' => get_template_directory() . '/aletheme/demos/gardener/data/post_default.dat',
    'post_excerpt' => '',
    'taxonomy_id_array' => array($preview_projects_cat_1_id),
    'featured_image_ale_id' => 'ale_project1',
    'post_type' => 'projects',
    'ale_project_subtitle' => 'Our best projects',
    'ale_project_company' => 'Alethemes',
    'ale_project_date' => 'June 15, 2017',
));
ale_demo_content::add_post(array(
    'title' => "Aliquam et magna ut massa dignissim lacinia",
    'file' => get_template_directory() . '/aletheme/demos/gardener/data/post_default.dat',
    'post_excerpt' => '',
    'taxonomy_id_array' => array($preview_projects_cat_2_id),
    'featured_image_ale_id' => 'ale_project2',
    'post_type' => 'projects',
    'ale_project_subtitle' => 'Our best projects',
    'ale_project_company' => 'Alethemes',
    'ale_project_date' => 'June 15, 2017',
));
ale_demo_content::add_post(array(
    'title' => "Morbi facilisis orci sit amet lectus",
    'file' => get_template_directory() . '/aletheme/demos/gardener/data/post_default.dat',
    'post_excerpt' => '',
    'taxonomy_id_array' => array($preview_projects_cat_3_id),
    'featured_image_ale_id' => 'ale_project3',
    'post_type' => 'projects',
    'ale_project_subtitle' => 'Our best projects',
    'ale_project_company' => 'Alethemes',
    'ale_project_date' => 'June 15, 2017',
));
ale_demo_content::add_post(array(
    'title' => "Ut ornare ac ligula in fermentum",
    'file' => get_template_directory() . '/aletheme/demos/gardener/data/post_default.dat',
    'post_excerpt' => '',
    'taxonomy_id_array' => array($preview_projects_cat_4_id),
    'featured_image_ale_id' => 'ale_project4',
    'post_type' => 'projects',
    'ale_project_subtitle' => 'Our best projects',
    'ale_project_company' => 'Alethemes',
    'ale_project_date' => 'June 15, 2017',
));
ale_demo_content::add_post(array(
    'title' => "Phasellus sed sapien lobortis, pretium dolor",
    'file' => get_template_directory() . '/aletheme/demos/gardener/data/post_default.dat',
    'post_excerpt' => '',
    'taxonomy_id_array' => array($preview_projects_cat_5_id),
    'featured_image_ale_id' => 'ale_project5',
    'post_type' => 'projects',
    'ale_project_subtitle' => 'Our best projects',
    'ale_project_company' => 'Alethemes',
    'ale_project_date' => 'June 15, 2017',
));
ale_demo_content::add_post(array(
    'title' => "Phasellus ornare magna blandit commodo",
    'file' => get_template_directory() . '/aletheme/demos/gardener/data/post_default.dat',
    'post_excerpt' => '',
    'taxonomy_id_array' => array($preview_projects_cat_1_id),
    'featured_image_ale_id' => 'ale_project6',
    'post_type' => 'projects',
    'ale_project_subtitle' => 'Our best projects',
    'ale_project_company' => 'Alethemes',
    'ale_project_date' => 'June 15, 2017',
));
ale_demo_content::add_post(array(
    'title' => "Vestibulum maximus nibh vitae ex",
    'file' => get_template_directory() . '/aletheme/demos/gardener/data/post_default.dat',
    'post_excerpt' => '',
    'taxonomy_id_array' => array($preview_projects_cat_2_id),
    'featured_image_ale_id' => 'ale_project7',
    'post_type' => 'projects',
    'ale_project_subtitle' => 'Our best projects',
    'ale_project_company' => 'Alethemes',
    'ale_project_date' => 'June 15, 2017',
));
ale_demo_content::add_post(array(
    'title' => "Sed diam odio, sagittis a metus sed",
    'file' => get_template_directory() . '/aletheme/demos/gardener/data/post_default.dat',
    'post_excerpt' => '',
    'taxonomy_id_array' => array($preview_projects_cat_3_id),
    'featured_image_ale_id' => 'ale_project8',
    'post_type' => 'projects',
    'ale_project_subtitle' => 'Our best projects',
    'ale_project_company' => 'Alethemes',
    'ale_project_date' => 'June 15, 2017',
));
ale_demo_content::add_post(array(
    'title' => "Nulla ultrices augue ac est auctor fermentum",
    'file' => get_template_directory() . '/aletheme/demos/gardener/data/post_default.dat',
    'post_excerpt' => '',
    'taxonomy_id_array' => array($preview_projects_cat_4_id),
    'featured_image_ale_id' => 'ale_project9',
    'post_type' => 'projects',
    'ale_project_subtitle' => 'Our best projects',
    'ale_project_company' => 'Alethemes',
    'ale_project_date' => 'June 15, 2017',
));
ale_demo_content::add_post(array(
    'title' => "Nullam blandit varius porttitor",
    'file' => get_template_directory() . '/aletheme/demos/gardener/data/post_default.dat',
    'post_excerpt' => '',
    'taxonomy_id_array' => array($preview_projects_cat_5_id),
    'featured_image_ale_id' => 'ale_project10',
    'post_type' => 'projects',
    'ale_project_subtitle' => 'Our best projects',
    'ale_project_company' => 'Alethemes',
    'ale_project_date' => 'June 15, 2017',
));
ale_demo_content::add_post(array(
    'title' => "Mauris eu dolor sit amet orci dapibus",
    'file' => get_template_directory() . '/aletheme/demos/gardener/data/post_default.dat',
    'post_excerpt' => '',
    'taxonomy_id_array' => array($preview_projects_cat_1_id),
    'featured_image_ale_id' => 'ale_project11',
    'post_type' => 'projects',
    'ale_project_subtitle' => 'Our best projects',
    'ale_project_company' => 'Alethemes',
    'ale_project_date' => 'June 15, 2017',
));
ale_demo_content::add_post(array(
    'title' => "Fusce quis ante non sem molestie mattis",
    'file' => get_template_directory() . '/aletheme/demos/gardener/data/post_default.dat',
    'post_excerpt' => '',
    'taxonomy_id_array' => array($preview_projects_cat_2_id),
    'featured_image_ale_id' => 'ale_project12',
    'post_type' => 'projects',
    'ale_project_subtitle' => 'Our best projects',
    'ale_project_company' => 'Alethemes',
    'ale_project_date' => 'June 15, 2017',
));
ale_demo_content::add_post(array(
    'title' => "Vivamus condimentum ac elit nec vestibulum",
    'file' => get_template_directory() . '/aletheme/demos/gardener/data/post_default.dat',
    'post_excerpt' => '',
    'taxonomy_id_array' => array($preview_projects_cat_3_id),
    'featured_image_ale_id' => 'ale_project13',
    'post_type' => 'projects',
    'ale_project_subtitle' => 'Our best projects',
    'ale_project_company' => 'Alethemes',
    'ale_project_date' => 'June 15, 2017',
));


/*
 * Gardeners Posts
 * */
ale_demo_content::add_post(array(
    'title' => "Brayden Blackfield",
    'file' => get_template_directory() . '/aletheme/demos/gardener/data/gardener.dat',
    'post_excerpt' => '',
    'featured_image_ale_id' => 'ale_g1',
    'post_type' => 'gardeners',
    'ale_gardener_post' => 'Project Leader',
    'ale_gardener_title' => 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form',
    'ale_gardener_staff' => '',
    'ale_gardener_fb' => 'http://facebook.com/alethemes',
    'ale_gardener_twi' => 'http://twitter.com/alethemes',
    'ale_gardener_email' => 'support@gardener-theme.com',
));
ale_demo_content::add_post(array(
    'title' => "Stella Nilson",
    'file' => get_template_directory() . '/aletheme/demos/gardener/data/gardener.dat',
    'post_excerpt' => '',
    'featured_image_ale_id' => 'ale_g2',
    'post_type' => 'gardeners',
    'ale_gardener_post' => 'Gardener',
    'ale_gardener_title' => 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form',
    'ale_gardener_staff' => '',
    'ale_gardener_fb' => 'http://facebook.com/alethemes',
    'ale_gardener_twi' => 'http://twitter.com/alethemes',
    'ale_gardener_email' => 'support@gardener-theme.com',
));
ale_demo_content::add_post(array(
    'title' => "Alex Socha",
    'file' => get_template_directory() . '/aletheme/demos/gardener/data/gardener.dat',
    'post_excerpt' => '',
    'featured_image_ale_id' => 'ale_g3',
    'post_type' => 'gardeners',
    'ale_gardener_post' => 'CEO',

    'ale_gardener_title' => 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form',
    'ale_gardener_staff' => 'on',
    'ale_gardener_fb' => 'http://facebook.com/alethemes',
    'ale_gardener_twi' => 'http://twitter.com/alethemes',
    'ale_gardener_email' => 'support@gardener-theme.com',
));
ale_demo_content::add_post(array(
    'title' => "Cristian Tour",
    'file' => get_template_directory() . '/aletheme/demos/gardener/data/gardener.dat',
    'post_excerpt' => '',
    'featured_image_ale_id' => 'ale_g4',
    'post_type' => 'gardeners',
    'ale_gardener_post' => 'Manager',
    'ale_gardener_title' => 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form',
    'ale_gardener_staff' => '',
    'ale_gardener_fb' => 'http://facebook.com/alethemes',
    'ale_gardener_twi' => 'http://twitter.com/alethemes',
    'ale_gardener_email' => 'support@gardener-theme.com',
));
ale_demo_content::add_post(array(
    'title' => "Collis Davis",
    'file' => get_template_directory() . '/aletheme/demos/gardener/data/gardener.dat',
    'post_excerpt' => '',
    'featured_image_ale_id' => 'ale_g5',
    'post_type' => 'gardeners',
    'ale_gardener_post' => 'Worker',
    'ale_gardener_title' => 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form',
    'ale_gardener_staff' => '',
    'ale_gardener_fb' => 'http://facebook.com/alethemes',
    'ale_gardener_twi' => 'http://twitter.com/alethemes',
    'ale_gardener_email' => 'support@gardener-theme.com',
));
ale_demo_content::add_post(array(
    'title' => "Tim Billy",
    'file' => get_template_directory() . '/aletheme/demos/gardener/data/gardener.dat',
    'post_excerpt' => '',
    'featured_image_ale_id' => 'ale_g6',
    'post_type' => 'gardeners',
    'ale_gardener_post' => 'Driver',
    'ale_gardener_title' => 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form',
    'ale_gardener_staff' => '',
    'ale_gardener_fb' => 'http://facebook.com/alethemes',
    'ale_gardener_twi' => 'http://twitter.com/alethemes',
    'ale_gardener_email' => 'support@gardener-theme.com',
));



/*
 * Services Posts
 * */
ale_demo_content::add_post(array(
    'title' => "For Home",
    'file' => get_template_directory() . '/aletheme/demos/gardener/data/gardener.dat',
    'post_excerpt' => '',
    'featured_image_ale_id' => 'ale_s1',
    'post_type' => 'services',

    'ale_service_icon' => 'ale_icon1',
    'ale_service_icon_hover' => 'ale_icon1_hover',
    'ale_service_bigicon' => 'ale_bigicon1',
    'ale_service_bigicon_hover' => 'ale_bigicon1_hover',
    'ale_service_description_image' => 'ale_description_1',
    'ale_service_subtitle' => 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form',
    'ale_service_link_one' => '#',
    'ale_service_label_one' => 'See project',
    'ale_service_link_two' => '#',
    'ale_service_label_two' => 'Read testimonials',
    'ale_service_link_three' => '#',
    'ale_service_label_three' => 'More about gardener`s suply',
    'ale_service_price' => '600',
    'ale_service_currency' => '$',
    'ale_service_price_type' => '',
));

ale_demo_content::add_post(array(
    'title' => "For Event",
    'file' => get_template_directory() . '/aletheme/demos/gardener/data/gardener.dat',
    'post_excerpt' => '',
    'featured_image_ale_id' => 'ale_s2',
    'post_type' => 'services',

    'ale_service_icon' => 'ale_icon2',
    'ale_service_icon_hover' => 'ale_icon2_hover',
    'ale_service_bigicon' => 'ale_bigicon2',
    'ale_service_bigicon_hover' => 'ale_bigicon2_hover',
    'ale_service_description_image' => 'ale_description_1',
    'ale_service_subtitle' => 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form',
    'ale_service_link_one' => '#',
    'ale_service_label_one' => 'See project',
    'ale_service_link_two' => '#',
    'ale_service_label_two' => 'Read testimonials',
    'ale_service_link_three' => '#',
    'ale_service_label_three' => 'More about Event',
    'ale_service_price' => '200',
    'ale_service_currency' => '$',
    'ale_service_price_type' => '',
));
ale_demo_content::add_post(array(
    'title' => "Industrial",
    'file' => get_template_directory() . '/aletheme/demos/gardener/data/gardener.dat',
    'post_excerpt' => '',
    'featured_image_ale_id' => 'ale_s3',
    'post_type' => 'services',

    'ale_service_icon' => 'ale_icon3',
    'ale_service_icon_hover' => 'ale_icon3_hover',
    'ale_service_bigicon' => 'ale_bigicon3',
    'ale_service_bigicon_hover' => 'ale_bigicon3_hover',
    'ale_service_description_image' => 'ale_description_1',
    'ale_service_subtitle' => 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form',
    'ale_service_link_one' => '#',
    'ale_service_label_one' => 'See project',
    'ale_service_link_two' => '#',
    'ale_service_label_two' => 'Read testimonials',
    'ale_service_link_three' => '#',
    'ale_service_label_three' => 'More about Industrial',
    'ale_service_price' => '400',
    'ale_service_currency' => '$',
    'ale_service_price_type' => '',
));
ale_demo_content::add_post(array(
    'title' => "Gardener`s suply",
    'file' => get_template_directory() . '/aletheme/demos/gardener/data/gardener.dat',
    'post_excerpt' => '',
    'featured_image_ale_id' => 'ale_s4',
    'post_type' => 'services',

    'ale_service_icon' => 'ale_icon4',
    'ale_service_icon_hover' => 'ale_icon4_hover',
    'ale_service_bigicon' => 'ale_bigicon4',
    'ale_service_bigicon_hover' => 'ale_bigicon4_hover',
    'ale_service_description_image' => 'ale_description_1',
    'ale_service_subtitle' => 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form',
    'ale_service_link_one' => '#',
    'ale_service_label_one' => 'See project',
    'ale_service_link_two' => '#',
    'ale_service_label_two' => 'Read testimonials',
    'ale_service_link_three' => '#',
    'ale_service_label_three' => 'More about Gardener`s suply',
    'ale_service_price' => '300',
    'ale_service_currency' => '$',
    'ale_service_price_type' => '',
));
ale_demo_content::add_post(array(
    'title' => "Indoor gardening",
    'file' => get_template_directory() . '/aletheme/demos/gardener/data/gardener.dat',
    'post_excerpt' => '',
    'featured_image_ale_id' => 'ale_s5',
    'post_type' => 'services',

    'ale_service_icon' => 'ale_icon5',
    'ale_service_icon_hover' => 'ale_icon5_hover',
    'ale_service_bigicon' => 'ale_bigicon5',
    'ale_service_bigicon_hover' => 'ale_bigicon5_hover',
    'ale_service_description_image' => 'ale_description_1',
    'ale_service_subtitle' => 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form',
    'ale_service_link_one' => '#',
    'ale_service_label_one' => 'See project',
    'ale_service_link_two' => '#',
    'ale_service_label_two' => 'Read testimonials',
    'ale_service_link_three' => '#',
    'ale_service_label_three' => 'More about Indoor',
    'ale_service_price' => '240',
    'ale_service_currency' => '$',
    'ale_service_price_type' => '',
));
ale_demo_content::add_post(array(
    'title' => "Other",
    'file' => get_template_directory() . '/aletheme/demos/gardener/data/gardener.dat',
    'post_excerpt' => '',
    'featured_image_ale_id' => 'ale_s6',
    'post_type' => 'services',

    'ale_service_icon' => 'ale_icon6',
    'ale_service_icon_hover' => 'ale_icon6_hover',
    'ale_service_bigicon' => 'ale_bigicon6',
    'ale_service_bigicon_hover' => 'ale_bigicon6_hover',
    'ale_service_description_image' => 'ale_description_1',
    'ale_service_subtitle' => 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form',
    'ale_service_link_one' => '#',
    'ale_service_label_one' => 'See project',
    'ale_service_link_two' => '#',
    'ale_service_label_two' => 'Read testimonials',
    'ale_service_link_three' => '#',
    'ale_service_label_three' => 'More about Other',
    'ale_service_price' => '140',
    'ale_service_currency' => '$',
    'ale_service_price_type' => '',
));



/*
 * Partners Posts
 * */
ale_demo_content::add_post(array(
    'title' => "Envato",
    'file' => get_template_directory() . '/aletheme/demos/gardener/data/gardener.dat',
    'post_excerpt' => '',
    'featured_image_ale_id' => '',
    'post_type' => 'partners',

    'ale_partner_subtitle' => 'Busines Partner',
    'ale_partner_site' => 'envato.com',
    'ale_partner_link' => '#',
));
ale_demo_content::add_post(array(
    'title' => "Alethemes",
    'file' => get_template_directory() . '/aletheme/demos/gardener/data/gardener.dat',
    'post_excerpt' => '',
    'featured_image_ale_id' => '',
    'post_type' => 'partners',

    'ale_partner_subtitle' => 'Creative Partner',
    'ale_partner_site' => 'alethemes.com',
    'ale_partner_link' => '#',
));
ale_demo_content::add_post(array(
    'title' => "CodeCanyon",
    'file' => get_template_directory() . '/aletheme/demos/gardener/data/gardener.dat',
    'post_excerpt' => '',
    'featured_image_ale_id' => '',
    'post_type' => 'partners',

    'ale_partner_subtitle' => 'Creative Partner',
    'ale_partner_site' => 'codecanyon.com',
    'ale_partner_link' => '#',
));
ale_demo_content::add_post(array(
    'title' => "AudioJungle",
    'file' => get_template_directory() . '/aletheme/demos/gardener/data/gardener.dat',
    'post_excerpt' => '',
    'featured_image_ale_id' => '',
    'post_type' => 'partners',

    'ale_partner_subtitle' => 'Music Partner',
    'ale_partner_site' => 'audiojungle.com',
    'ale_partner_link' => '#',
));
ale_demo_content::add_post(array(
    'title' => "VideoHive",
    'file' => get_template_directory() . '/aletheme/demos/gardener/data/gardener.dat',
    'post_excerpt' => '',
    'featured_image_ale_id' => '',
    'post_type' => 'partners',

    'ale_partner_subtitle' => 'Video Partner',
    'ale_partner_site' => 'videohive.com',
    'ale_partner_link' => '#',
));

/*
 * Testimonials Posts
 * */
ale_demo_content::add_post(array(
    'title' => "Brayden Black",
    'file' => get_template_directory() . '/aletheme/demos/gardener/data/gardener.dat',
    'post_excerpt' => '',
    'featured_image_ale_id' => 'ale_t1',
    'post_type' => 'testimonials',
    'ale_testy_position' => 'Businessman',
    'ale_testy_subtitle' => 'There are many variations of passages of Lorem Ipsum available, but the majority have ',
    'ale_testy_rating' => '5',
));
ale_demo_content::add_post(array(
    'title' => "Elen Marlen",
    'file' => get_template_directory() . '/aletheme/demos/gardener/data/gardener.dat',
    'post_excerpt' => '',
    'featured_image_ale_id' => 'ale_t2',
    'post_type' => 'testimonials',
    'ale_testy_position' => 'Business Woman',
    'ale_testy_subtitle' => 'There are many variations of passages of Lorem Ipsum available, but the majority have ',
    'ale_testy_rating' => '5',
));
ale_demo_content::add_post(array(
    'title' => "Ales Socha",
    'file' => get_template_directory() . '/aletheme/demos/gardener/data/gardener.dat',
    'post_excerpt' => '',
    'featured_image_ale_id' => 'ale_t3',
    'post_type' => 'testimonials',
    'ale_testy_position' => 'Businessman',
    'ale_testy_subtitle' => 'There are many variations of passages of Lorem Ipsum available, but the majority have ',
    'ale_testy_rating' => '5',
));


/**
 * Pages
 */

//Blog page
$ale_blog_id = ale_demo_content::add_page(array(
    'title' => 'Blog',
    'template' => 'index.php',
    'postspage'=>true,
));

//Contact page
$ale_contact_id = ale_demo_content::add_page(array(
    'title' => 'Contact',
    'file' => get_template_directory() . '/aletheme/demos/gardener/data/contact.dat',
    'template' => 'template-contact.php',
    'ale_phono_label' => 'Phone',
    'ale_phone_number' => '8 800 346 10 79',
    'ale_email_label' => 'Email',
    'ale_your_email' => 'info@website.com',
    'ale_address_label' => 'Address',
    'ale_your_address' => '<strong>Brazil</strong> Centrale',
    'ale_contact_title' => 'Contact form',
    'ale_contact_description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
));

//About Us page
$ale_about_id = ale_demo_content::add_page(array(
    'title' => 'About Us',
    'file' => get_template_directory() . '/aletheme/demos/gardener/data/about.dat',
    'template' => 'template-about.php',

    'ale_additional_info' => 'enable',
    'ale_skills_info' => 'enable',
    'ale_video_info' => 'enable',
    'ale_partners_title' => 'Our partners',
    'ale_author_subtitle' => 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form',
    'ale_author_photo' => 'ale_about_author',
    'ale_author_name' => 'Brayden Blackfield',
    'ale_author_position' => 'Director / CEO',
    'ale_info_title' => 'Lorem Ipsum is simply dummy text',
    'ale_info_photo_one' => 'ale_about_info1',
    'ale_info_photo_two' => 'ale_about_info2',
    'ale_info_description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release',
    'ale_info_icon_1' => 'ale_about_icon1',
    'ale_skills_title_1' => 'Innovations',
    'ale_skills_description_1' => 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable',
    'ale_info_icon_2' => 'ale_about_icon2',
    'ale_skills_title_2' => 'Experience',
    'ale_skills_description_2' => 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock',
    'ale_info_icon_3' => 'ale_about_icon3',
    'ale_skills_title_3' => 'Technologies',
    'ale_skills_description_3' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make',
    'ale_video_photo' => 'ale_about_video',
    'ale_video_link' => 'https://youtu.be/aG1jA95Nm-0',
    'ale_video_title' => 'Want to be our <br/><strong>partner?</strong>',
    'ale_video_description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make',
));


//About Us page
$ale_order_id = ale_demo_content::add_page(array(
    'title' => 'Order',
    'file' => get_template_directory() . '/aletheme/demos/gardener/data/contact.dat',
    'template' => 'template-order.php',
));



//Home page
$ale_homepage_id = ale_demo_content::add_page(array(
    'title' => 'Home',
    'homepage' => true,
    'template' => 'template-homepage.php',
    'file' => get_template_directory() . '/aletheme/demos/gardener/data/home.dat',

    'ale_order_form' => 'enable',
    'ale_services_box' => 'enable',
    'ale_partners_box' => 'enable',
    'ale_testimonials_box' => 'enable',
    'ale_portfolio_box' => 'enable',
    'ale_order_box_title' => 'Order gardener',
    'ale_gardeners_title' => 'Gardeners',
    'ale_order_box_gardener_subtitle' => 'Our best specialists',
    'ale_l_projects_title' => 'Latest projects',
    'ale_l_projects_link_title' => 'All projects',
    'ale_partners_title' => 'Our partners',
    'ale_partners_bg' => 'ale_home_partners',

));

/**
 * Navigation Settings
 */
$ale_demo_header_menu = ale_demo_menus::create_menu('Header Menu', 'header_menu');


//Header Menu
ale_demo_menus::add_page(array(
    'title' => 'Home',
    'add_to_menu_id' => $ale_demo_header_menu,
    'page_id' => $ale_homepage_id,
    'parent_id' => ''
));
ale_demo_menus::add_post_type(array(
    'title' => 'Services',
    'add_to_menu_id' => $ale_demo_header_menu,
    'post_type' => 'services',
    'parent_id' => ''
));
ale_demo_menus::add_page(array(
    'title' => 'Order',
    'add_to_menu_id' => $ale_demo_header_menu,
    'page_id' => $ale_order_id,
    'parent_id' => ''
));
ale_demo_menus::add_page(array(
    'title' => 'About Us',
    'add_to_menu_id' => $ale_demo_header_menu,
    'page_id' => $ale_about_id,
    'parent_id' => ''
));
ale_demo_menus::add_post_type(array(
    'title' => 'Team',
    'add_to_menu_id' => $ale_demo_header_menu,
    'post_type' => 'gardeners',
    'parent_id' => ''
));
ale_demo_menus::add_page(array(
    'title' => 'Blog',
    'add_to_menu_id' => $ale_demo_header_menu,
    'page_id' => $ale_blog_id,
    'parent_id' =>  ''
));
ale_demo_menus::add_post_type(array(
    'title' => 'Gallery',
    'add_to_menu_id' => $ale_demo_header_menu,
    'post_type' => 'projects',
    'parent_id' => ''
));
ale_demo_menus::add_page(array(
    'title' => 'Contact',
    'add_to_menu_id' => $ale_demo_header_menu,
    'page_id' => $ale_contact_id,
    'parent_id' => ''
));


//WP Options Settings
ale_demo_options::update_tagline('Gardeners Theme');
ale_demo_options::update_posts_per_page(10);
