<?php
/**
 * Get first post image. Used in filters.
 * 
 * @param string $content
 * @return string
 */
function ale_parse_first_image($content = null) {
    if (!$content) {
        $content = get_the_content();
    }
    preg_match('~(<img[^>]+>)~sim', trim($content), $matches);
    return isset($matches[1]) ? $matches[1] : '';
}

/**
 * Remove first image from post. Used in filters.
 * 
 * @param string $content
 * @return string
 */
function ale_remove_first_image($content = null) {
    if (!$content) {
        $content = get_the_content();
    }
    $content = trim(preg_replace('~(<a[^>]+>)?\s*(<img[^>]+>)\s*(</a>)?~sim', '', $content, 1));
    return $content;
}

/**
 * Remove all post images.
 * 
 * @param string $content
 * @return string 
 */
function ale_remove_images($content = null) {
    if (!$content) {
        $content = get_the_content();
    }
    $content = trim(preg_replace('~(<a[^>]+>)?\s*(<img[^>]+>)\s*(</a>)?~sim', '', $content));
    return $content;
}


/**
 * Fix image margins for captions
 * @param int $x
 * @param array $attr
 * @param string $content
 * @return string 
 */
function ale_fix_image_margings($x=null, $attr, $content) {
	extract(shortcode_atts(array(
			'id'    => '',
			'align'    => 'alignnone',
			'width'    => '',
			'caption' => ''
		), $attr));

	if ( 1 > (int) $width || empty($caption) ) {
		return $content;
	}

	if ( $id ) {
		$id = 'id="' . $id . '" ';			
	}

    return '<div ' . $id . 'class="wp-caption ' . $align . '" style="width:'.$width.'px" >' . $content . '<p class="wp-caption-text">' . $caption . '</p></div>';
}
add_filter('img_caption_shortcode', 'ale_fix_image_margings', 10, 3);

/**
 * Get all attached images. Filter by hide_form_gallery meta key
 * @param integer $id
 * @param boolean $show_hidden
 * @return array
 */
function ale_get_attached_images($id = null, $show_hidden = true) {
    if (!$id) {
        $id = get_the_ID();
    }
	
	$attrs = array(
        'post_parent' => $id,
        'post_status' => null,
        'post_type' => 'attachment',
        'post_mime_type' => 'image',
        'order' => 'ASC',
        'numberposts' => -1,
        'orderby' => 'menu_order',
	);
	
	if (!$show_hidden) {
		$attrs['meta_query'] = array(
			array(
				'key'		=> '_ale_hide_from_gallery',
				'value'		=> 0,
				'type'		=> 'DECIMAL',
			),
		);
	}
	
    return get_children($attrs);
}

/**
 * Get first post image attachment
 * @param integer $id
 * @param boolean $show_hidden
 * @return array|boolean
 */
function ale_get_first_attached_image($id = null, $show_hidden = true) {
    if (!$id) {
        $id = get_the_ID();
    }
	
	$attrs = array(
        'post_parent' => $id,
        'post_status' => null,
        'post_type' => 'attachment',
        'post_mime_type' => 'image',
        'order' => 'ASC',
        'numberposts' => 1,
        'orderby' => 'menu_order',
    );
	
	if (!$show_hidden) {
		$attrs['meta_query'] = array(
			array(
				'key'		=> '_ale_hide_from_gallery',
				'value'		=> 0,
				'type'		=> 'DECIMAL',
			),
		);
	}
	
    $image = get_children($attrs);
    
    if (!count($image)) {
        return false;
    }
    
    $image = array_values($image);
    return $image[0];
}

/**
 * Display first attached image 
 * @param int $id
 * @param mixed $size
 * @param boolean $show_hidden
 * @return string 
 */
function ale_display_first_attached_image($id = null, $size = 'large', $show_hidden = true)
{
	$image = ale_get_first_attached_image($id, $show_hidden);
	
	if (!$image) {
		return '';
	}
	
	echo wp_get_attachment_image($image->ID, $size);
}

/**
 * Get featured image src
 * @param int $post_id
 * @param string $size
 * @return string
 */
function ale_get_featured_image_src($post_id, $size  = 'thumbnail') {
	if (!$post_id) {
		$post_id = get_the_ID();
	}
	
	$post_thumbnail_id = get_post_thumbnail_id($post_id);  
	if ($post_thumbnail_id) {
		$post_thumbnail_img = wp_get_attachment_image_src($post_thumbnail_id, $size);  
		return $post_thumbnail_img[0];  
	} else {
		return '';
	}
}

/**
 * Get first attached image source with set size.
 * 
 * @param int $post_id
 * @param string $size
 * @param boolean $show_hidden
 * @return string 
 */
function ale_get_first_attached_image_src($post_id, $size = 'thumbnail', $show_hidden = true) {
	if (!$post_id) {
		$post_id = get_the_ID();
	}
	$image = ale_get_first_attached_image($post_id, $show_hidden);
	
	if ($image) {
		$image_img = wp_get_attachment_image_src($image->ID, $size);  
		return $image_img[0];  
	} else {
		return '';
	}
}

/**
 * Get attachment ID by URL
 * 
 * @param string $url
 * @return integer|boolean
 */
function ale_get_attachment_id($url) {

    $dir = wp_upload_dir();
    $dir = trailingslashit($dir['baseurl']);

    if(false === strpos($url, $dir)) {
		return false;
	}
	
    $file = basename($url);

    $query = array(
        'post_type' => 'attachment',
        'fields' => 'ids',
        'meta_query' => array(
            array(
                'value' => $file,
                'compare' => 'LIKE',
            )
        )
    );

    $query['meta_query'][0]['key'] = '_wp_attached_file';
    $ids = get_posts( $query );

    foreach($ids as $id) {
		if($url == array_shift(wp_get_attachment_image_src($id, 'full'))) {
			return $id;
		}
	}
	
    $query['meta_query'][0]['key'] = '_wp_attachment_metadata';
    $ids = get_posts( $query );

    foreach($ids as $id) {
        $meta = wp_get_attachment_metadata($id);
        foreach($meta['sizes'] as $size => $values) {
            if($values['file'] == $file && $url == array_shift(wp_get_attachment_image_src($id, $size))) {
                return $id;
            }	
		}
    }

    return false;
}


// Works Grid Images Sizes base on Theme Options Settings
function ale_get_necessary_image_size(){

    $thumb_size = 'full';

    //Get the columns setting
    $ale_work_columns = ale_get_option('default_work_columns');

    //Get the Layout Style
    $ale_work_layout = ale_get_option('default_layout_type');

    if($ale_work_columns and $ale_work_layout){
        switch($ale_work_columns) {
            case '1' :
                $thumb_size = 'works-'.$ale_work_layout.'extrabig';
                break;
            case '2' :
                $thumb_size = 'works-'.$ale_work_layout.'big';
                break;
            case '3' :
                $thumb_size = 'works-'.$ale_work_layout.'large';
                break;
            case '4' :
                $thumb_size = 'works-'.$ale_work_layout.'medium';
                break;
            case '5' :
                $thumb_size = 'works-'.$ale_work_layout.'small';
                break;
        }
    }

    return $thumb_size;
}

//Wrap Photos into a div for Wedding Variant
function ale_addDivToImage( $content ) {
    // A regular expression of what to look for.
    $pattern = '/(<img([^>]*)>)/i';
    // What to replace it with. $1 refers to the content in the first 'capture group', in parentheses above
    $replacement = '<div class="post_photo">$1</div>';

    // run preg_replace() on the $content
    $content = preg_replace( $pattern, $replacement, $content );

    // return the processed content
    return $content;
}