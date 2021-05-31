<?php

/*  Casinos - Post Type Start */

add_action('init', 'aces_casinos', 0 );

function aces_casinos() {

	$casino_slug = 'casino';
	if ( get_option( 'casinos_section_slug') ) {
		$casino_slug = get_option( 'casinos_section_slug', 'casino' );
	}

	$casino_name = esc_html__('Казино', 'aces');
	if ( get_option( 'casinos_section_name') ) {
		$casino_name = get_option( 'casinos_section_name', 'Казино' );
	}

	$args = array(
        'labels' => array(
			'name' => $casino_name,
			'add_new' => esc_html__('Добавить Новое', 'aces'),
            'edit_item' => esc_html__('Edit Item', 'aces'),
            'add_new_item' => esc_html__('Add New', 'aces'),
            'view_item' => esc_html__('View Item', 'aces'),
        ),
        'singular_label' => __('casino'),
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
			'slug' => $casino_slug,
			'with_front' => false
		)
    );

register_post_type( 'casino' , $args );

/* --- Category: Custom Taxonomy --- */

$casinos_category_title = esc_html__('Категории', 'aces');
if ( get_option( 'casinos_category_title') ) {
	$casinos_category_title = get_option( 'casinos_category_title', 'Категории' );
}

$labels = array(
	'name' => $casinos_category_title,
	'singular_name' => esc_html__('Таксономия', 'aces'),
	'search_items' => esc_html__('Найти Таксономию', 'aces'),
	'all_items' => esc_html__('Все ', 'aces') . $casinos_category_title,
	'parent_item' => esc_html__('Родительская Таксономия', 'aces'),
	'parent_item_colon' => esc_html__('Родительская Таксономия:', 'aces'),
	'edit_item' => esc_html__('Редактировать Таксономию', 'aces'),
	'update_item' => esc_html__('Обновить Таксономию', 'aces'),
	'add_new_item' => esc_html__('Добавить новую Таксономию', 'aces'),
	'new_item_name' => esc_html__('Taxonomy', 'aces'),
	'menu_name' => $casinos_category_title
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

register_taxonomy('casino-category', 'casino', $args);

/* --- Software: Custom Taxonomy --- */

$casinos_software_title = esc_html__('Провайдеры', 'aces');
if ( get_option( 'casinos_software_title') ) {
	$casinos_software_title = get_option( 'casinos_software_title', 'Провайдеры' );
}

$labels = array(
	'name' => $casinos_software_title,
	'singular_name' => esc_html__('Таксономия', 'aces'),
	'search_items' => esc_html__('Найти Таксономию', 'aces'),
	'all_items' => esc_html__('Все ', 'aces') . $casinos_software_title,
	'parent_item' => esc_html__('Родительская Таксономия', 'aces'),
	'parent_item_colon' => esc_html__('Родительская Таксономия:', 'aces'),
	'edit_item' => esc_html__('Редактировать Таксономию', 'aces'),
	'update_item' => esc_html__('Обновить Таксономию', 'aces'),
	'add_new_item' => esc_html__('Добавить новую Таксономию', 'aces'),
	'new_item_name' => esc_html__('Таксономия', 'aces'),
	'menu_name' => $casinos_software_title
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

register_taxonomy('software', 'casino', $args);

}

/* --- Add custom slug for taxonomy 'deposit-method' --- */

if ( get_option( 'casino_deposit_method_slug') ) {

	function aces_change_casino_deposit_method_slug( $taxonomy, $object_type, $args ) {

		$casino_deposit_method_slug = 'deposit-method';

		if ( get_option( 'casino_deposit_method_slug') ) {
			$casino_deposit_method_slug = get_option( 'casino_deposit_method_slug', 'deposit-method' );
		}

	    if( 'deposit-method' == $taxonomy ) {
	        remove_action( current_action(), __FUNCTION__ );
	        $args['rewrite'] = array( 'slug' => $casino_deposit_method_slug );
	        register_taxonomy( $taxonomy, $object_type, $args );
	    }

	}
	add_action( 'registered_taxonomy', 'aces_change_casino_deposit_method_slug', 10, 3 );

}

/* --- Add custom slug for taxonomy 'withdrawal-method' --- */

if ( get_option( 'casino_withdrawal_method_slug') ) {

	function aces_change_casino_withdrawal_method_slug( $taxonomy, $object_type, $args ) {

		$casino_withdrawal_method_slug = 'withdrawal-method';

		if ( get_option( 'casino_withdrawal_method_slug') ) {
			$casino_withdrawal_method_slug = get_option( 'casino_withdrawal_method_slug', 'withdrawal-method' );
		}

	    if( 'withdrawal-method' == $taxonomy ) {
	        remove_action( current_action(), __FUNCTION__ );
	        $args['rewrite'] = array( 'slug' => $casino_withdrawal_method_slug );
	        register_taxonomy( $taxonomy, $object_type, $args );
	    }

	}
	add_action( 'registered_taxonomy', 'aces_change_casino_withdrawal_method_slug', 10, 3 );

}

/* --- Add custom slug for taxonomy 'withdrawal-limit' --- */

if ( get_option( 'casino_withdrawal_limit_slug') ) {

	function aces_change_casino_withdrawal_limit_slug( $taxonomy, $object_type, $args ) {

		$casino_withdrawal_limit_slug = 'withdrawal-limit';

		if ( get_option( 'casino_withdrawal_limit_slug') ) {
			$casino_withdrawal_limit_slug = get_option( 'casino_withdrawal_limit_slug', 'withdrawal-limit' );
		}

	    if( 'withdrawal-limit' == $taxonomy ) {
	        remove_action( current_action(), __FUNCTION__ );
	        $args['rewrite'] = array( 'slug' => $casino_withdrawal_limit_slug );
	        register_taxonomy( $taxonomy, $object_type, $args );
	    }

	}
	add_action( 'registered_taxonomy', 'aces_change_casino_withdrawal_limit_slug', 10, 3 );

}

/* --- Add custom slug for taxonomy 'restricted-countries' --- */

if ( get_option( 'casino_restricted_countries_slug') ) {

	function aces_change_casino_restricted_countries_slug( $taxonomy, $object_type, $args ) {

		$casino_restricted_countries_slug = 'restricted-country';

		if ( get_option( 'casino_restricted_countries_slug') ) {
			$casino_restricted_countries_slug = get_option( 'casino_restricted_countries_slug', 'restricted-country' );
		}

	    if( 'restricted-country' == $taxonomy ) {
	        remove_action( current_action(), __FUNCTION__ );
	        $args['rewrite'] = array( 'slug' => $casino_restricted_countries_slug );
	        register_taxonomy( $taxonomy, $object_type, $args );
	    }

	}
	add_action( 'registered_taxonomy', 'aces_change_casino_restricted_countries_slug', 10, 3 );

}

/* --- Add custom slug for taxonomy 'licence' --- */

if ( get_option( 'casino_licence_slug') ) {

	function aces_change_casino_licence_slug( $taxonomy, $object_type, $args ) {

		$casino_licence_slug = 'licence';

		if ( get_option( 'casino_licence_slug') ) {
			$casino_licence_slug = get_option( 'casino_licence_slug', 'licence' );
		}

	    if( 'licence' == $taxonomy ) {
	        remove_action( current_action(), __FUNCTION__ );
	        $args['rewrite'] = array( 'slug' => $casino_licence_slug );
	        register_taxonomy( $taxonomy, $object_type, $args );
	    }

	}
	add_action( 'registered_taxonomy', 'aces_change_casino_licence_slug', 10, 3 );

}

/* --- Add custom slug for taxonomy 'language' --- */

if ( get_option( 'casino_language_slug') ) {

	function aces_change_casino_language_slug( $taxonomy, $object_type, $args ) {

		$casino_language_slug = 'language';

		if ( get_option( 'casino_language_slug') ) {
			$casino_language_slug = get_option( 'casino_language_slug', 'language' );
		}

	    if( 'language' == $taxonomy ) {
	        remove_action( current_action(), __FUNCTION__ );
	        $args['rewrite'] = array( 'slug' => $casino_language_slug );
	        register_taxonomy( $taxonomy, $object_type, $args );
	    }

	}
	add_action( 'registered_taxonomy', 'aces_change_casino_language_slug', 10, 3 );

}

/* --- Add custom slug for taxonomy 'currency' --- */

if ( get_option( 'casino_currency_slug') ) {

	function aces_change_casino_currency_slug( $taxonomy, $object_type, $args ) {

		$casino_currency_slug = 'currency';

		if ( get_option( 'casino_currency_slug') ) {
			$casino_currency_slug = get_option( 'casino_currency_slug', 'currency' );
		}

	    if( 'currency' == $taxonomy ) {
	        remove_action( current_action(), __FUNCTION__ );
	        $args['rewrite'] = array( 'slug' => $casino_currency_slug );
	        register_taxonomy( $taxonomy, $object_type, $args );
	    }

	}
	add_action( 'registered_taxonomy', 'aces_change_casino_currency_slug', 10, 3 );

}


/* --- Add custom slug for taxonomy 'casino-category' --- */

if ( get_option( 'casino_category_slug') ) {

    function aces_change_casino_category_slug( $taxonomy, $object_type, $args ) {

        $casino_category_slug = 'casino-category';

        if ( get_option( 'casino_category_slug') ) {
            $casino_category_slug = get_option( 'casino_category_slug', 'casino-category' );
        }

        if( 'casino-category' == $taxonomy ) {
            remove_action( current_action(), __FUNCTION__ );
            $args['rewrite'] = array( 'slug' => $casino_category_slug );
            register_taxonomy( $taxonomy, $object_type, $args );
        }

    }
    add_action( 'registered_taxonomy', 'aces_change_casino_category_slug', 10, 3 );

}

/* --- Add custom slug for taxonomy 'software' --- */

if ( get_option( 'casino_software_slug') ) {

    function aces_change_casino_software_slug( $taxonomy, $object_type, $args ) {

        $casino_software_slug = 'software';

        if ( get_option( 'casino_software_slug') ) {
            $casino_software_slug = get_option( 'casino_software_slug', 'software' );
        }

        if( 'software' == $taxonomy ) {
            remove_action( current_action(), __FUNCTION__ );
            $args['rewrite'] = array( 'slug' => $casino_software_slug );
            register_taxonomy( $taxonomy, $object_type, $args );
        }

    }
    add_action( 'registered_taxonomy', 'aces_change_casino_software_slug', 10, 3 );

}


/*  Casinos - Post Type End */





/*  Display the Relationship of the Casino and Games Start  */

add_action( 'admin_init', 'aces_casinos_games_list' );

function aces_casinos_games_list() {
    add_meta_box( 'aces_casinos_games_list_meta_box',
        esc_html__( 'Игры', 'aces' ),
        'aces_casinos_display_games_list_meta_box',
        'casino', 'side', 'high'
    );
}

function aces_casinos_display_games_list_meta_box( $post ){
	$games = get_posts(
		array(
			'post_type'=>'game',
			'posts_per_page'=>-1,
			'orderby'=>'post_title',
			'order'=>'ASC',
			'meta_query' => array(
		        array(
		            'key' => 'parent_casino',
		            'value' => $post->ID,
		            'compare' => 'LIKE'
		        )
		    )
		)
	);

	if( $games ){
	?>
		<div style="max-height:200px; overflow-y:auto;">
			<ul>
			<?php foreach( $games as $game ){ ?>
				<li><a href="<?php echo esc_url(get_permalink($game->ID)); ?>" title="<?php esc_html_e($game->post_title); ?>" target="_blank"><?php esc_html_e($game->post_title); ?></a></li>
			<?php } ?>
			</ul>
		</div>
	<?php
	} else {
		esc_html_e( 'No games', 'aces' );
	}
}

/*  Display the Relationship of the Casino and Games End  */

/*  Display the Relationship of the Casino and Bonuses Start  */

add_action( 'admin_init', 'aces_casinos_bonuses_list' );

function aces_casinos_bonuses_list() {
    add_meta_box( 'aces_casinos_bonuses_list_meta_box',
        esc_html__( 'Бонусы', 'aces' ),
        'aces_casinos_display_bonuses_list_meta_box',
        'casino', 'side', 'high'
    );
}

function aces_casinos_display_bonuses_list_meta_box( $post ){
	$bonuses = get_posts(
		array(
			'post_type'=>'bonus',
			'posts_per_page'=>-1,
			'orderby'=>'post_title',
			'order'=>'ASC',
			'meta_query' => array(
		        array(
		            'key' => 'bonus_parent_casino',
		            'value' => $post->ID,
		            'compare' => 'LIKE'
		        )
		    )
		)
	);

	if( $bonuses ){
	?>
		<div style="max-height:200px; overflow-y:auto;">
			<ul>
			<?php foreach( $bonuses as $bonus ){ ?>
				<li><a href="<?php echo esc_url(get_permalink($bonus->ID)); ?>" title="<?php esc_html_e($bonus->post_title); ?>" target="_blank"><?php esc_html_e($bonus->post_title); ?></a></li>
			<?php } ?>
			</ul>
		</div>
	<?php
	} else {
		esc_html_e( 'No bonuses', 'aces' );
	}
}

/*  Display the Relationship of the Casino and Bonuses End  */

/*  Add Software logo Start  */

/* --- Add custom taxonomy field --- */

function aces_add_software_taxonomy_image($taxonomy) {
?>
<div class="form-field term-group">
    <label for="taxonomy-image-id">
    	<?php esc_html_e('Logo', 'aces'); ?>
    </label>
    <input type="hidden" id="taxonomy-image-id" name="taxonomy-image-id" class="custom_media_url" value="">
    <div id="taxonomy-image-wrapper"></div>
    <p>
	    <input type="button" class="button button-secondary aces_media_button" id="aces_media_button" name="aces_media_button" value="<?php esc_attr_e( 'Добавить Logo', 'aces' ); ?>" />
	    <input type="button" class="button button-secondary aces_media_remove" id="aces_media_remove" name="aces_media_remove" value="<?php esc_attr_e( 'Удалить Logo', 'aces' ); ?>" />
    </p>
</div>
<?php
}

add_action('software_add_form_fields', 'aces_add_software_taxonomy_image', 10, 2);

/* --- Save the custom taxonomy field --- */

function aces_save_software_taxonomy_image($term_id, $tt_id) {
	if( isset( $_POST['taxonomy-image-id'] ) && '' !== $_POST['taxonomy-image-id'] ){
    	$image = esc_attr( $_POST['taxonomy-image-id'] );
    	add_term_meta( $term_id, 'taxonomy-image-id', $image, true );
	}
}

add_action('created_software', 'aces_save_software_taxonomy_image', 10, 2);

/* --- Add custom taxonomy field for edit --- */

function aces_edit_software_image_upload($term, $taxonomy) {
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
	        <input type="button" class="button button-secondary aces_media_button" id="aces_media_button" name="aces_media_button" value="<?php esc_attr_e( 'Добавить Logo', 'aces' ); ?>" />
	        <input type="button" class="button button-secondary aces_media_remove" id="aces_media_remove" name="aces_media_remove" value="<?php esc_attr_e( 'Удалить Logo', 'aces' ); ?>" />
    	</p>
    </td>
</tr>
<?php
}

add_action('software_edit_form_fields', 'aces_edit_software_image_upload', 10, 2);

/* --- Save the edited value of the custom taxonomy field --- */

function aces_update_software_image_upload($term_id, $tt_id) {
	if( isset( $_POST['taxonomy-image-id'] ) && '' !== $_POST['taxonomy-image-id'] ){
    	$image = esc_attr( $_POST['taxonomy-image-id'] );
    	update_term_meta ( $term_id, 'taxonomy-image-id', $image );
	} else {
    	update_term_meta ( $term_id, 'taxonomy-image-id', '' );
	}
}

add_action('edited_software', 'aces_update_software_image_upload', 10, 2);

/*  Add Software logo End  */

/*  Add Deposit Methods logo Start  */

/* --- Add custom taxonomy field --- */

function aces_add_deposit_method_taxonomy_image($taxonomy) {
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

add_action('deposit-method_add_form_fields', 'aces_add_deposit_method_taxonomy_image', 10, 2);

/* --- Save the custom taxonomy field --- */

function aces_save_deposit_method_taxonomy_image($term_id, $tt_id) {
	if( isset( $_POST['taxonomy-image-id'] ) && '' !== $_POST['taxonomy-image-id'] ){
    	$image = esc_attr( $_POST['taxonomy-image-id'] );
    	add_term_meta( $term_id, 'taxonomy-image-id', $image, true );
	}
}

add_action('created_deposit-method', 'aces_save_deposit_method_taxonomy_image', 10, 2);

/* --- Add custom taxonomy field for edit --- */

function aces_edit_deposit_method_image_upload($term, $taxonomy) {
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

add_action('deposit-method_edit_form_fields', 'aces_edit_deposit_method_image_upload', 10, 2);

/* --- Save the edited value of the custom taxonomy field --- */

function aces_update_deposit_method_image_upload($term_id, $tt_id) {
	if( isset( $_POST['taxonomy-image-id'] ) && '' !== $_POST['taxonomy-image-id'] ){
    	$image = esc_attr( $_POST['taxonomy-image-id'] );
    	update_term_meta ( $term_id, 'taxonomy-image-id', $image );
	} else {
    	update_term_meta ( $term_id, 'taxonomy-image-id', '' );
	}
}

add_action('edited_deposit-method', 'aces_update_deposit_method_image_upload', 10, 2);

/*  Add Deposit Methods logo End  */

/*  Add Withdrawal Methods logo Start  */

/* --- Add custom taxonomy field --- */

function aces_add_withdrawal_method_taxonomy_image($taxonomy) {
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

add_action('withdrawal-method_add_form_fields', 'aces_add_withdrawal_method_taxonomy_image', 10, 2);

/* --- Save the custom taxonomy field --- */

function aces_save_withdrawal_method_taxonomy_image($term_id, $tt_id) {
	if( isset( $_POST['taxonomy-image-id'] ) && '' !== $_POST['taxonomy-image-id'] ){
    	$image = esc_attr( $_POST['taxonomy-image-id'] );
    	add_term_meta( $term_id, 'taxonomy-image-id', $image, true );
	}
}

add_action('created_withdrawal-method', 'aces_save_withdrawal_method_taxonomy_image', 10, 2);

/* --- Add custom taxonomy field for edit --- */

function aces_edit_withdrawal_method_image_upload($term, $taxonomy) {
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

add_action('withdrawal-method_edit_form_fields', 'aces_edit_withdrawal_method_image_upload', 10, 2);

/* --- Save the edited value of the custom taxonomy field --- */

function aces_update_withdrawal_method_image_upload($term_id, $tt_id) {
	if( isset( $_POST['taxonomy-image-id'] ) && '' !== $_POST['taxonomy-image-id'] ){
    	$image = esc_attr( $_POST['taxonomy-image-id'] );
    	update_term_meta ( $term_id, 'taxonomy-image-id', $image );
	} else {
    	update_term_meta ( $term_id, 'taxonomy-image-id', '' );
	}
}

add_action('edited_withdrawal-method', 'aces_update_withdrawal_method_image_upload', 10, 2);

/*  Add Withdrawal Methods logo End  */

/*  Add Withdrawal Limits logo Start  */

/* --- Add custom taxonomy field --- */

function aces_add_withdrawal_limit_taxonomy_image($taxonomy) {
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

add_action('withdrawal-limit_add_form_fields', 'aces_add_withdrawal_limit_taxonomy_image', 10, 2);

/* --- Save the custom taxonomy field --- */

function aces_save_withdrawal_limit_taxonomy_image($term_id, $tt_id) {
	if( isset( $_POST['taxonomy-image-id'] ) && '' !== $_POST['taxonomy-image-id'] ){
    	$image = esc_attr( $_POST['taxonomy-image-id'] );
    	add_term_meta( $term_id, 'taxonomy-image-id', $image, true );
	}
}

add_action('created_withdrawal-limit', 'aces_save_withdrawal_limit_taxonomy_image', 10, 2);

/* --- Add custom taxonomy field for edit --- */

function aces_edit_withdrawal_limit_image_upload($term, $taxonomy) {
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

add_action('withdrawal-limit_edit_form_fields', 'aces_edit_withdrawal_limit_image_upload', 10, 2);

/* --- Save the edited value of the custom taxonomy field --- */

function aces_update_withdrawal_limit_image_upload($term_id, $tt_id) {
	if( isset( $_POST['taxonomy-image-id'] ) && '' !== $_POST['taxonomy-image-id'] ){
    	$image = esc_attr( $_POST['taxonomy-image-id'] );
    	update_term_meta ( $term_id, 'taxonomy-image-id', $image );
	} else {
    	update_term_meta ( $term_id, 'taxonomy-image-id', '' );
	}
}

add_action('edited_withdrawal-limit', 'aces_update_withdrawal_limit_image_upload', 10, 2);

/*  Add Withdrawal Methods logo End  */

/*  Add country code field to Restricted Countries Start  */

/* --- Add custom taxonomy field --- */

function aces_add_restricted_countries_country_code($taxonomy) {
?>
<div class="form-field term-group">
    <label for="aces_country_code">
    	<?php esc_html_e('Country code', 'aces'); ?>
    </label>
    <input type="text" id="aces_country_code" name="aces_country_code" class="regular-text" value="" maxlength="2" style="text-transform: uppercase;">
    <p>
    	<?php esc_html_e( 'For example, for the', 'aces' ); ?> <strong><?php esc_html_e( 'United States', 'aces' ); ?></strong> - <strong><?php esc_html_e( 'US', 'aces' ); ?></strong> <?php esc_html_e( 'code', 'aces' ); ?>. <a href="https://en.wikipedia.org/wiki/ISO_3166-1_alpha-2" title="<?php esc_attr_e( 'ISO 3166-1 alpha-2 country codes', 'aces' ); ?>" target="_blank"><?php esc_html_e( 'ISO 3166-1 alpha-2 country codes', 'aces' ); ?></a>
    </p>
</div>
<?php
}

add_action('restricted-country_add_form_fields', 'aces_add_restricted_countries_country_code', 10, 2);

/* --- Save the custom taxonomy field --- */

function aces_save_restricted_countries_country_code($term_id, $tt_id) {
	if( isset( $_POST['aces_country_code'] ) && '' !== $_POST['aces_country_code'] ){
    	$country_code = esc_attr( $_POST['aces_country_code'] );
    	add_term_meta( $term_id, 'aces_country_code', $country_code, true );
	}
}

add_action('created_restricted-country', 'aces_save_restricted_countries_country_code', 10, 2);

/* --- Add custom taxonomy field for edit --- */

function aces_edit_restricted_countries_country_code($term, $taxonomy) {
?>
<tr class="form-field term-group-wrap">
    <th scope="row">
    	<label for="aces_country_code">
    		<?php esc_html_e( 'Country code', 'aces' ); ?>
    	</label>
    </th>
    <td>
    	<?php $country_code = get_term_meta ( $term->term_id, 'aces_country_code', true ); ?>
    	<input type="text" id="aces_country_code" name="aces_country_code" value="<?php echo esc_attr( $country_code ); ?>" maxlength="2" style="text-transform: uppercase;">
    	<p class="description">
	    	<?php esc_html_e( 'For example, for the', 'aces' ); ?> <strong><?php esc_html_e( 'United States', 'aces' ); ?></strong> - <strong><?php esc_html_e( 'US', 'aces' ); ?></strong> <?php esc_html_e( 'code', 'aces' ); ?>. <a href="https://en.wikipedia.org/wiki/ISO_3166-1_alpha-2" title="<?php esc_attr_e( 'ISO 3166-1 alpha-2 country codes', 'aces' ); ?>" target="_blank"><?php esc_html_e( 'ISO 3166-1 alpha-2 country codes', 'aces' ); ?></a>
	    </p>
    </td>
</tr>
<?php
}

add_action('restricted-country_edit_form_fields', 'aces_edit_restricted_countries_country_code', 10, 2);

/* --- Save the edited value of the custom taxonomy field --- */

function aces_update_restricted_countries_country_code($term_id, $tt_id) {
	if( isset( $_POST['aces_country_code'] ) && '' !== $_POST['aces_country_code'] ){
    	$country_code = esc_attr( $_POST['aces_country_code'] );
    	update_term_meta ( $term_id, 'aces_country_code', $country_code );
	} else {
    	update_term_meta ( $term_id, 'aces_country_code', '' );
	}
}

add_action('edited_restricted-country', 'aces_update_restricted_countries_country_code', 10, 2);

/*  Add country code field to Restricted Countries End  */

/*  Add Restricted Countries flag Start  */

/* --- Add custom taxonomy field --- */

function aces_add_restricted_countries_taxonomy_image($taxonomy) {
?>
<div class="form-field term-group">
    <label for="taxonomy-image-id">
    	<?php esc_html_e('Flag', 'aces'); ?>
    </label>
    <input type="hidden" id="taxonomy-image-id" name="taxonomy-image-id" class="custom_media_url" value="">
    <div id="taxonomy-image-wrapper"></div>
    <p>
	    <input type="button" class="button button-secondary aces_media_button" id="aces_media_button" name="aces_media_button" value="<?php esc_attr_e( 'Add Flag', 'aces' ); ?>" />
	    <input type="button" class="button button-secondary aces_media_remove" id="aces_media_remove" name="aces_media_remove" value="<?php esc_attr_e( 'Remove Flag', 'aces' ); ?>" />
    </p>
</div>
<?php
}

add_action('restricted-country_add_form_fields', 'aces_add_restricted_countries_taxonomy_image', 10, 2);

/* --- Save the custom taxonomy field --- */

function aces_save_restricted_countries_taxonomy_image($term_id, $tt_id) {
	if( isset( $_POST['taxonomy-image-id'] ) && '' !== $_POST['taxonomy-image-id'] ){
    	$image = esc_attr( $_POST['taxonomy-image-id'] );
    	add_term_meta( $term_id, 'taxonomy-image-id', $image, true );
	}
}

add_action('created_restricted-country', 'aces_save_restricted_countries_taxonomy_image', 10, 2);

/* --- Add custom taxonomy field for edit --- */

function aces_edit_restricted_countries_image_upload($term, $taxonomy) {
?>
<tr class="form-field term-group-wrap">
    <th scope="row">
    	<label for="taxonomy-image-id">
    		<?php esc_html_e( 'Flag', 'aces' ); ?>
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
	        <input type="button" class="button button-secondary aces_media_button" id="aces_media_button" name="aces_media_button" value="<?php esc_attr_e( 'Add Flag', 'aces' ); ?>" />
	        <input type="button" class="button button-secondary aces_media_remove" id="aces_media_remove" name="aces_media_remove" value="<?php esc_attr_e( 'Remove Flag', 'aces' ); ?>" />
    	</p>
    </td>
</tr>
<?php
}

add_action('restricted-country_edit_form_fields', 'aces_edit_restricted_countries_image_upload', 10, 2);

/* --- Save the edited value of the custom taxonomy field --- */

function aces_update_restricted_countries_image_upload($term_id, $tt_id) {
	if( isset( $_POST['taxonomy-image-id'] ) && '' !== $_POST['taxonomy-image-id'] ){
    	$image = esc_attr( $_POST['taxonomy-image-id'] );
    	update_term_meta ( $term_id, 'taxonomy-image-id', $image );
	} else {
    	update_term_meta ( $term_id, 'taxonomy-image-id', '' );
	}
}

add_action('edited_restricted-country', 'aces_update_restricted_countries_image_upload', 10, 2);

/*  Add Restricted Countries flag End  */

/*  Add Licences logo Start  */

/* --- Add custom taxonomy field --- */

function aces_add_licence_taxonomy_image($taxonomy) {
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

add_action('licence_add_form_fields', 'aces_add_licence_taxonomy_image', 10, 2);

/* --- Save the custom taxonomy field --- */

function aces_save_licence_taxonomy_image($term_id, $tt_id) {
	if( isset( $_POST['taxonomy-image-id'] ) && '' !== $_POST['taxonomy-image-id'] ){
    	$image = esc_attr( $_POST['taxonomy-image-id'] );
    	add_term_meta( $term_id, 'taxonomy-image-id', $image, true );
	}
}

add_action('created_licence', 'aces_save_licence_taxonomy_image', 10, 2);

/* --- Add custom taxonomy field for edit --- */

function aces_edit_licence_image_upload($term, $taxonomy) {
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

add_action('licence_edit_form_fields', 'aces_edit_licence_image_upload', 10, 2);

/* --- Save the edited value of the custom taxonomy field --- */

function aces_update_licence_image_upload($term_id, $tt_id) {
	if( isset( $_POST['taxonomy-image-id'] ) && '' !== $_POST['taxonomy-image-id'] ){
    	$image = esc_attr( $_POST['taxonomy-image-id'] );
    	update_term_meta ( $term_id, 'taxonomy-image-id', $image );
	} else {
    	update_term_meta ( $term_id, 'taxonomy-image-id', '' );
	}
}

add_action('edited_licence', 'aces_update_licence_image_upload', 10, 2);

/*  Add Licences logo End  */

/*  Add Languages logo Start  */

/* --- Add custom taxonomy field --- */

function aces_add_language_taxonomy_image($taxonomy) {
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

add_action('language_add_form_fields', 'aces_add_language_taxonomy_image', 10, 2);

/* --- Save the custom taxonomy field --- */

function aces_save_language_taxonomy_image($term_id, $tt_id) {
	if( isset( $_POST['taxonomy-image-id'] ) && '' !== $_POST['taxonomy-image-id'] ){
    	$image = esc_attr( $_POST['taxonomy-image-id'] );
    	add_term_meta( $term_id, 'taxonomy-image-id', $image, true );
	}
}

add_action('created_language', 'aces_save_language_taxonomy_image', 10, 2);

/* --- Add custom taxonomy field for edit --- */

function aces_edit_language_image_upload($term, $taxonomy) {
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

add_action('language_edit_form_fields', 'aces_edit_language_image_upload', 10, 2);

/* --- Save the edited value of the custom taxonomy field --- */

function aces_update_language_image_upload($term_id, $tt_id) {
	if( isset( $_POST['taxonomy-image-id'] ) && '' !== $_POST['taxonomy-image-id'] ){
    	$image = esc_attr( $_POST['taxonomy-image-id'] );
    	update_term_meta ( $term_id, 'taxonomy-image-id', $image );
	} else {
    	update_term_meta ( $term_id, 'taxonomy-image-id', '' );
	}
}

add_action('edited_language', 'aces_update_language_image_upload', 10, 2);

/*  Add Languages logo End  */

/*  Add Currencies logo Start  */

/* --- Add custom taxonomy field --- */

function aces_add_currency_taxonomy_image($taxonomy) {
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

add_action('currency_add_form_fields', 'aces_add_currency_taxonomy_image', 10, 2);

/* --- Save the custom taxonomy field --- */

function aces_save_currency_taxonomy_image($term_id, $tt_id) {
	if( isset( $_POST['taxonomy-image-id'] ) && '' !== $_POST['taxonomy-image-id'] ){
    	$image = esc_attr( $_POST['taxonomy-image-id'] );
    	add_term_meta( $term_id, 'taxonomy-image-id', $image, true );
	}
}

add_action('created_currency', 'aces_save_currency_taxonomy_image', 10, 2);

/* --- Add custom taxonomy field for edit --- */

function aces_edit_currency_image_upload($term, $taxonomy) {
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

add_action('currency_edit_form_fields', 'aces_edit_currency_image_upload', 10, 2);

/* --- Save the edited value of the custom taxonomy field --- */

function aces_update_currency_image_upload($term_id, $tt_id) {
	if( isset( $_POST['taxonomy-image-id'] ) && '' !== $_POST['taxonomy-image-id'] ){
    	$image = esc_attr( $_POST['taxonomy-image-id'] );
    	update_term_meta ( $term_id, 'taxonomy-image-id', $image );
	} else {
    	update_term_meta ( $term_id, 'taxonomy-image-id', '' );
	}
}

add_action('edited_currency', 'aces_update_currency_image_upload', 10, 2);

/*  Add Currencies logo End  */