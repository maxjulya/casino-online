<?php

/*  Games - Post Type Start */

add_action('init', 'aces_games', 0 );

function aces_games() {
	
	$game_slug = 'game';
	if ( get_option( 'games_section_slug') ) {
		$game_slug = get_option( 'games_section_slug', 'game' );
	}

	$game_name = esc_html__('Игры', 'aces');
	if ( get_option( 'games_section_name') ) {
		$game_name = get_option( 'games_section_name', 'Games' );
	}

	$args = array(
        'labels' => array(
			'name' => $game_name,
			'add_new' => esc_html__('Добавить Новую', 'aces'),
            'edit_item' => esc_html__('Edit Item', 'aces'),
            'add_new_item' => esc_html__('Add New', 'aces'),
            'view_item' => esc_html__('View Item', 'aces'),
        ),
        'singular_label' => __('game'),
        'public' => true,
		'publicly_queryable' => true,
        'show_ui' => true,
		'show_in_rest' => true,
		'menu_icon' => plugins_url( 'aces/images/icon.png' ),
        '_builtin' => false,
        '_edit_link' => 'post.php?post=%d',
        'capability_type' => 'post',
        'hierarchical' => false,
        'supports' => array(
        	'title',
        	'editor',
        	'author',
        	'comments',
        	'thumbnail',
        	'excerpt',
        	'revisions'
        ),
		'has_archive' => true,
		'rewrite' => array(
			'slug' => $game_slug,
			'with_front' => false
		)
    );

register_post_type( 'game' , $args );

/* --- Category: Custom Taxonomy --- */

$games_category_title = esc_html__('Категории', 'aces');
if ( get_option( 'games_category_title') ) {
	$games_category_title = get_option( 'games_category_title', 'Категории' );
}

$labels = array(
	'name' => $games_category_title,
	'singular_name' => esc_html__('Taxonomy', 'aces'),
	'search_items' => esc_html__('Find Taxonomy', 'aces'),
	'all_items' => esc_html__('All ', 'aces') . $games_category_title,
	'parent_item' => esc_html__('Parent Taxonomy', 'aces'),
	'parent_item_colon' => esc_html__('Parent Taxonomy:', 'aces'),
	'edit_item' => esc_html__('Edit Taxonomy', 'aces'),
	'update_item' => esc_html__('Update Taxonomy', 'aces'),
	'add_new_item' => esc_html__('Add New Taxonomy', 'aces'),
	'new_item_name' => esc_html__('Taxonomy', 'aces'),
	'menu_name' => $games_category_title
); 

$args = array(
	'labels' => $labels,
	'public' => true,
	'show_in_nav_menus' => true,
	'show_ui' => true,
	'show_in_rest' => true,
	'show_tagcloud' => true,
	'hierarchical' => true,
	'update_count_callback' => '',
	'rewrite' => true,
	'query_var' => '',
	'capabilities' => array(),
	'_builtin' => false
);

register_taxonomy('game-category', 'game', $args);

/* --- Vendor: Custom Taxonomy --- */

$games_vendor_title = esc_html__('Провайдеры', 'aces');
if ( get_option( 'games_vendor_title') ) {
	$games_vendor_title = get_option( 'games_vendor_title', 'Провайдеры' );
}

$labels = array(
	'name' => $games_vendor_title,
	'singular_name' => esc_html__('Taxonomy', 'aces'),
	'search_items' => esc_html__('Find Taxonomy', 'aces'),
	'all_items' => esc_html__('All ', 'aces') . $games_vendor_title,
	'parent_item' => esc_html__('Parent Taxonomy', 'aces'),
	'parent_item_colon' => esc_html__('Parent Taxonomy:', 'aces'),
	'edit_item' => esc_html__('Edit Taxonomy', 'aces'),
	'update_item' => esc_html__('Update Taxonomy', 'aces'),
	'add_new_item' => esc_html__('Add New Taxonomy', 'aces'),
	'new_item_name' => esc_html__('Taxonomy', 'aces'),
	'menu_name' => $games_vendor_title
); 

$args = array(
	'labels' => $labels,
	'public' => true,
	'show_in_nav_menus' => true,
	'show_ui' => true,
	'show_in_rest' => true,
	'show_tagcloud' => true,
	'hierarchical' => true,
	'update_count_callback' => '',
	'rewrite' => true,
	'query_var' => '',
	'capabilities' => array(),
	'_builtin' => false
);

register_taxonomy('vendor', 'game', $args);

}

/* --- Add custom slug for taxonomy 'game-category' --- */

if ( get_option( 'game_category_slug') ) {

	function aces_change_game_category_slug( $taxonomy, $object_type, $args ) {

		$game_category_slug = 'game-category';

		if ( get_option( 'game_category_slug') ) {
			$game_category_slug = get_option( 'game_category_slug', 'game-category' );
		}

	    if( 'game-category' == $taxonomy ) {
	        remove_action( current_action(), __FUNCTION__ );
	        $args['rewrite'] = array( 'slug' => $game_category_slug );
	        register_taxonomy( $taxonomy, $object_type, $args );
	    }

	}
	add_action( 'registered_taxonomy', 'aces_change_game_category_slug', 10, 3 );

}

/* --- Add custom slug for taxonomy 'vendor' --- */

if ( get_option( 'game_vendor_slug') ) {

	function aces_change_game_vendor_slug( $taxonomy, $object_type, $args ) {

		$game_vendor_slug = 'vendor';

		if ( get_option( 'game_vendor_slug') ) {
			$game_vendor_slug = get_option( 'game_vendor_slug', 'vendor' );
		}

	    if( 'vendor' == $taxonomy ) {
	        remove_action( current_action(), __FUNCTION__ );
	        $args['rewrite'] = array( 'slug' => $game_vendor_slug );
	        register_taxonomy( $taxonomy, $object_type, $args );
	    }

	}
	add_action( 'registered_taxonomy', 'aces_change_game_vendor_slug', 10, 3 );

}

/*  Games - Post Type End */

/*  Games - Pros/Cons Start */

add_action( 'admin_init', 'aces_games_pros_cons_fields' );

function aces_games_pros_cons_fields() {
    add_meta_box( 'aces_games_pros_cons_meta_box',
        esc_html__( 'Game Pros/Cons', 'aces' ),
        'aces_games_pros_cons_display_meta_box',
        'game', 'normal', 'high'
    );
}

function aces_games_pros_cons_display_meta_box( $game ) {

	wp_nonce_field( 'aces_games_pros_cons_box', 'aces_games_pros_cons_nonce' );
	$game_pros_desc = get_post_meta( $game->ID, 'game_pros_desc', true );
	$game_cons_desc = get_post_meta( $game->ID, 'game_cons_desc', true );
	$game_pros_cons_allowed_html = array(
		'a' => array(
			'href' => true,
			'title' => true,
			'target' => true,
			'rel' => true
		),
		'br' => array(),
		'em' => array(),
		'strong' => array(),
		'span' => array(),
		'p' => array(),
		'ul' => array(),
		'ol' => array(),
		'li' => array(),
	);
?>

<div class="components-base-control game_pros_desc">
	<div class="components-base-control__field">
		<label class="components-base-control__label" for="game_pros_desc-0">
			<?php
				$casinos_pros_title = get_option( 'casinos_pros_title' );
				if ( $casinos_pros_title ) {
					echo esc_html($casinos_pros_title);
				} else {
					esc_html_e( 'Pros', 'aces' );
				}
			?>
		</label>
		<textarea class="components-textarea-control__input" id="game_pros_desc-0" rows="8" name="game_pros_desc" style="display: block; margin-bottom: 10px; width:100%;"><?php echo wp_kses($game_pros_desc, $game_pros_cons_allowed_html); ?></textarea>
	</div>
</div>

<div class="components-base-control game_cons_desc">
	<div class="components-base-control__field">
		<label class="components-base-control__label" for="game_cons_desc-0">
			<?php
				$casinos_cons_title = get_option( 'casinos_cons_title' );
				if ( $casinos_cons_title ) {
					echo esc_html($casinos_cons_title);
				} else {
					esc_html_e( 'Cons', 'aces' );
				}
			?>
		</label>
		<textarea class="components-textarea-control__input" id="game_cons_desc-0" rows="8" name="game_cons_desc" style="display: block; margin-bottom: 10px; width:100%;"><?php echo wp_kses($game_cons_desc, $game_pros_cons_allowed_html); ?></textarea>
	</div>
</div>

    <?php
}

add_action( 'save_post', 'aces_games_pros_cons_save_fields', 10, 2 );

function aces_games_pros_cons_save_fields( $post_id ) {

		if ( ! isset( $_POST['aces_games_pros_cons_nonce'] ) ) {
            return $post_id;
        }

        $nonce = $_POST['aces_games_pros_cons_nonce'];

        if ( ! wp_verify_nonce( $nonce, 'aces_games_pros_cons_box' ) ) {
            return $post_id;
        }

        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
            return $post_id;
        }

        if ( 'game' == $_POST['post_type'] ) {
            if ( ! current_user_can( 'edit_page', $post_id ) ) {
                return $post_id;
            }
        }

		$game_pros_desc = $_POST['game_pros_desc'];
        update_post_meta( $post_id, 'game_pros_desc', $game_pros_desc );

        $game_cons_desc = $_POST['game_cons_desc'];
        update_post_meta( $post_id, 'game_cons_desc', $game_cons_desc );
}

/*  Games - Pros/Cons End */

/*  Games - Additional Fields Start */

add_action( 'admin_init', 'aces_games_fields' );

function aces_games_fields() {
    add_meta_box( 'aces_games_meta_box',
        esc_html__( 'Additional Information', 'aces' ),
        'aces_games_display_meta_box',
        'game', 'side', 'high'
    );
}

function aces_games_display_meta_box( $game ) {
	wp_nonce_field( 'aces_games_box', 'aces_games_nonce' );

	$game_short_desc = get_post_meta( $game->ID, 'game_short_desc', true );
	$game_external_link = get_post_meta( $game->ID, 'game_external_link', true );
	$game_button_title = get_post_meta( $game->ID, 'game_button_title', true );
	$game_button_notice = get_post_meta( $game->ID, 'game_button_notice', true );
	$game_allowed_html = array(
		'a' => array(
			'href' => true,
			'title' => true,
			'target' => true,
			'rel' => true
		),
		'br' => array(),
		'em' => array(),
		'strong' => array(),
		'span' => array(),
		'p' => array()
	);
?>

<div class="components-base-control game_short_desc">
	<div class="components-base-control__field">
		<label class="components-base-control__label" for="game_short_desc-0"><?php esc_html_e( 'Short description', 'aces' )?></label>
		<textarea class="components-textarea-control__input" id="game_short_desc-0" rows="4" name="game_short_desc" style="display: block; margin-bottom: 10px; width:100%;"><?php echo wp_kses($game_short_desc, $game_allowed_html); ?></textarea>
	</div>
</div>

<div class="components-base-control game_external_link">
	<div class="components-base-control__field">
		<label class="components-base-control__label" for="game_external_link-0"><?php esc_html_e( 'External URL of the Button', 'aces' )?></label>
		<input type="url" name="game_external_link" id="game_external_link-0" value="<?php echo esc_url($game_external_link); ?>" style="display: block; margin-bottom: 10px;" />
	</div>
</div>

<div class="components-base-control game_button_title">
	<div class="components-base-control__field">
		<label class="components-base-control__label" for="game_button_title-0"><?php esc_html_e( 'Button Title', 'aces' )?></label>
		<input type="text" name="game_button_title" id="game_button_title-0" value="<?php echo esc_attr($game_button_title); ?>" style="display: block; margin-bottom: 10px;" />
	</div>
</div>

<div class="components-base-control game_button_notice">
	<div class="components-base-control__field">
		<label class="components-base-control__label" for="game_button_notice-0"><?php esc_html_e( 'Button Notice', 'aces' ); ?></label>
		<textarea class="components-textarea-control__input" id="game_button_notice-0" rows="3" name="game_button_notice" style="display: block; margin-bottom: 10px; width:100%;"><?php echo wp_kses($game_button_notice, $game_allowed_html); ?></textarea>
	</div>
</div>

    <?php
}

add_action( 'save_post', 'aces_games_save_fields', 10, 2 );

function aces_games_save_fields( $post_id ) {

		if ( ! isset( $_POST['aces_games_nonce'] ) ) {
            return $post_id;
        }

        $nonce = $_POST['aces_games_nonce'];

        if ( ! wp_verify_nonce( $nonce, 'aces_games_box' ) ) {
            return $post_id;
        }

        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
            return $post_id;
        }

        if ( 'game' == $_POST['post_type'] ) {
            if ( ! current_user_can( 'edit_page', $post_id ) ) {
                return $post_id;
            }
        }

		$game_short_desc = $_POST['game_short_desc'];
        update_post_meta( $post_id, 'game_short_desc', $game_short_desc );

		$game_external_link = esc_url( $_POST['game_external_link'] );
        update_post_meta( $post_id, 'game_external_link', $game_external_link );

		$game_button_title = sanitize_text_field( $_POST['game_button_title'] );
        update_post_meta( $post_id, 'game_button_title', $game_button_title );

        $game_button_notice = $_POST['game_button_notice'];
        update_post_meta( $post_id, 'game_button_notice', $game_button_notice );
}

/*  Games - Additional Fields End  */

/*  Relationship of the Game and Casino Start  */

add_action( 'admin_init', 'aces_games_casinos_list' );

function aces_games_casinos_list() {
    add_meta_box( 'aces_games_casinos_list_meta_box',
        esc_html__( 'Casinos', 'aces' ),
        'aces_games_display_casinos_list_meta_box',
        'game', 'side', 'high'
    );
}

function aces_games_display_casinos_list_meta_box( $game ) {
    wp_nonce_field( basename(__FILE__), 'game_custom_nonce' );

    $postmeta = get_post_meta( $game->ID, 'parent_casino', true );
    $casinos = get_posts(array( 'post_type'=>'casino', 'posts_per_page'=>-1, 'orderby'=>'post_title', 'order'=>'ASC' ));

    if( $casinos ) {
    	$elements = [];
    	foreach( $casinos as $casino ) {
    		$elements[$casino->ID] = $casino->post_title;
        }
    ?>
	<div style="max-height:200px; overflow-y:auto;">
		<ul>
	    <?php foreach ( $elements as $id => $element) {

	        if ( is_array( $postmeta ) && in_array( $id, $postmeta ) ) {
	            $checked = 'checked=checked';
	        } else {
	            $checked = null;
	        }

	        ?>

	        <li>
				<label>
	            <input type="checkbox" name="casino_item[]" value="<?php esc_attr_e($id);?>" <?php esc_attr_e($checked); ?>>
	            <?php esc_html_e($element); ?>
	        	</label>
			</li>

	    <?php } ?>
		</ul>
	</div>
    <?php
	} else {
		esc_html_e( 'No casinos', 'aces' );
	}
}

add_action( 'save_post', 'aces_games_casinos_save_fields', 10, 2 );

function aces_games_casinos_save_fields( $post_id ) {
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'game_custom_nonce' ] ) && wp_verify_nonce( $_POST[ 'game_custom_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';

    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }

    // If the checkbox was not empty, save it as array in post meta
    if ( ! empty( $_POST['casino_item'] ) ) {
        update_post_meta( $post_id, 'parent_casino', $_POST['casino_item'] );

    // Otherwise just delete it if its blank value.
    } else {
        delete_post_meta( $post_id, 'parent_casino' );
    }

};

/*  Relationship of the Game and Casino End  */

/*  Add vendors logo Start  */

/* --- Add custom taxonomy field --- */

function aces_add_vendor_taxonomy_image($taxonomy) {
?>
<div class="form-field term-group">
    <label for="taxonomy-image-id">
    	<?php esc_html_e('Logo', 'aces'); ?>
    </label>
    <input type="hidden" id="taxonomy-image-id" name="taxonomy-image-id" class="custom_media_url" value="">
    <div id="taxonomy-image-wrapper"></div>
    <p>
	    <input type="button" class="button button-secondary aces_media_button" id="aces_media_button" name="aces_media_button" value="<?php esc_attr_e( 'Add Logo', 'aces' ); ?>" />
	    <input type="button" class="button button-secondary aces_media_remove" id="aces_media_remove" name="aces_media_remove" value="<?php esc_attr_e( 'Remove Logo', 'aces' ); ?>" />
    </p>
</div>
<?php
}

add_action('vendor_add_form_fields', 'aces_add_vendor_taxonomy_image', 10, 2);

/* --- Save the custom taxonomy field --- */

function aces_save_vendor_taxonomy_image($term_id, $tt_id) {
	if( isset( $_POST['taxonomy-image-id'] ) && '' !== $_POST['taxonomy-image-id'] ){
    	$image = esc_attr( $_POST['taxonomy-image-id'] );
    	add_term_meta( $term_id, 'taxonomy-image-id', $image, true );
	}
}

add_action('created_vendor', 'aces_save_vendor_taxonomy_image', 10, 2);

/* --- Add custom taxonomy field for edit --- */

function aces_edit_vendor_image_upload($term, $taxonomy) {
?>
<tr class="form-field term-group-wrap">
    <th scope="row">
    	<label for="taxonomy-image-id">
    		<?php esc_html_e( 'Logo', 'aces' ); ?>
    	</label>
    </th>
    <td>
    	<?php $image_id = get_term_meta ( $term->term_id, 'taxonomy-image-id', true ); ?>
    	<input type="hidden" id="taxonomy-image-id" name="taxonomy-image-id" value="<?php echo esc_attr( $image_id ); ?>">
    	<div id="taxonomy-image-wrapper">
        <?php if ( $image_id ) { ?>
        	<?php echo wp_get_attachment_image ( $image_id, 'mercury-custom-logo' ); ?>
        <?php } ?>
       	</div>
       	<p>
	        <input type="button" class="button button-secondary aces_media_button" id="aces_media_button" name="aces_media_button" value="<?php esc_attr_e( 'Add Logo', 'aces' ); ?>" />
	        <input type="button" class="button button-secondary aces_media_remove" id="aces_media_remove" name="aces_media_remove" value="<?php esc_attr_e( 'Remove Logo', 'aces' ); ?>" />
    	</p>
    </td>
</tr>
<?php
}

add_action('vendor_edit_form_fields', 'aces_edit_vendor_image_upload', 10, 2);

/* --- Save the edited value of the custom taxonomy field --- */

function aces_update_vendor_image_upload($term_id, $tt_id) {
	if( isset( $_POST['taxonomy-image-id'] ) && '' !== $_POST['taxonomy-image-id'] ){
    	$image = esc_attr( $_POST['taxonomy-image-id'] );
    	update_term_meta ( $term_id, 'taxonomy-image-id', $image );
	} else {
    	update_term_meta ( $term_id, 'taxonomy-image-id', '' );
	}
}

add_action('edited_vendor', 'aces_update_vendor_image_upload', 10, 2);

/*  Add vendors logo End  */