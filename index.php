<?php
get_header();
?>


    <section class="news_feed home_rated_casinos">
        <h2 class="news_feed_title">News Feed</h2>
        <article class="news_feed_list">
            <?php echo do_shortcode( ' [ajax_load_more post_type="post" button_label="LOAD MORE ARTICLES"]' ); ?>
        </article>
    </section>

    <section class="news_feed home_casino_news all_casinos">
        <div class="home_content_bottom">
            <div class="left_box">
                <?php if ($onlinecasino_options['opt-editor-left-top']) { ?>
                    <p><?php echo esc_attr($onlinecasino_options['opt-editor-left-top']); ?></p>
                <?php } ?>
                <?php if ($onlinecasino_options['opt-editor-left-bottom']) { ?>
                    <p><?php echo esc_attr($onlinecasino_options['opt-editor-left-bottom']); ?></p>
                <?php } ?>
            </div>
            <div class="right_box">
                <?php if ($onlinecasino_options['opt-editor-right-top']) { ?>
                    <p><?php echo esc_attr($onlinecasino_options['opt-editor-right-top']); ?></p>
                <?php } ?>
                <?php if ($onlinecasino_options['opt-editor-right-bottom']) { ?>
                    <p><?php echo esc_attr($onlinecasino_options['opt-editor-right-bottom']); ?></p>
                <?php } ?>
            </div>
        </div>

    </section>

<?php

get_footer();
