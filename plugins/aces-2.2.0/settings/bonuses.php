<?php

/*  Bonuses settings tab - Start  */

/*  --- The setting sections ---  */

add_settings_section(
    'aces_bonuses_tab_titles',
    esc_html__( 'Titles', 'aces' ),
    'aces_bonuses_tab_titles_callback',
    'aces_bonuses_tab'
);

add_settings_section(
    'aces_bonuses_tab_slugs',
    esc_html__( 'Slugs', 'aces' ),
    'aces_bonuses_tab_slugs_callback',
    'aces_bonuses_tab'
);

add_settings_section(
    'aces_bonuses_tab_other_settings',
    esc_html__( 'Other settings', 'aces' ),
    'aces_bonuses_tab_other_settings_callback',
    'aces_bonuses_tab'
);

/*  --- Descriptions ---  */

function aces_bonuses_tab_titles_callback( $args ) {
    ?>
    <p id="<?php echo esc_attr( $args['id'] ); ?>">
        <?php esc_html_e( 'Here you can change the default titles.', 'aces' ); ?>
    </p>
    <?php
}

function aces_bonuses_tab_slugs_callback( $args ) {
    ?>
    <p id="<?php echo esc_attr( $args['id'] ); ?>">
        <?php esc_html_e( 'Here you can change the default slugs.', 'aces' ); ?><br>
    </p>
    <div class="card">
        <p>
            <strong><?php echo esc_html( 'WARNING:', 'aces' ); ?></strong><br>
            <?php echo esc_html( 'Slugs at custom post types (e.g. Bonuses) and custom taxonomies (e.g. Bonus Categories) cannot be the same.', 'aces' ); ?>
            <hr>
            <em><?php esc_html_e( 'After saving these settings, please, go to &quot;Settings&quot; - &quot;', 'aces' ); ?><strong><a href="<?php echo esc_url( admin_url( 'options-permalink.php' ) ); ?>" title="<?php esc_attr_e( 'Permalinks', 'aces' ); ?>"><?php esc_html_e( 'Permalinks', 'aces' ); ?></a></strong><?php esc_html_e( '&quot; and click the &quot;Save Changes&quot; button.', 'aces' ); ?> <strong><?php esc_html_e( 'Only after this action, new slugs will work.', 'aces' ); ?></strong></em>
        </p>
    </div>
    <?php
}

function aces_bonuses_tab_other_settings_callback( $args ) {
    ?>
    <p id="<?php echo esc_attr( $args['id'] ); ?>">
        <?php esc_html_e( 'Other settings for bonuses.', 'aces' ); ?>
    </p>
    <?php
}

/*  ----------------

Title setting fields

----------------  */

/*  --- "Bonuses" section title ---  */

add_settings_field(
    'bonuses_section_name',
    esc_html__( 'The title of the &quot;Bonuses&quot; custom post type', 'aces' ),
    'aces_bonuses_textfield_section_name_callback',
    'aces_bonuses_tab',
    'aces_bonuses_tab_titles',
    array(
        'id' => 'bonuses_section_name', 
        'option_name' => 'bonuses_section_name'
    )  
);
register_setting( 'aces_bonuses_tab', 'bonuses_section_name', 'esc_attr');

function aces_bonuses_textfield_section_name_callback($args) {
    $option = esc_attr(get_option($args['option_name']));
    $id = $args['id'];
    $option_name = $args['option_name'];
    ?>
    <input type="text" id="<?php echo esc_attr($id); ?>" name="<?php echo esc_attr($option_name); ?>" value="<?php echo esc_attr($option); ?>" placeholder="<?php echo esc_attr('Default &quot;Bonuses&quot;'); ?>" class="regular-text" />
    <?php
}

/*  --- Bonus "Categories" taxonomy title ---  */

add_settings_field(
    'bonuses_category_title',
    esc_html__( 'The title of the &quot;Bonus Categories&quot; custom taxonomy', 'aces' ),
    'aces_bonuses_textfield_category_title_callback',
    'aces_bonuses_tab',
    'aces_bonuses_tab_titles',
    array(
        'id' => 'bonuses_category_title', 
        'option_name' => 'bonuses_category_title'
    )  
);
register_setting( 'aces_bonuses_tab', 'bonuses_category_title', 'esc_attr');

function aces_bonuses_textfield_category_title_callback($args) {
    $option = esc_attr(get_option($args['option_name']));
    $id = $args['id'];
    $option_name = $args['option_name'];
    ?>
    <input type="text" id="<?php echo esc_attr($id); ?>" name="<?php echo esc_attr($option_name); ?>" value="<?php echo esc_attr($option); ?>" placeholder="<?php echo esc_attr('Default &quot;Categories&quot;'); ?>" class="regular-text" />
    <?php
}

/*  ---------------

Slug setting fields

---------------  */

/*  --- "Bonuses" section slug ---  */

add_settings_field(
    'bonuses_section_slug',
    esc_html__( 'The slug of the &quot;Bonuses&quot; custom post type', 'aces' ),
    'aces_bonuses_textfield_callback',
    'aces_bonuses_tab',
    'aces_bonuses_tab_slugs',
    array(
        'id' => 'bonus', 
        'option_name' => 'bonuses_section_slug'
    )  
);
register_setting( 'aces_bonuses_tab', 'bonuses_section_slug', 'esc_attr');

/*  --- Bonus "Categories" taxonomy slug ---  */

add_settings_field(
    'bonus_category_slug',
    esc_html__( 'The slug of the &quot;Bonus Categories&quot; custom taxonomy', 'aces' ),
    'aces_bonuses_textfield_callback',
    'aces_bonuses_tab',
    'aces_bonuses_tab_slugs',
    array(
        'id' => 'bonus-category', 
        'option_name' => 'bonus_category_slug'
    )   
);
register_setting( 'aces_bonuses_tab', 'bonus_category_slug', 'esc_attr');

/*  General Text Field Callback (for slugs) Start */

function aces_bonuses_textfield_callback($args) {
    $option = esc_attr(get_option($args['option_name']));
    $id = $args['id'];
    $option_name = $args['option_name'];
    ?>
    <input type="text" id="<?php echo esc_attr($id); ?>" name="<?php echo esc_attr($option_name); ?>" value="<?php echo esc_attr($option); ?>" placeholder="<?php echo esc_attr('Default'); ?> &quot;<?php echo esc_attr($id); ?>&quot;" class="regular-text" />
    <?php
}

/*  General Text Field Callback (for slugs) End */

/*  ----------------

Other settings fields

----------------  */

/*  --- The title "Get Bonus" button of a game ---  */

add_settings_field(
    'bonuses_get_bonus_title',
    esc_html__( 'The global title of the &quot;Get Bonus&quot; button', 'aces' ),
    'aces_bonuses_textfield_get_bonus_title_callback',
    'aces_bonuses_tab',
    'aces_bonuses_tab_other_settings',
    array(
        'id' => 'bonuses_get_bonus_title', 
        'option_name' => 'bonuses_get_bonus_title'
    )  
);
register_setting( 'aces_bonuses_tab', 'bonuses_get_bonus_title', 'esc_attr');

function aces_bonuses_textfield_get_bonus_title_callback($args) {
    $option = esc_attr(get_option($args['option_name']));
    $id = $args['id'];
    $option_name = $args['option_name'];
    ?>
    <input type="text" id="<?php echo esc_attr($id); ?>" name="<?php echo esc_attr($option_name); ?>" value="<?php echo esc_attr($option); ?>" placeholder="<?php echo esc_attr('Default &quot;Get Bonus&quot;'); ?>" class="regular-text" />
    <?php
}

/*  Bonuses settings tab - End  */