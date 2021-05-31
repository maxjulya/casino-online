<?php

/*  Bonuses - Post Type Start */

add_action('init', 'aces_bonuses', 0 );

function aces_bonuses() {

	$bonus_slug = 'bonus';
	if ( get_option( 'bonuses_section_slug') ) {
		$bonus_slug = get_option( 'bonuses_section_slug', 'bonus' );
	}

	$bonus_name = esc_html__('Бонусы', 'aces');
	if ( get_option( 'bonuses_section_name') ) {
		$bonus_name = get_option( 'bonuses_section_name', 'Бонусы' );
	}

	$args = array(
        'labels' => array(
			'name' => $bonus_name,
			'add_new' => esc_html__('Добавить Новый', 'aces'),
            'edit_item' => esc_html__('Edit Item', 'aces'),
            'add_new_item' => esc_html__('Add New', 'aces'),
            'view_item' => esc_html__('View Item', 'aces'),
        ),
        'singular_label' => __('bonus'),
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
			'slug' => $bonus_slug,
			'with_front' => false
		)
    );

register_post_type( 'bonus' , $args );

/* --- Category: Custom Taxonomy --- */

$bonuses_category_title = esc_html__('Категории', 'aces');
if ( get_option( 'bonuses_category_title') ) {
	$bonuses_category_title = get_option( 'bonuses_category_title', 'Категории' );
}

$labels = array(
	'name' => $bonuses_category_title,
    'singular_name' => esc_html__('Таксономия', 'aces'),
    'search_items' => esc_html__('Найти Таксономию', 'aces'),
    'all_items' => esc_html__('Все ', 'aces') . $bonuses_category_title,
    'parent_item' => esc_html__('Родительская Таксономия', 'aces'),
    'parent_item_colon' => esc_html__('Родительская Таксономия:', 'aces'),
    'edit_item' => esc_html__('Редактировать Таксономию', 'aces'),
    'update_item' => esc_html__('Обновить Таксономию', 'aces'),
    'add_new_item' => esc_html__('Добавить новую Таксономию', 'aces'),
    'new_item_name' => esc_html__('Таксономия', 'aces'),
	'menu_name' => $bonuses_category_title
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

register_taxonomy('bonus-category', 'bonus', $args);

}

/* --- Add custom slug for taxonomy 'bonus-category' --- */

if ( get_option( 'bonus_category_slug') ) {

	function aces_change_bonus_category_slug( $taxonomy, $object_type, $args ) {

		$bonus_category_slug = 'bonus-category';

		if ( get_option( 'bonus_category_slug') ) {
			$bonus_category_slug = get_option( 'bonus_category_slug', 'bonus-category' );
		}

	    if( 'bonus-category' == $taxonomy ) {
	        remove_action( current_action(), __FUNCTION__ );
	        $args['rewrite'] = array( 'slug' => $bonus_category_slug );
	        register_taxonomy( $taxonomy, $object_type, $args );
	    }

	}
	add_action( 'registered_taxonomy', 'aces_change_bonus_category_slug', 10, 3 );

}

/*  Bonuses - Post Type End */

/*  Relationship of the Bonus and Casino Start  */

add_action( 'admin_init', 'aces_bonuses_casinos_list' );

function aces_bonuses_casinos_list() {
    add_meta_box( 'aces_bonuses_casinos_list_meta_box',
        esc_html__( 'Казино', 'aces' ),
        'aces_bonuses_display_casinos_list_meta_box',
        'bonus', 'side', 'high'
    );
}

function aces_bonuses_display_casinos_list_meta_box( $bonus ) {
    wp_nonce_field( basename(__FILE__), 'bonus_custom_nonce' );

    $postmeta = get_post_meta( $bonus->ID, 'bonus_parent_casino', true );
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
	            <input type="checkbox" name="bonus_casino_item[]" value="<?php esc_attr_e($id);?>" <?php esc_attr_e($checked); ?>>
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

add_action( 'save_post', 'aces_bonuses_casinos_save_fields', 10, 2 );

function aces_bonuses_casinos_save_fields( $post_id ) {
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'bonus_custom_nonce' ] ) && wp_verify_nonce( $_POST[ 'bonus_custom_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';

    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }

    // If the checkbox was not empty, save it as array in post meta
    if ( ! empty( $_POST['bonus_casino_item'] ) ) {
        update_post_meta( $post_id, 'bonus_parent_casino', $_POST['bonus_casino_item'] );

    // Otherwise just delete it if its blank value.
    } else {
        delete_post_meta( $post_id, 'bonus_parent_casino' );
    }

};

/*  Relationship of the Bonus and Casino End  */