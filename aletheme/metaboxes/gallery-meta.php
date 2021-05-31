<?php

function add_gallery_metabox($post_type) {
	$types = array('works', 'post');
	if (in_array($post_type, $types)) {
		add_meta_box(
			'gallery-metabox',
			esc_html__('Gallery Images','gardener'),
			'gallery_meta_callback',
			$post_type,
			'normal',
			'high'
		);
	}
}
add_action('add_meta_boxes', 'add_gallery_metabox');

function gallery_meta_callback($post) {
	wp_nonce_field( basename(__FILE__), 'gallery_meta_nonce' );
	$ids = get_post_meta($post->ID, 'ale_gallery_id', true);
	?>
	<table class="form-table">
		<tr><td>
				<a class="gallery-add button" href="#" data-uploader-title="<?php echo esc_html_e('Add image(s) to gallery','gardener'); ?>" data-uploader-button-text="<?php echo esc_html_e('Add image(s)','gardener'); ?>"><i class="fa fa-picture-o" aria-hidden="true"></i> <?php echo esc_html_e('Add image(s)','gardener'); ?></a>

				<ul id="gallery-metabox-list" class="gallery_metabox_list">
					<?php if ($ids) : foreach ($ids as $key => $value) : $image = wp_get_attachment_image_src($value); ?>

						<li class="image_holder">
							<input type="hidden" name="ale_gallery_id[<?php echo esc_attr($key); ?>]" value="<?php echo esc_attr($value); ?>">
							<img class="image-preview" src="<?php echo esc_url($image[0]); ?>">
							<div class="buttons_manage">
								<a class="change-image button button-primary button-medium" href="#" data-uploader-title="<?php echo esc_html_e('Change image','gardener'); ?>" data-uploader-button-text="Change image"><i class="fa fa-pencil" aria-hidden="true"></i></a>
								<a class="remove-image button button-primary button-medium" href="#"><i class="fa fa-trash" aria-hidden="true"></i></a>
							</div>
						</li>

					<?php endforeach; endif; ?>
				</ul>

			</td></tr>
	</table>
<?php }
function gallery_meta_save($post_id) {
	if (!isset($_POST['gallery_meta_nonce']) || !wp_verify_nonce($_POST['gallery_meta_nonce'], basename(__FILE__))) return;
	if (!current_user_can('edit_post', $post_id)) return;
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
	if(isset($_POST['ale_gallery_id'])) {
		update_post_meta($post_id, 'ale_gallery_id', $_POST['ale_gallery_id']);
	} else {
		delete_post_meta($post_id, 'ale_gallery_id');
	}
}
add_action('save_post', 'gallery_meta_save');