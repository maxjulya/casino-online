<?php
/**
 * Template name: Homepage Template 2
 */

get_header(); ?>

    <section class="popular_casinos wrapper ">
        <h2>Popular Casinos</h2>

        <div class="content_block hide">

            <?php

            $posts_per_page = '12';

            $wp_query = new WP_Query(array(
                'post_type' => 'casino',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'casino-category',
                        'field' => 'slug',
                        'terms' => 'popular-casinos',
                    )
                ),
                'posts_per_page' => $posts_per_page

            ));

            if (have_posts()) : while (have_posts()) : the_post();

                ?>

                <div class="casino_block">

                    <!-- Left -->
                    <div class="casino_block_left">

                        <!-- Image -->
                        <div class="casino_block_image">
                            <a href="<?php the_permalink(); ?>" class="thumbnail">
                                <picture>
                                    <?php echo get_the_post_thumbnail(get_the_ID(), 'casino_list_item'); ?>
                                </picture>
                            </a>
                        </div>
                        <div class="casino_block_rate">
                            <?php if (!empty(get_post_meta(get_the_ID(), 'oc_rating_text', true))) { ?>
                                <?php echo esc_attr(get_post_meta(get_the_ID(), 'oc_rating_text', true)); ?>
                            <?php } ?>
                        </div>

                        <!-- Text -->
                        <div class="casino_block_text">
                            <h3 class="casino_block_title"><?php the_title(); ?></h3>
                            <div class="casino_block_subtitle">
                                <div class="casino_block_subtitle_name">
                                    <?php echo esc_html_e('Welcome bonus:', 'onlinecasino'); ?>
                                </div>
                                <span class="casino_block_subtitle_info casino_block_subtitle_info--strong">
                                    <?php if (!empty(get_post_meta(get_the_ID(), 'oc_welcome_bonus', true))) { ?>
                                        <?php echo esc_attr(get_post_meta(get_the_ID(), 'oc_welcome_bonus', true)); ?>
                                    <?php } ?>
                                </span>
                            </div>
                            <div class="casino_block_subtitle casino_block_subtitle--small">
                                <div class="casino_block_subtitle_name">
                                    <?php echo esc_html_e('Payout Speed:', 'onlinecasino'); ?>
                                </div>
                                <span class="casino_block_subtitle_info">
                                    <?php if (!empty(get_post_meta(get_the_ID(), 'oc_payout_speed', true))) { ?>
                                        <?php echo esc_attr(get_post_meta(get_the_ID(), 'oc_payout_speed', true)); ?>
                                    <?php } ?>
                                </span>
                            </div>
                            <div class="casino_block_subtitle casino_block_subtitle--small">
                                <div class="casino_block_subtitle_name">
                                    <?php echo esc_html_e('Win Rate:', 'onlinecasino'); ?>
                                </div>
                                <span class="casino_block_subtitle_info">
                                    <?php if (!empty(get_post_meta(get_the_ID(), 'oc_winrate_text', true))) { ?>
                                        <?php echo esc_attr(get_post_meta(get_the_ID(), 'oc_winrate_text', true)); ?>
                                    <?php } ?>
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Middle -->
                    <div class="casino_block_mid">
                        <div class="casino_block_mid_left">
                            <ul class="casino_block_list">
                                <?php if (!empty(get_post_meta(get_the_ID(), 'oc_casino_item_pros', true))) { ?>
                                    <li class="casino_block_list_item">
                                        <picture>
                                            <source srcset="<?php echo get_stylesheet_directory_uri() . '/layouts/img/casinos_blocks/icons/plus.svg' ?>"
                                                    type="image/webp">
                                            <img
                                                    src="<?php echo get_stylesheet_directory_uri() . '/layouts/img/casinos_blocks/icons/plus.svg' ?>"
                                                    alt="plus">
                                        </picture>
                                        <?php echo esc_attr(get_post_meta(get_the_ID(), 'oc_casino_item_pros', true)); ?>
                                    </li>
                                <?php } ?>
                                <?php if (!empty(get_post_meta(get_the_ID(), 'oc_casino_item_pros_two', true))) { ?>
                                    <li class="casino_block_list_item">
                                        <picture>
                                            <source srcset="<?php echo get_stylesheet_directory_uri() . '/layouts/img/casinos_blocks/icons/plus.svg' ?>"
                                                    type="image/webp">
                                            <img
                                                    src="<?php echo get_stylesheet_directory_uri() . '/layouts/img/casinos_blocks/icons/plus.svg' ?>"
                                                    alt="plus">
                                        </picture>
                                        <?php echo esc_attr(get_post_meta(get_the_ID(), 'oc_casino_item_pros_two', true)); ?>
                                    </li>
                                <?php } ?>
                            </ul>
                            <ul class="casino_block_list">
                                <?php if (!empty(get_post_meta(get_the_ID(), 'oc_casino_item_cons', true))) { ?>
                                    <li class="casino_block_list_item">
                                        <picture>
                                            <source srcset="<?php echo get_stylesheet_directory_uri() . '/layouts/img/casinos_blocks/icons/cross.svg' ?>"
                                                    type="image/webp">
                                            <img
                                                    src="<?php echo get_stylesheet_directory_uri() . '/layouts/img/casinos_blocks/icons/cross.svg' ?>"
                                                    alt="cross">
                                        </picture>
                                        <?php echo esc_attr(get_post_meta(get_the_ID(), 'oc_casino_item_cons', true)); ?>
                                    </li>
                                <?php } ?>
                                <?php if (!empty(get_post_meta(get_the_ID(), 'oc_casino_item_cons_two', true))) { ?>
                                    <li class="casino_block_list_item">
                                        <picture>
                                            <source srcset="<?php echo get_stylesheet_directory_uri() . '/layouts/img/casinos_blocks/icons/cross.svg' ?>"
                                                    type="image/webp">
                                            <img
                                                    src="<?php echo get_stylesheet_directory_uri() . '/layouts/img/casinos_blocks/icons/cross.svg' ?>"
                                                    alt="cross">
                                        </picture>
                                        <?php echo esc_attr(get_post_meta(get_the_ID(), 'oc_casino_item_cons_two', true)); ?>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                        <div class="casino_block_mid_right">
                            <div class="casino_block_options">
                                <div class="casino_block_options_head">
                                    <div class="casino_block_options_title">
                                        <?php echo esc_html_e('Banking Options:', 'onlinecasino'); ?>
                                    </div>

                                    <a href="#" class="casino_block_options_link">
                                        <?php echo esc_html_e('+11 more', 'onlinecasino'); ?>
                                    </a>
                                </div>

                                <div class="casino_block_options_body">
                                    <div class="casino_block_options_element">
                                        <picture>
                                            <source srcset="<?php echo get_stylesheet_directory_uri() . '/layouts/img/casinos_blocks/payment/mastercard.svg' ?>"
                                                    type="image/webp">
                                            <img src="<?php echo get_stylesheet_directory_uri() . '/layouts/img/casinos_blocks/payment/mastercard.svg' ?>"
                                                 alt="mastercard">
                                        </picture>
                                    </div>
                                    <div class="casino_block_options_element">
                                        <picture>
                                            <source srcset="<?php echo get_stylesheet_directory_uri() . '/layouts/img/casinos_blocks/payment/mir.svg' ?>"
                                                    type="image/webp">
                                            <img
                                                    src="<?php echo get_stylesheet_directory_uri() . '/layouts/img/casinos_blocks/payment/mir.svg' ?>"
                                                    alt="mir">
                                        </picture>
                                    </div>
                                    <div class="casino_block_options_element">
                                        <picture>
                                            <source srcset="<?php echo get_stylesheet_directory_uri() . '/layouts/img/casinos_blocks/payment/Payment_Piastrix.svg' ?>"
                                                    type="image/webp">
                                            <img src="<?php echo get_stylesheet_directory_uri() . '/layouts/img/casinos_blocks/payment/Payment_Piastrix.svg' ?>"
                                                 alt="Payment_Piastrix">
                                        </picture>
                                    </div>
                                    <div class="casino_block_options_element">
                                        <picture>
                                            <source srcset="<?php echo get_stylesheet_directory_uri() . '/layouts/img/casinos_blocks/payment/PayPal.svg' ?>"
                                                    type="image/webp">
                                            <img
                                                    src="<?php echo get_stylesheet_directory_uri() . '/layouts/img/casinos_blocks/payment/PayPal.svg' ?>"
                                                    alt="PayPal">
                                        </picture>
                                    </div>
                                    <div class="casino_block_options_element">
                                        <picture>
                                            <source srcset="<?php echo get_stylesheet_directory_uri() . '/layouts/img/casinos_blocks/payment/Skrill.svg' ?>"
                                                    type="image/webp">
                                            <img
                                                    src="<?php echo get_stylesheet_directory_uri() . '/layouts/img/casinos_blocks/payment/Skrill.svg' ?>"
                                                    alt="Skrill">
                                        </picture>
                                    </div>
                                    <div class="casino_block_options_element">
                                        <picture>
                                            <source srcset="<?php echo get_stylesheet_directory_uri() . '/layouts/img/casinos_blocks/payment/unitstream.svg' ?>"
                                                    type="image/webp">
                                            <img src="<?php echo get_stylesheet_directory_uri() . '/layouts/img/casinos_blocks/payment/unitstream.svg' ?>"
                                                 alt="unitstream">
                                        </picture>
                                    </div>
                                    <div class="casino_block_options_element">
                                        <picture>
                                            <source srcset="<?php echo get_stylesheet_directory_uri() . '/layouts/img/casinos_blocks/payment/visa.svg' ?>"
                                                    type="image/webp">
                                            <img
                                                    src="<?php echo get_stylesheet_directory_uri() . '/layouts/img/casinos_blocks/payment/visa.svg' ?>"
                                                    alt="visa">
                                        </picture>
                                    </div>
                                    <div class="casino_block_options_element">
                                        <picture>
                                            <source srcset="<?php echo get_stylesheet_directory_uri() . '/layouts/img/casinos_blocks/payment/sepa.svg' ?>"
                                                    type="image/webp">
                                            <img
                                                    src="<?php echo get_stylesheet_directory_uri() . '/layouts/img/casinos_blocks/payment/sepa.svg' ?>"
                                                    alt="sepa">
                                        </picture>
                                    </div>
                                </div>
                            </div>
                            <div class="casino_block_options">
                                <div class="casino_block_options_head">
                                    <div class="casino_block_options_title">
                                        <?php echo esc_html_e('Available Providers:', 'onlinecasino'); ?>
                                    </div>

                                    <a href="#" class="casino_block_options_link">
                                        <?php echo esc_html_e('+228 more', 'onlinecasino'); ?>
                                    </a>
                                </div>

                                <div class="casino_block_options_body">
                                    <div class="casino_block_options_element">
                                        <picture>
                                            <source srcset="<?php echo get_stylesheet_directory_uri() . '/layouts/img/casinos_blocks/payment/amatic.svg' ?>"
                                                    type="image/webp">
                                            <img
                                                    src="<?php echo get_stylesheet_directory_uri() . '/layouts/img/casinos_blocks/payment/amatic.svg' ?>"
                                                    alt="amatic">
                                        </picture>
                                    </div>
                                    <div class="casino_block_options_element">
                                        <picture>
                                            <source srcset="<?php echo get_stylesheet_directory_uri() . '/layouts/img/casinos_blocks/payment/betgames.svg' ?>"
                                                    type="image/webp">
                                            <img
                                                    src="<?php echo get_stylesheet_directory_uri() . '/layouts/img/casinos_blocks/payment/betgames.svg' ?>"
                                                    alt="betgames">
                                        </picture>
                                    </div>
                                    <div class="casino_block_options_element">
                                        <picture>
                                            <source srcset="<?php echo get_stylesheet_directory_uri() . '/layouts/img/casinos_blocks/payment/betsoft.svg' ?>"
                                                    type="image/webp">
                                            <img
                                                    src="<?php echo get_stylesheet_directory_uri() . '/layouts/img/casinos_blocks/payment/betsoft.svg' ?>"
                                                    alt="betsoft">
                                        </picture>
                                    </div>
                                    <div class="casino_block_options_element">
                                        <picture>
                                            <source srcset="<?php echo get_stylesheet_directory_uri() . '/layouts/img/casinos_blocks/payment/evoplay.svg' ?>"
                                                    type="image/webp">
                                            <img
                                                    src="<?php echo get_stylesheet_directory_uri() . '/layouts/img/casinos_blocks/payment/evoplay.svg' ?>"
                                                    alt="evoplay">
                                        </picture>
                                    </div>
                                    <div class="casino_block_options_element">
                                        <picture>
                                            <source srcset="<?php echo get_stylesheet_directory_uri() . '/layouts/img/casinos_blocks/payment/quickspin.svg' ?>"
                                                    type="image/webp">
                                            <img
                                                    src="<?php echo get_stylesheet_directory_uri() . '/layouts/img/casinos_blocks/payment/quickspin.svg' ?>"
                                                    alt="quickspin">
                                        </picture>
                                    </div>
                                    <div class="casino_block_options_element">
                                        <picture>
                                            <source srcset="<?php echo get_stylesheet_directory_uri() . '/layouts/img/casinos_blocks/payment/yggdrasil.svg' ?>"
                                                    type="image/webp">
                                            <img
                                                    src="<?php echo get_stylesheet_directory_uri() . '/layouts/img/casinos_blocks/payment/yggdrasil.svg' ?>"
                                                    alt="yggdrasil">
                                        </picture>
                                    </div>
                                    <div class="casino_block_options_element">
                                        <picture>
                                            <source srcset="<?php echo get_stylesheet_directory_uri() . '/layouts/img/casinos_blocks/payment/pragmatic_play.svg' ?>"
                                                    type="image/webp">
                                            <img src="<?php echo get_stylesheet_directory_uri() . '/layouts/img/casinos_blocks/payment/pragmatic_play.svg' ?>"
                                                 alt="pragmatic_play">
                                        </picture>
                                    </div>
                                    <div class="casino_block_options_element">
                                        <picture>
                                            <source srcset="<?php echo get_stylesheet_directory_uri() . '/layouts/img/casinos_blocks/payment/endorphina.svg' ?>"
                                                    type="image/webp">
                                            <img src="<?php echo get_stylesheet_directory_uri() . '/layouts/img/casinos_blocks/payment/endorphina.svg' ?>"
                                                 alt="endorphina">
                                        </picture>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Right -->
                    <div class="casino_block_right">
                        <div class="casino_block_languages">
                            <div class="casino_block_lang">
                                <picture>
                                    <source srcset="<?php echo get_stylesheet_directory_uri() . '/layouts/img/casinos_blocks/icons/ukr.svg' ?>"
                                            type="image/webp">
                                    <img
                                            src="<?php echo get_stylesheet_directory_uri() . '/layouts/img/casinos_blocks/icons/ukr.svg' ?>"
                                            alt="ukr">
                                </picture>
                            </div>
                            <div class="casino_block_lang">
                                <picture>
                                    <source srcset="<?php echo get_stylesheet_directory_uri() . '/layouts/img/casinos_blocks/icons/usa.svg' ?>"
                                            type="image/webp">
                                    <img
                                            src="<?php echo get_stylesheet_directory_uri() . '/layouts/img/casinos_blocks/icons/usa.svg' ?>"
                                            alt="usa">
                                </picture>
                            </div>
                            <div class="casino_block_lang">
                                <picture>
                                    <source srcset="<?php echo get_stylesheet_directory_uri() . '/layouts/img/casinos_blocks/icons/rus.svg' ?>"
                                            type="image/webp">
                                    <img
                                            src="<?php echo get_stylesheet_directory_uri() . '/layouts/img/casinos_blocks/icons/rus.svg' ?>"
                                            alt="rus">
                                </picture>
                            </div>
                        </div>
                        <a href="<?php the_permalink(); ?>" class="casino_block_button button_popular  button--reverse">
                            <?php echo esc_html_e('Read Review', 'onlinecasino'); ?>
                        </a>
                        <a href="#" class="casino_block_button button_popular">
                            <?php echo esc_html_e('Play Now!', 'onlinecasino'); ?>
                        </a>
                    </div>

                </div>

            <?php endwhile; endif;
            wp_reset_query(); ?>

        </div>


        <div class="button read_review">
            <?php $page_id = 241 ?>
            <a href="<?php echo get_page_link($page_id); ?>">  <?php echo esc_html_e('EXPLORE ALL CASINOS', 'onlinecasino'); ?></a>
        </div>

    </section>

    <section class="home_best_game slider">
        <h2 class="title wrapper">Best Games of the Week</h2>
        <div class="best_casino_slider">
            <?php

            $posts_per_page = '12';

            $wp_query = new WP_Query(array(
                'post_type' => 'game',
                'posts_per_page' => $posts_per_page
            ));

            if (have_posts()) : while (have_posts()) : the_post();

                ?>
                    <div class="best_slider_item"
                         style="background-image: url(<?php echo  get_the_post_thumbnail_url(get_the_ID(), 'game_img_big'); ?>)">

                        <div class="content_box">
                            <div class="title"><?php the_title(); ?></div>
                            <div class="content_description">
                                <p>
                                    <?php
                                    $content = get_the_content();
                                    $trimmed_content = wp_trim_words($content, 20, '<a href="' . get_permalink() . '"> ...Read More</a>');
                                    echo $trimmed_content;
                                    ?>
                                </p>
                            </div>
                            <div class="check_casinos button read_review">
                                <a href="#">Check Available Casinos </a>

                            </div>
                        </div>
                    </div>
            <?php endwhile; endif;
            wp_reset_query(); ?>
        </div>

    </section>

    <section class="partners wrapper">

        <?php
        $terms = get_terms(
            array(
                'taxonomy' => 'software',
                'hide_empty' => true,
                'hierarchical' => false,
                'orderby' => 'name',
                'order' => 'ASC',
            )
        );
        $casino_software = get_the_terms($post->ID, 'software');

        ?>
        <?php foreach ($terms as $term) {

            ?>


            <div class="partners_item_wrap">
                <div class="partners_item">
                    <?php
                    $software_logo = get_term_meta($term->term_id, 'taxonomy-image-id', true);
                    if ($software_logo) { ?>
                        <?php echo wp_get_attachment_image($software_logo, 'partners_img', "", array("class" => "space-software-logo")); ?>
                    <?php } ?>

                </div>
            </div>

        <?php } ?>


    </section>

    <section class="home_mobile_casinos wrapper">

        <h2 class="box_titile">Mobile Casinos</h2>


        <div class="item_list">

            <?php

            $posts_per_page = '6';

            $wp_query = new WP_Query(array(
                'post_type' => 'casino',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'casino-category',
                        'field' => 'slug',
                        'terms' => 'mobile-casinos',
                    )
                ),
                'posts_per_page' => $posts_per_page

            ));

            if (have_posts()) : while (have_posts()) : the_post();

                ?>

                <div class="item_main_wrap">
                    <div class="item_casino">
                        <div class="item_casino_wrap">
                            <div class="item_casino_thumb_wrap">
                                <a href="<?php the_permalink(); ?>" class="thumbnail">
                                    <?php echo get_the_post_thumbnail(get_the_ID(), 'casino_list_thumb'); ?>
                                </a>
                            </div>
                            <div class="item_rating">
                                <span><?php if (!empty(get_post_meta(get_the_ID(), 'oc_rating_text', true))) {
                                        ?><?php echo esc_attr(get_post_meta(get_the_ID(), 'oc_rating_text', true)); ?><?php } ?>
                                </span>
                            </div>
                            <h3><?php the_title(); ?></h3>
                            <div class="item_content_wrap">
                                <div class="info_box">
                                    <span>
                                        <?php if (!empty(get_post_meta(get_the_ID(), 'oc_casino_wager', true))) {
                                            echo esc_html_e('Wager ', 'onlinecasino'); ?><?php echo esc_attr(get_post_meta(get_the_ID(), 'oc_casino_wager', true)); ?>

                                        <?php } ?>
                                    </span>
                                    <span><?php if (!empty(get_post_meta(get_the_ID(), 'oc_welcome_bonus', true))) {
                                            ?><?php echo esc_attr(get_post_meta(get_the_ID(), 'oc_welcome_bonus', true)); ?>
                                            <?php echo esc_html_e('Welcome bonus', 'onlinecasino'); ?><?php } ?>
                                    </span>
                                </div>
                                <div class="item_payment">
                                    <picture>
                                        <source srcset="<?php echo get_stylesheet_directory_uri() . '/layouts/img/items/payment_green.svg' ?>"
                                                type="image/webp">
                                        <img
                                                src="<?php echo get_stylesheet_directory_uri() . '/layouts/img/items/payment_green.svg' ?>"
                                                alt="plus">
                                    </picture>
                                </div>
                                <div class="button read_review">
                                    <a href="<?php the_permalink(); ?>">CLAIM $1200 BONUS</a>
                                </div>
                                <div class="info_box read_review">
                                    <a href="<?php the_permalink(); ?>">Read Review</a>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            <?php endwhile; endif;
            wp_reset_query(); ?>


        </div>

    </section>

    <section class="home_casino_news">
        <div class="casino_top_line">
            <h2 class="box_titile">Online Casino News</h2>
        </div>
        <div class="home_casino_content">
            <div class="home_casino_box">
                <?php
                $posts_per_page = '1';
                $casino = new WP_Query(array('post_type' => 'post', 'posts_per_page' => $posts_per_page));
                $i = '0';
                ?>
                <?php if ($casino->have_posts()) : while ($casino->have_posts()) :
                $casino->the_post();
                $i++; ?>
                <a href="<?php the_permalink(); ?>" class="thumbnail">
                    <?php echo get_the_post_thumbnail(get_the_ID(), 'casino_item_home_big'); ?>
                </a>
                <div class="info_top">
                    <a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>
                    <div class="article_page_time">
                        <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <path d="M7.00008 1.16663C3.78358 1.16663 1.16675 3.78346 1.16675 6.99996C1.16675 10.2165 3.78358 12.8333 7.00008 12.8333C10.2166 12.8333 12.8334 10.2165 12.8334 6.99996C12.8334 3.78346 10.2166 1.16663 7.00008 1.16663ZM7.00008 11.6666C4.427 11.6666 2.33341 9.57304 2.33341 6.99996C2.33341 4.42688 4.427 2.33329 7.00008 2.33329C9.57316 2.33329 11.6667 4.42688 11.6667 6.99996C11.6667 9.57304 9.57316 11.6666 7.00008 11.6666Z"
                                  fill="black"/>
                            <path d="M7.58341 4.08337H6.41675V7.24154L8.33766 9.16246L9.1625 8.33762L7.58341 6.75854V4.08337Z"
                                  fill="black"/>
                        </svg>
                        <span><?php echo human_time_diff(get_the_time('U'), current_time('timestamp')) . ' назад'; ?></span>
                    </div>
                </div>
                <div class="info">

                    <p><?php $content = get_the_content();
                        $trimmed_content = wp_trim_words($content, 40, '<a href="' . get_permalink() . '"> ...Read More</a>');
                        echo $trimmed_content; ?></p>
                </div>

            </div>
            <?php endwhile;
            endif;
            wp_reset_query(); ?>

            <div class="home_item_box">
                <a href="<?php echo get_permalink(get_option('page_for_posts')); ?>">View All Posts</a>

                <?php
                $posts_per_page = '3';
                $casino = new WP_Query(array('post_type' => 'post', 'offset' => 1, 'posts_per_page' => $posts_per_page));
                $i = '0';
                ?>
                <?php if ($casino->have_posts()) : while ($casino->have_posts()) : $casino->the_post();
                    $i++; ?>
                    <div class="home_casino_item">
                        <div class="info">
                            <h3><?php the_title(); ?></h3>
                            <p>                    <?php $content = get_the_content();
                                $trimmed_content = wp_trim_words($content, 15, '<a href="' . get_permalink() . '"> ...Read More</a>');
                                echo $trimmed_content; ?></p>
                        </div>
                        <a href="<?php the_permalink(); ?>" class="thumbnail">
                            <?php echo get_the_post_thumbnail(get_the_ID(), 'casino_item_home'); ?>

                        </a>
                    </div>
                <?php endwhile; endif;
                wp_reset_query(); ?>

            </div>
        </div>


    </section>

    <section class="recommended_bonuses wrapper">
        <h2>Top recommended bonuses</h2>
        <div class="bonuses_list_first">

            <?php
            $posts_per_page = '10';

            $wp_query = new WP_Query(array(
                'post_type' => 'bonus',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'bonus-category',
                        'field' => 'slug',
                        'terms' => 'recommended-bonuses',
                    )
                ),
                'posts_per_page' => $posts_per_page

            ));

            if (have_posts()) : while (have_posts()) : the_post();

                ?>

                <a href="#" class="bonus_card">
                    <div class="bonus_card_image">
                        <picture>
                            <?php if (!empty(get_the_post_thumbnail(get_the_ID(), 'casino_item_single', true))) { ?>

                                <?php echo get_the_post_thumbnail(get_the_ID(), 'casino_item_single'); ?>
                            <?php } ?>

                            <?php if (empty(get_the_post_thumbnail(get_the_ID(), 'casino_item_single', true))) { ?>
                                <img class="spare_bonus_img"
                                     src="<?php echo get_stylesheet_directory_uri() . '/layouts/img/bonuses_cards/logos/bonuses_white.jpg' ?>"
                                     style="width: 300px; height:112px;" alt="bonus image">
                            <?php } ?>
                        </picture>
                        <div class="rating">
                            <?php if (!empty(get_post_meta(get_the_ID(), 'oc_bonus_rating_text', true))) { ?>
                                <?php echo esc_attr(get_post_meta(get_the_ID(), 'oc_bonus_rating_text', true)); ?>
                            <?php } else { ?>
                                8.2
                            <?php } ?>
                        </div>
                    </div>
                    <div class="bonus_card_text">
                        <div class="bonus_card_title">
                            <?php the_title(); ?>
                        </div>
                        <div class="bonus_card_additional">

                            <?php if (!empty(get_post_meta(get_the_ID(), 'oc_bonus_wager', true))) { ?>
                                <div class="bonus_card_info">
                                    <div class="bonus_card_info_head">
                                        <?php esc_html_e('Wager: ', 'onlinecasino'); ?>
                                    </div>
                                    <div class="bonus_card_info_body">
                                        <?php echo get_post_meta($post->ID, 'oc_bonus_wager', true); ?>
                                    </div>
                                </div>
                            <?php } ?>

                            <?php if (!empty(get_post_meta(get_the_ID(), 'oc_free_spins', true))) { ?>
                                <div class="bonus_card_info">
                                    <div class="bonus_card_info_head">
                                        <?php echo esc_html_e('FreeSpins: ', 'onlinecasino'); ?>
                                    </div>
                                    <div class="bonus_card_info_body">
                                        <?php echo esc_attr(get_post_meta(get_the_ID(), 'oc_free_spins', true)); ?>
                                    </div>
                                </div>
                            <?php } ?>

                            <?php if (!empty(get_post_meta(get_the_ID(), 'oc_bonus_amount', true))) { ?>
                                <div class="bonus_card_info">
                                    <div class="bonus_card_info_head">
                                        <?php echo esc_html_e('Amount: ', 'onlinecasino'); ?>
                                    </div>
                                    <div class="bonus_card_info_body">
                                        <?php echo esc_attr(get_post_meta(get_the_ID(), 'oc_bonus_amount', true)); ?>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </a>

            <?php endwhile; endif;
            wp_reset_query(); ?>

        </div>

    </section>

    <section class="home_content_bottom wrapper">
        <?php if (get_the_content() !== "") { ?>
            <div class="content_block_second hide">
                <?php the_content(); ?>
            </div>
            <a class="content_toggle_second" href="#">Read More</a>
        <?php } ?>
    </section>

<?php get_footer();
