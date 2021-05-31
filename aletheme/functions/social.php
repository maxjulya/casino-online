<?php
/**
 * Display share options
 * 
 * @param string $type 
 */
function ale_share($type = 'fb') {
    echo ale_get_share($type);
}

/**
 * Get link for sharing
 * 
 * @param string $type
 * @return string
 */
function ale_get_share($type = 'fb', $permalink = false, $title = false) {
    if (!$permalink) {
        $permalink = get_permalink();
    }
    if (!$title) {
        $title = get_the_title();
    }

global $post;
    $excerpt = get_the_excerpt();
    $image_url = get_the_post_thumbnail_url($post->ID,'full');

    switch ($type) {
        case 'twi':
            return 'http://twitter.com/home?status=' . esc_attr($title) . '+-+' . esc_url($permalink);
            break;
        case 'fb':
            return 'http://www.facebook.com/sharer.php?u=' . esc_url($permalink) . '&t=' . esc_attr($title);
            break;
        case 'goglp':
            return 'https://plus.google.com/share?url='. urlencode(esc_url($permalink));
            break;
        case 'vk':
            return 'http://vkontakte.ru/share.php?url='. urlencode(esc_url($permalink)).'&title='.esc_attr($title).'&description='.esc_attr($excerpt);
            break;
        case 'pin':
            return 'http://pinterest.com/pin/create/button/?url='. urlencode(esc_url($permalink)).'&description='.esc_attr($excerpt).'&media='.urlencode(esc_url($image_url));
            break;
        case 'red':
            return 'http://reddit.com/submit?url='. urlencode(esc_url($permalink)).'&title='.esc_attr($title);
            break;
        case 'lin':
            return 'https://www.linkedin.com/shareArticle?mini=true&url='. urlencode(esc_url($permalink)).'&title='.esc_attr($title).'&summary='.esc_attr($excerpt);
            break;
        default:
            return '';
    }
}

// Get recent photos from Instagram
function ale_get_recent_from_instagram($login = '',$access_token = '',$count = ''){

    wp_register_script( 'ale-instafeed', ALETHEME_THEME_URL . '/js/libs/jquery.instafeed.js', array( 'jquery' ), ALETHEME_THEME_VERSION, true );


    $login = ale_get_option('instagram_login');
    $token = ale_get_option('instagram_token');
    $count = ale_get_option('instagram_count');
    $thumb = ale_get_option('instagram_thumb');
    $subsribe_link = 'http://instagram.com/'.esc_attr($login);
    $error = '';
    $html = '';

    if(empty($login) or empty($token) or empty($count) or empty($thumb)) {

        $error = esc_html__('Fill all the Instagram Feed fields in Theme Options Panel','gardener');

    } else {

        wp_enqueue_script( 'ale-instafeed' );
        wp_localize_script( 'ale-instafeed', 'olins_instagram', array(
            'token' => $token,
            'username' => $login,
            'num_photos' => $count,
            'thumb' => $thumb,
        ) );

    }

    $html .= "<ul class='ale_instagram_feed cf'>".esc_attr($error)."</ul>";

    $html .= '<div class="ale_insta_subscribe"><span class="button_border">'.esc_html__('Follow us on Instagram','gardener').' <a href="'.esc_url($subsribe_link).'" target="_blank">'.esc_attr($login).'</a></span></div>';


    return $html;
}