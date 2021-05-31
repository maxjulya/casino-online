<?php
/**
 * Template name: Casino Slots Template
 */

get_header(); ?>

    <section class="home_content_bottom wrapper">
        <?php if (get_the_content() !== "") { ?>
            <div class="content_block_second hide">
                <?php the_content(); ?>
            </div>
            <a class="content_toggle_second" href="#">Подробнее</a>
        <?php } ?>
    </section>


    <main class="casino_list_content wrapper">
        <article class="casino_list_main_content">
            <section class="popular_casinos  ">
                <h2>Casinos List</h2>

                <div class="content_block hide">

                    <?php
                    $posts_per_page = '8';

                    $casino = new WP_Query(array('post_type' => 'casino', 'posts_per_page' => $posts_per_page));
                    $i = '0';
                    ?>

                    <?php if ($casino->have_posts()) : while ($casino->have_posts()) : $casino->the_post();
                        $i++;
                        ?>

                        <div class="casino_block">

                            <!-- Left -->
                            <div class="casino_block_left">

                                <!-- Image -->
                                <div class="casino_block_image">
                                    <picture>
                                        <source srcset="<?php echo get_stylesheet_directory_uri() . '/layouts/img/casinos_blocks/logo/logo.webp' ?> type="
                                                image
                                        /webp"><img
                                                src="<?php echo get_stylesheet_directory_uri() . '/layouts/img/casinos_blocks/logo/logo.png' ?>"
                                                alt="casino-logo">
                                    </picture>
                                    <div class="casino_block_rate">
                                        <span><?php if (!empty(get_post_meta(get_the_ID(), 'oc_rating_text', true))) {
                                                ?><?php echo esc_attr(get_post_meta(get_the_ID(), 'oc_rating_text', true)); ?><?php } ?>
                                        </span>
                                    </div>

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
                                        <?php if (!empty(get_post_meta(get_the_ID(), 'oc_casino_item_pros_three', true))) { ?>
                                            <li class="casino_block_list_item">
                                                <picture>
                                                    <source srcset="<?php echo get_stylesheet_directory_uri() . '/layouts/img/casinos_blocks/icons/plus.svg' ?>"
                                                            type="image/webp">
                                                    <img
                                                            src="<?php echo get_stylesheet_directory_uri() . '/layouts/img/casinos_blocks/icons/plus.svg' ?>"
                                                            alt="plus">
                                                </picture>

                                                <?php echo esc_attr(get_post_meta(get_the_ID(), 'oc_casino_item_pros_three', true)); ?>
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
                                        <?php if (!empty(get_post_meta(get_the_ID(), 'oc_casino_item_cons_three', true))) { ?>
                                            <li class="casino_block_list_item">
                                                <picture>
                                                    <source srcset="<?php echo get_stylesheet_directory_uri() . '/layouts/img/casinos_blocks/icons/cross.svg' ?>"
                                                            type="image/webp">
                                                    <img
                                                            src="<?php echo get_stylesheet_directory_uri() . '/layouts/img/casinos_blocks/icons/cross.svg' ?>"
                                                            alt="cross">
                                                </picture>
                                                <?php echo esc_attr(get_post_meta(get_the_ID(), 'oc_casino_item_cons_three', true)); ?>
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
                                <button class="casino_block_button button_popular  button--reverse">
                                    <?php echo esc_html_e('Read Review', 'onlinecasino'); ?>
                                </button>
                                <a href="#" class="casino_block_button button_popular">
                                    <?php echo esc_html_e('Play Now!', 'onlinecasino'); ?>
                                </a>
                            </div>

                        </div>

                    <?php endwhile; endif;
                    wp_reset_query(); ?>

                </div>
                </div>

                <div class="content_toggle button read_review">
                    <a class="content_toggle " href="#">LOAD MORE CASINOS</a>
                </div>

            </section>
        </article>
        <aside class="casino_sidebar casino_list_slider">
            <h3 class="casino_sidebar_title">Features Filter</h3>
            <div class="casino_sidebar_block" data-spoilers data-one-to-show="no">

                <div class="casino_sidebar_spoiler">
                    <div class="casino_sidebar_button text spoilerButton">
                        <div class="casino_sidebar_button_head">
                            <div class="casino_sidebar_button_photo">
                                <picture>
                                    <source srcset="<?php echo get_stylesheet_directory_uri() . '/layouts/img/casino_sidebar/photo.svg' ?>"
                                            type="image/webp">
                                    <img src="<?php echo get_stylesheet_directory_uri() . '/layouts/img/casino_sidebar/photo.svg' ?>"
                                         alt=""></picture>
                            </div>
                            <div class="casino_sidebar_button_text">
                                <h4 class="casino_sidebar_button_heading">
                                    Casinos from player from
                                </h4>
                                <ul class="casino_sidebar_button_list">
                                    <li class="casino_sidebar_button_list_item">
                                        Ukraine,
                                    </li>
                                    <li class="casino_sidebar_button_list_item">
                                        Russia,
                                    </li>
                                    <li class="casino_sidebar_button_list_item">
                                        Georgia,
                                    </li>
                                    <li class="casino_sidebar_button_list_item">
                                        Romania
                                    </li>
                                    <li class="casino_sidebar_button_list_item">
                                        La..
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <svg width="12" height="8" viewBox="0 0 12 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M1.5 0.25L6 4.75L10.5 0.25L12 1.75L6 7.75L0 1.75L1.5 0.25Z" fill="black"/>
                        </svg>
                    </div>
                    <div class="casino_sidebar_hidden">
                        <div class="casino_sidebar_answer">
                            <p>
                                Lorem ipsum dolor sit
                            </p>
                        </div>
                    </div>
                </div>

                <div class="casino_sidebar_spoiler">
                    <div class="casino_sidebar_button text spoilerButton">
                        <div class="casino_sidebar_button_head">
                            <div class="casino_sidebar_button_photo">
                                <picture>
                                    <source srcset="<?php echo get_stylesheet_directory_uri() . '/layouts/img/casino_sidebar/photo.svg' ?>"
                                            type="image/webp">
                                    <img src="<?php echo get_stylesheet_directory_uri() . '/layouts/img/casino_sidebar/photo.svg' ?>"
                                         alt=""></picture>
                            </div>
                            <div class="casino_sidebar_button_text">
                                <h4 class="casino_sidebar_button_heading">
                                    Casinos from player from
                                </h4>
                                <ul class="casino_sidebar_button_list">
                                    <li class="casino_sidebar_button_list_item">
                                        Ukraine,
                                    </li>
                                    <li class="casino_sidebar_button_list_item">
                                        Russia,
                                    </li>
                                    <li class="casino_sidebar_button_list_item">
                                        Georgia,
                                    </li>
                                    <li class="casino_sidebar_button_list_item">
                                        Romania
                                    </li>
                                    <li class="casino_sidebar_button_list_item">
                                        La..
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <svg width="12" height="8" viewBox="0 0 12 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M1.5 0.25L6 4.75L10.5 0.25L12 1.75L6 7.75L0 1.75L1.5 0.25Z" fill="black"/>
                        </svg>
                    </div>
                    <div class="casino_sidebar_hidden">
                        <div class="casino_sidebar_answer">
                            <p>
                                Lorem ipsum dolor sit
                            </p>
                        </div>
                    </div>
                </div>

                <div class="casino_sidebar_spoiler">
                    <div class="casino_sidebar_button text spoilerButton">
                        <div class="casino_sidebar_button_head">
                            <div class="casino_sidebar_button_photo">
                                <picture>
                                    <source srcset="<?php echo get_stylesheet_directory_uri() . '/layouts/img/casino_sidebar/photo.svg' ?>"
                                            type="image/webp">
                                    <img src="<?php echo get_stylesheet_directory_uri() . '/layouts/img/casino_sidebar/photo.svg' ?>"
                                         alt=""></picture>
                            </div>
                            <div class="casino_sidebar_button_text">
                                <h4 class="casino_sidebar_button_heading">
                                    Casinos from player from
                                </h4>
                                <ul class="casino_sidebar_button_list">
                                    <li class="casino_sidebar_button_list_item">
                                        Ukraine,
                                    </li>
                                    <li class="casino_sidebar_button_list_item">
                                        Russia,
                                    </li>
                                    <li class="casino_sidebar_button_list_item">
                                        Georgia,
                                    </li>
                                    <li class="casino_sidebar_button_list_item">
                                        Romania
                                    </li>
                                    <li class="casino_sidebar_button_list_item">
                                        La..
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <svg width="12" height="8" viewBox="0 0 12 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M1.5 0.25L6 4.75L10.5 0.25L12 1.75L6 7.75L0 1.75L1.5 0.25Z" fill="black"/>
                        </svg>
                    </div>
                    <div class="casino_sidebar_hidden">
                        <div class="casino_sidebar_answer">
                            <p>
                                Lorem ipsum dolor sit
                            </p>
                        </div>
                    </div>
                </div>

                <div class="casino_sidebar_spoiler">
                    <div class="casino_sidebar_button text spoilerButton">
                        <div class="casino_sidebar_button_head">
                            <div class="casino_sidebar_button_photo">
                                <picture>
                                    <source srcset="<?php echo get_stylesheet_directory_uri() . '/layouts/img/casino_sidebar/photo.svg' ?>"
                                            type="image/webp">
                                    <img src="<?php echo get_stylesheet_directory_uri() . '/layouts/img/casino_sidebar/photo.svg' ?>"
                                         alt=""></picture>
                            </div>
                            <div class="casino_sidebar_button_text">
                                <h4 class="casino_sidebar_button_heading">
                                    Casinos from player from
                                </h4>
                                <ul class="casino_sidebar_button_list">
                                    <li class="casino_sidebar_button_list_item">
                                        Ukraine,
                                    </li>
                                    <li class="casino_sidebar_button_list_item">
                                        Russia,
                                    </li>
                                    <li class="casino_sidebar_button_list_item">
                                        Georgia,
                                    </li>
                                    <li class="casino_sidebar_button_list_item">
                                        Romania
                                    </li>
                                    <li class="casino_sidebar_button_list_item">
                                        La..
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <svg width="12" height="8" viewBox="0 0 12 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M1.5 0.25L6 4.75L10.5 0.25L12 1.75L6 7.75L0 1.75L1.5 0.25Z" fill="black"/>
                        </svg>
                    </div>
                    <div class="casino_sidebar_hidden">
                        <div class="casino_sidebar_answer">
                            <p>
                                Lorem ipsum dolor sit
                            </p>
                        </div>
                    </div>
                </div>

                <div class="casino_sidebar_spoiler">
                    <div class="casino_sidebar_button text spoilerButton">
                        <div class="casino_sidebar_button_head">
                            <div class="casino_sidebar_button_photo">
                                <picture>
                                    <source srcset="<?php echo get_stylesheet_directory_uri() . '/layouts/img/casino_sidebar/photo.svg' ?>"
                                            type="image/webp">
                                    <img src="<?php echo get_stylesheet_directory_uri() . '/layouts/img/casino_sidebar/photo.svg' ?>"
                                         alt=""></picture>
                            </div>
                            <div class="casino_sidebar_button_text">
                                <h4 class="casino_sidebar_button_heading">
                                    Casinos from player from
                                </h4>
                                <ul class="casino_sidebar_button_list">
                                    <li class="casino_sidebar_button_list_item">
                                        Ukraine,
                                    </li>
                                    <li class="casino_sidebar_button_list_item">
                                        Russia,
                                    </li>
                                    <li class="casino_sidebar_button_list_item">
                                        Georgia,
                                    </li>
                                    <li class="casino_sidebar_button_list_item">
                                        Romania
                                    </li>
                                    <li class="casino_sidebar_button_list_item">
                                        La..
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <svg width="12" height="8" viewBox="0 0 12 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M1.5 0.25L6 4.75L10.5 0.25L12 1.75L6 7.75L0 1.75L1.5 0.25Z" fill="black"/>
                        </svg>
                    </div>
                    <div class="casino_sidebar_hidden">
                        <div class="casino_sidebar_answer">
                            <p>
                                Lorem ipsum dolor sit
                            </p>
                        </div>
                    </div>
                </div>

                <div class="casino_sidebar_spoiler">
                    <div class="casino_sidebar_button text spoilerButton">
                        <div class="casino_sidebar_button_head">
                            <div class="casino_sidebar_button_photo">
                                <picture>
                                    <source srcset="<?php echo get_stylesheet_directory_uri() . '/layouts/img/casino_sidebar/photo.svg' ?>"
                                            type="image/webp">
                                    <img src="<?php echo get_stylesheet_directory_uri() . '/layouts/img/casino_sidebar/photo.svg' ?>"
                                         alt=""></picture>
                            </div>
                            <div class="casino_sidebar_button_text">
                                <h4 class="casino_sidebar_button_heading">
                                    Casinos from player from
                                </h4>
                                <ul class="casino_sidebar_button_list">
                                    <li class="casino_sidebar_button_list_item">
                                        Ukraine,
                                    </li>
                                    <li class="casino_sidebar_button_list_item">
                                        Russia,
                                    </li>
                                    <li class="casino_sidebar_button_list_item">
                                        Georgia,
                                    </li>
                                    <li class="casino_sidebar_button_list_item">
                                        Romania
                                    </li>
                                    <li class="casino_sidebar_button_list_item">
                                        La..
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <svg width="12" height="8" viewBox="0 0 12 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M1.5 0.25L6 4.75L10.5 0.25L12 1.75L6 7.75L0 1.75L1.5 0.25Z" fill="black"/>
                        </svg>
                    </div>
                    <div class="casino_sidebar_hidden">
                        <div class="casino_sidebar_answer">
                            <p>
                                Lorem ipsum dolor sit
                            </p>
                        </div>
                    </div>
                </div>

                <div class="casino_sidebar_spoiler">
                    <div class="casino_sidebar_button text spoilerButton">
                        <div class="casino_sidebar_button_head">
                            <div class="casino_sidebar_button_photo">
                                <picture>
                                    <source srcset="<?php echo get_stylesheet_directory_uri() . '/layouts/img/casino_sidebar/photo.svg' ?>"
                                            type="image/webp">
                                    <img src="<?php echo get_stylesheet_directory_uri() . '/layouts/img/casino_sidebar/photo.svg' ?>"
                                         alt=""></picture>
                            </div>
                            <div class="casino_sidebar_button_text">
                                <h4 class="casino_sidebar_button_heading">
                                    Casinos from player from
                                </h4>
                                <ul class="casino_sidebar_button_list">
                                    <li class="casino_sidebar_button_list_item">
                                        Ukraine,
                                    </li>
                                    <li class="casino_sidebar_button_list_item">
                                        Russia,
                                    </li>
                                    <li class="casino_sidebar_button_list_item">
                                        Georgia,
                                    </li>
                                    <li class="casino_sidebar_button_list_item">
                                        Romania
                                    </li>
                                    <li class="casino_sidebar_button_list_item">
                                        La..
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <svg width="12" height="8" viewBox="0 0 12 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M1.5 0.25L6 4.75L10.5 0.25L12 1.75L6 7.75L0 1.75L1.5 0.25Z" fill="black"/>
                        </svg>
                    </div>
                    <div class="casino_sidebar_hidden">
                        <div class="casino_sidebar_answer">
                            <p>
                                Lorem ipsum dolor sit
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </aside>
    </main>

    <section class="home_content_bottom wrapper">
        <?php if (get_the_content() !== "") { ?>
            <div class="content_block_second hide">
                <?php the_content(); ?>
            </div>
            <a class="content_toggle_second" href="#">Подробнее</a>
        <?php } ?>
    </section>

    <section class="upcomming_casinos home_mobile_casinos wrapper">

        <h2 class="box_titile">Upcoming Casinos</h2>

        <?php
        $posts_per_page = '6';

        $casino = new WP_Query(array('post_type' => 'casino', 'posts_per_page' => $posts_per_page));
        $i = '0';
        ?>

        <div class="item_list">

            <?php if ($casino->have_posts()) : while ($casino->have_posts()) : $casino->the_post();
                $i++;
                ?>
                <div class="item_main_wrap">
                    <div class="item_casino">
                        <div class="item_casino_wrap">
                            <div class="item_casino_thumb_wrap">
                                <a href="<?php the_permalink(); ?>" class="thumbnail">
                                    <?php if (!empty(get_the_post_thumbnail(get_the_ID(), 'casino_list_thumb', true))) { ?>

                                        <?php echo get_the_post_thumbnail(get_the_ID(), 'casino_list_thumb'); ?>
                                    <?php } ?>

                                    <?php if (empty(get_the_post_thumbnail(get_the_ID(), 'casino_list_thumb', true))) { ?>
                                        <img class="spare_img"
                                             src="<?php echo get_stylesheet_directory_uri() . '/layouts/img/white_img.jpg' ?>"
                                             style="width: 300px; height:150px;" alt="">
                                    <?php } ?>
                                </a>
                            </div>
                            <div class="item_rating"><span><?php if (!empty(get_post_meta(get_the_ID(), 'oc_rating_text', true))) { ?><?php echo esc_attr(get_post_meta(get_the_ID(), 'oc_rating_text', true)); ?><?php } else { ?>
                                        8.1
                                    <?php } ?></span></div>
                            <h3><?php the_title(); ?></h3>
                            <div class="item_content_wrap">
                                <div class="info_box">
                                    <span>
                                        <?php if (!empty(get_post_meta(get_the_ID(), 'oc_casino_wager', true))) {
                                            echo esc_html_e('Wager ', 'onlinecasino'); ?><?php echo get_post_meta($post->ID, 'oc_casino_wager', true); ?><?php } ?>
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

    <section class="home_content_bottom wrapper">
        <?php if (get_the_content() !== "") { ?>
            <div class="content_block_second hide">
                <?php the_content(); ?>
            </div>
            <a class="content_toggle_second" href="#">Подробнее</a>
        <?php } ?>
    </section>

    <section class="faq_and_bonuses wrapper">

        <!-- FAQ -->
        <section class="faq_and_bonuses_section">
            <h2 class="faq_and_bonuses_title">Frequently Asked Questions</h2>
            <div class="faq_and_bonuses_block" data-spoilers data-one-to-show="yes">

                <div class="faq_and_bonuses_spoiler _opened">
                    <button type="button" class="faq_and_bonuses_button text spoilerButton">
                        If you are not quite sure where to start, popular slots are a good way to go?

                        <svg class="faq_and_bonuses_button_sign" width="8" height="6" viewBox="0 0 8 6" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <path
                                    d="M4.41734 5.36751C4.21972 5.66701 3.78028 5.66701 3.58266 5.36751L1.04751 1.52537C0.828165 1.19294 1.06658 0.75 1.46485 0.75L6.53515 0.75C6.93343 0.75 7.17184 1.19294 6.95249 1.52537L4.41734 5.36751Z"
                                    fill="#C4C4C4"/>
                        </svg>
                    </button>
                    <div class="faq_and_bonuses_hidden">
                        <div class="faq_and_bonuses_answer text">
                            <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse excepturi mollitia natus
                                ipsum
                                saepe labore ipsa culpa a ab illum, officia nihil assumenda repellendus temporibus fuga
                                explicabo et quas vero. Et alias eaque corrupti temporibus commodi ullam ducimus, culpa,
                                voluptas labore laboriosam error nam quam expedita itaque dolorum mollitia quos quod
                                quae,
                                similique molestiae ab? Est omnis deserunt nulla?
                            </p>
                        </div>
                    </div>
                </div>

                <div class="faq_and_bonuses_spoiler">
                    <button type="button" class="faq_and_bonuses_button text spoilerButton">
                        At Winota Casino, the hottest games at the moment are Book of Dead, Monopoly Live?

                        <svg class="faq_and_bonuses_button_sign" width="8" height="6" viewBox="0 0 8 6" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <path
                                    d="M4.41734 5.36751C4.21972 5.66701 3.78028 5.66701 3.58266 5.36751L1.04751 1.52537C0.828165 1.19294 1.06658 0.75 1.46485 0.75L6.53515 0.75C6.93343 0.75 7.17184 1.19294 6.95249 1.52537L4.41734 5.36751Z"
                                    fill="#C4C4C4"/>
                        </svg>
                    </button>
                    <div class="faq_and_bonuses_hidden">
                        <div class="faq_and_bonuses_answer text">
                            <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse excepturi mollitia natus
                                ipsum
                                saepe labore ipsa culpa a ab illum, officia nihil assumenda repellendus temporibus fuga
                                explicabo et quas vero. Et alias eaque corrupti temporibus commodi ullam ducimus, culpa,
                                voluptas labore laboriosam error nam quam expedita itaque dolorum mollitia quos quod
                                quae,
                                similique molestiae ab? Est omnis deserunt nulla?
                            </p>
                        </div>
                    </div>
                </div>

                <div class="faq_and_bonuses_spoiler">
                    <button type="button" class="faq_and_bonuses_button text spoilerButton">
                        These Interac Casinos like Winota are giving the possibility?

                        <svg class="faq_and_bonuses_button_sign" width="8" height="6" viewBox="0 0 8 6" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <path
                                    d="M4.41734 5.36751C4.21972 5.66701 3.78028 5.66701 3.58266 5.36751L1.04751 1.52537C0.828165 1.19294 1.06658 0.75 1.46485 0.75L6.53515 0.75C6.93343 0.75 7.17184 1.19294 6.95249 1.52537L4.41734 5.36751Z"
                                    fill="#C4C4C4"/>
                        </svg>
                    </button>
                    <div class="faq_and_bonuses_hidden">
                        <div class="faq_and_bonuses_answer text">
                            <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse excepturi mollitia natus
                                ipsum
                                saepe labore ipsa culpa a ab illum, officia nihil assumenda repellendus temporibus fuga
                                explicabo et quas vero. Et alias eaque corrupti temporibus commodi ullam ducimus, culpa,
                                voluptas labore laboriosam error nam quam expedita itaque dolorum mollitia quos quod
                                quae,
                                similique molestiae ab? Est omnis deserunt nulla?
                            </p>
                        </div>
                    </div>
                </div>

                <div class="faq_and_bonuses_spoiler">
                    <button type="button" class="faq_and_bonuses_button text spoilerButton">
                        When there are hundreds of Megaways games out there?

                        <svg class="faq_and_bonuses_button_sign" width="8" height="6" viewBox="0 0 8 6" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <path
                                    d="M4.41734 5.36751C4.21972 5.66701 3.78028 5.66701 3.58266 5.36751L1.04751 1.52537C0.828165 1.19294 1.06658 0.75 1.46485 0.75L6.53515 0.75C6.93343 0.75 7.17184 1.19294 6.95249 1.52537L4.41734 5.36751Z"
                                    fill="#C4C4C4"/>
                        </svg>
                    </button>
                    <div class="faq_and_bonuses_hidden">
                        <div class="faq_and_bonuses_answer text">
                            <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse excepturi mollitia natus
                                ipsum
                                saepe labore ipsa culpa a ab illum, officia nihil assumenda repellendus temporibus fuga
                                explicabo et quas vero. Et alias eaque corrupti temporibus commodi ullam ducimus, culpa,
                                voluptas labore laboriosam error nam quam expedita itaque dolorum mollitia quos quod
                                quae,
                                similique molestiae ab? Est omnis deserunt nulla?
                            </p>
                        </div>
                    </div>
                </div>

                <div class="faq_and_bonuses_spoiler">
                    <button type="button" class="faq_and_bonuses_button text spoilerButton">
                        You can surely find a suitable payment method for your needs at Winota?

                        <svg class="faq_and_bonuses_button_sign" width="8" height="6" viewBox="0 0 8 6" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <path
                                    d="M4.41734 5.36751C4.21972 5.66701 3.78028 5.66701 3.58266 5.36751L1.04751 1.52537C0.828165 1.19294 1.06658 0.75 1.46485 0.75L6.53515 0.75C6.93343 0.75 7.17184 1.19294 6.95249 1.52537L4.41734 5.36751Z"
                                    fill="#C4C4C4"/>
                        </svg>
                    </button>
                    <div class="faq_and_bonuses_hidden">
                        <div class="faq_and_bonuses_answer text">
                            <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse excepturi mollitia natus
                                ipsum
                                saepe labore ipsa culpa a ab illum, officia nihil assumenda repellendus temporibus fuga
                                explicabo et quas vero. Et alias eaque corrupti temporibus commodi ullam ducimus, culpa,
                                voluptas labore laboriosam error nam quam expedita itaque dolorum mollitia quos quod
                                quae,
                                similique molestiae ab? Est omnis deserunt nulla?
                            </p>
                        </div>
                    </div>
                </div>

                <div class="faq_and_bonuses_spoiler">
                    <button type="button" class="faq_and_bonuses_button text spoilerButton">
                        These include e-wallets like Neteller, Skrill and ecoPayz but also fast online banking payments?

                        <svg class="faq_and_bonuses_button_sign" width="8" height="6" viewBox="0 0 8 6" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <path
                                    d="M4.41734 5.36751C4.21972 5.66701 3.78028 5.66701 3.58266 5.36751L1.04751 1.52537C0.828165 1.19294 1.06658 0.75 1.46485 0.75L6.53515 0.75C6.93343 0.75 7.17184 1.19294 6.95249 1.52537L4.41734 5.36751Z"
                                    fill="#C4C4C4"/>
                        </svg>
                    </button>
                    <div class="faq_and_bonuses_hidden">
                        <div class="faq_and_bonuses_answer text">
                            <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse excepturi mollitia natus
                                ipsum
                                saepe labore ipsa culpa a ab illum, officia nihil assumenda repellendus temporibus fuga
                                explicabo et quas vero. Et alias eaque corrupti temporibus commodi ullam ducimus, culpa,
                                voluptas labore laboriosam error nam quam expedita itaque dolorum mollitia quos quod
                                quae,
                                similique molestiae ab? Est omnis deserunt nulla?
                            </p>
                        </div>
                    </div>
                </div>

                <div class="faq_and_bonuses_spoiler">
                    <button type="button" class="faq_and_bonuses_button text spoilerButton">
                        The Curse of the Werewolf Megaways and Temple Tumble Megaways?

                        <svg class="faq_and_bonuses_button_sign" width="8" height="6" viewBox="0 0 8 6" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <path
                                    d="M4.41734 5.36751C4.21972 5.66701 3.78028 5.66701 3.58266 5.36751L1.04751 1.52537C0.828165 1.19294 1.06658 0.75 1.46485 0.75L6.53515 0.75C6.93343 0.75 7.17184 1.19294 6.95249 1.52537L4.41734 5.36751Z"
                                    fill="#C4C4C4"/>
                        </svg>
                    </button>
                    <div class="faq_and_bonuses_hidden">
                        <div class="faq_and_bonuses_answer text">
                            <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse excepturi mollitia natus
                                ipsum
                                saepe labore ipsa culpa a ab illum, officia nihil assumenda repellendus temporibus fuga
                                explicabo et quas vero. Et alias eaque corrupti temporibus commodi ullam ducimus, culpa,
                                voluptas labore laboriosam error nam quam expedita itaque dolorum mollitia quos quod
                                quae,
                                similique molestiae ab? Est omnis deserunt nulla?
                            </p>
                        </div>
                    </div>
                </div>

                <div class="faq_and_bonuses_spoiler">
                    <button type="button" class="faq_and_bonuses_button text spoilerButton">
                        The Curse of the Werewolf Megaways and Temple Tumble Megaways?

                        <svg class="faq_and_bonuses_button_sign" width="8" height="6" viewBox="0 0 8 6" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <path
                                    d="M4.41734 5.36751C4.21972 5.66701 3.78028 5.66701 3.58266 5.36751L1.04751 1.52537C0.828165 1.19294 1.06658 0.75 1.46485 0.75L6.53515 0.75C6.93343 0.75 7.17184 1.19294 6.95249 1.52537L4.41734 5.36751Z"
                                    fill="#C4C4C4"/>
                        </svg>
                    </button>
                    <div class="faq_and_bonuses_hidden">
                        <div class="faq_and_bonuses_answer text">
                            <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse excepturi mollitia natus
                                ipsum
                                saepe labore ipsa culpa a ab illum, officia nihil assumenda repellendus temporibus fuga
                                explicabo et quas vero. Et alias eaque corrupti temporibus commodi ullam ducimus, culpa,
                                voluptas labore laboriosam error nam quam expedita itaque dolorum mollitia quos quod
                                quae,
                                similique molestiae ab? Est omnis deserunt nulla?
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Bonuses -->
        <section class="faq_and_bonuses_section">
            <div class="faq_and_bonuses_title">
                Latest bonuses
            </div>
            <div class="bonus_card_section">
                <?php
                $posts_per_page = '6';

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
    </section>



<?php get_footer();
