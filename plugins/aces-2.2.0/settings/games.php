<?php

/*  Games settings tab - Start  */

/*  --- The setting sections ---  */

add_settings_section(
    'aces_games_tab_titles',
    esc_html__( 'Titles', 'aces' ),
    'aces_games_tab_titles_callback',
    'aces_games_tab'
);

add_settings_section(
    'aces_games_tab_slugs',
    esc_html__( 'Slugs', 'aces' ),
    'aces_games_tab_slugs_callback',
    'aces_games_tab'
);

add_settings_section(
    'aces_games_tab_other_settings',
    esc_html__( 'Other settings', 'aces' ),
    'aces_games_tab_other_settings_callback',
    'aces_games_tab'
);

/*  --- Descriptions ---  */

function aces_games_tab_titles_callback( $args ) {
    ?>
    <p id="<?php echo esc_attr( $args['id'] ); ?>">
        <?php esc_html_e( 'Here you can change the default titles.', 'aces' ); ?>
    </p>
    <?php
}

function aces_games_tab_slugs_callback( $args ) {
    ?>
    <p id="<?php echo esc_attr( $args['id'] ); ?>">
        <?php esc_html_e( 'Here you can change the default slugs.', 'aces' ); ?><br>
    </p>
    <div class="card">
        <p>
            <strong><?php echo esc_html( 'WARNING:', 'aces' ); ?></strong><br>
            <?php echo esc_html( 'Slugs at custom post types (e.g. Games) and custom taxonomies (e.g. Game Categories) cannot be the same.', 'aces' ); ?>
            <hr>
            <em><?php esc_html_e( 'After saving these settings, please, go to &quot;Settings&quot; - &quot;', 'aces' ); ?><strong><a href="<?php echo esc_url( admin_url( 'options-permalink.php' ) ); ?>" title="<?php esc_attr_e( 'Permalinks', 'aces' ); ?>"><?php esc_html_e( 'Permalinks', 'aces' ); ?></a></strong><?php esc_html_e( '&quot; and click the &quot;Save Changes&quot; button.', 'aces' ); ?> <strong><?php esc_html_e( 'Only after this action, new slugs will work.', 'aces' ); ?></strong></em>
        </p>
    </div>
    <?php
}

function aces_games_tab_other_settings_callback( $args ) {
    ?>
    <p id="<?php echo esc_attr( $args['id'] ); ?>">
        <?php esc_html_e( 'Other settings for games.', 'aces' ); ?>
    </p>
    <?php
}

/*  ----------------

Title setting fields

----------------  */

/*  --- "Games" section title ---  */

add_settings_field(
    'games_section_name',
    esc_html__( 'The title of the &quot;Games&quot; custom post type', 'aces' ),
    'aces_games_textfield_section_name_callback',
    'aces_games_tab',
    'aces_games_tab_titles',
    array(
        'id' => 'games_section_name', 
        'option_name' => 'games_section_name'
    )  
);
register_setting( 'aces_games_tab', 'games_section_name', 'esc_attr');

function aces_games_textfield_section_name_callback($args) {
    $option = esc_attr(get_option($args['option_name']));
    $id = $args['id'];
    $option_name = $args['option_name'];
    ?>
    <input type="text" id="<?php echo esc_attr($id); ?>" name="<?php echo esc_attr($option_name); ?>" value="<?php echo esc_attr($option); ?>" placeholder="<?php echo esc_attr('Default &quot;Games&quot;'); ?>" class="regular-text" />
    <?php
}

/*  --- Game "Categories" taxonomy title ---  */

add_settings_field(
    'games_category_title',
    esc_html__( 'The title of the &quot;Game Categories&quot; custom taxonomy', 'aces' ),
    'aces_games_textfield_category_title_callback',
    'aces_games_tab',
    'aces_games_tab_titles',
    array(
        'id' => 'games_category_title', 
        'option_name' => 'games_category_title'
    )  
);
register_setting( 'aces_games_tab', 'games_category_title', 'esc_attr');

function aces_games_textfield_category_title_callback($args) {
    $option = esc_attr(get_option($args['option_name']));
    $id = $args['id'];
    $option_name = $args['option_name'];
    ?>
    <input type="text" id="<?php echo esc_attr($id); ?>" name="<?php echo esc_attr($option_name); ?>" value="<?php echo esc_attr($option); ?>" placeholder="<?php echo esc_attr('Default &quot;Categories&quot;'); ?>" class="regular-text" />
    <?php
}

/*  --- Game "Vendors" taxonomy title ---  */

add_settings_field(
    'games_vendor_title',
    esc_html__( 'The title of the &quot;Game Vendors&quot; custom taxonomy', 'aces' ),
    'aces_games_textfield_vendor_title_callback',
    'aces_games_tab',
    'aces_games_tab_titles',
    array(
        'id' => 'games_vendor_title', 
        'option_name' => 'games_vendor_title'
    )  
);
register_setting( 'aces_games_tab', 'games_vendor_title', 'esc_attr');

function aces_games_textfield_vendor_title_callback($args) {
    $option = esc_attr(get_option($args['option_name']));
    $id = $args['id'];
    $option_name = $args['option_name'];
    ?>
    <input type="text" id="<?php echo esc_attr($id); ?>" name="<?php echo esc_attr($option_name); ?>" value="<?php echo esc_attr($option); ?>" placeholder="<?php echo esc_attr('Default &quot;Vendors&quot;'); ?>" class="regular-text" />
    <?php
}

/*  ---------------

Slug setting fields

---------------  */

/*  --- "Games" section slug ---  */

add_settings_field(
    'games_section_slug',
    esc_html__( 'The slug of the &quot;Games&quot; custom post type', 'aces' ),
    'aces_games_textfield_callback',
    'aces_games_tab',
    'aces_games_tab_slugs',
    array(
        'id' => 'game', 
        'option_name' => 'games_section_slug'
    )  
);
register_setting( 'aces_games_tab', 'games_section_slug', 'esc_attr');

/*  --- Game "Categories" taxonomy slug ---  */

add_settings_field(
    'game_category_slug',
    esc_html__( 'The slug of the &quot;Game Categories&quot; custom taxonomy', 'aces' ),
    'aces_games_textfield_callback',
    'aces_games_tab',
    'aces_games_tab_slugs',
    array(
        'id' => 'game-category', 
        'option_name' => 'game_category_slug'
    )   
);
register_setting( 'aces_games_tab', 'game_category_slug', 'esc_attr');

/*  --- Game "Vendors" taxonomy slug ---  */

add_settings_field(
    'game_vendor_slug',
    esc_html__( 'The slug of the &quot;Game Vendors&quot; custom taxonomy', 'aces' ),
    'aces_games_textfield_callback',
    'aces_games_tab',
    'aces_games_tab_slugs',
    array(
        'id' => 'vendor', 
        'option_name' => 'game_vendor_slug'
    )   
);
register_setting( 'aces_games_tab', 'game_vendor_slug', 'esc_attr');

/*  General Text Field Callback (for slugs) Start */

function aces_games_textfield_callback($args) {
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

/*  --- The title "Play Now" button of a game ---  */

add_settings_field(
    'games_play_now_title',
    esc_html__( 'The global title of the &quot;Play Now&quot; button', 'aces' ),
    'aces_games_textfield_play_now_title_callback',
    'aces_games_tab',
    'aces_games_tab_other_settings',
    array(
        'id' => 'games_play_now_title', 
        'option_name' => 'games_play_now_title'
    )  
);
register_setting( 'aces_games_tab', 'games_play_now_title', 'esc_attr');

function aces_games_textfield_play_now_title_callback($args) {
    $option = esc_attr(get_option($args['option_name']));
    $id = $args['id'];
    $option_name = $args['option_name'];
    ?>
    <input type="text" id="<?php echo esc_attr($id); ?>" name="<?php echo esc_attr($option_name); ?>" value="<?php echo esc_attr($option); ?>" placeholder="<?php echo esc_attr('Default &quot;Play Now&quot;'); ?>" class="regular-text" />
    <?php
}

/*  --- The title of the "Pros" block ---  */

add_settings_field(
    'games_pros_title',
    esc_html__( 'The global title of the &quot;Pros&quot; block', 'aces' ),
    'aces_games_textfield_pros_title_callback',
    'aces_games_tab',
    'aces_games_tab_other_settings',
    array(
        'id' => 'games_pros_title', 
        'option_name' => 'games_pros_title'
    )  
);
register_setting( 'aces_games_tab', 'games_pros_title', 'esc_attr');

function aces_games_textfield_pros_title_callback($args) {
    $option = esc_attr(get_option($args['option_name']));
    $id = $args['id'];
    $option_name = $args['option_name'];
    ?>
    <input type="text" id="<?php echo esc_attr($id); ?>" name="<?php echo esc_attr($option_name); ?>" value="<?php echo esc_attr($option); ?>" placeholder="<?php echo esc_attr('Default &quot;Pros&quot;'); ?>" class="regular-text" />
    <?php
}

/*  --- The title of the "Cons" block ---  */

add_settings_field(
    'games_cons_title',
    esc_html__( 'The global title of the &quot;Cons&quot; block', 'aces' ),
    'aces_games_textfield_cons_title_callback',
    'aces_games_tab',
    'aces_games_tab_other_settings',
    array(
        'id' => 'games_cons_title', 
        'option_name' => 'games_cons_title'
    )  
);
register_setting( 'aces_games_tab', 'games_cons_title', 'esc_attr');

function aces_games_textfield_cons_title_callback($args) {
    $option = esc_attr(get_option($args['option_name']));
    $id = $args['id'];
    $option_name = $args['option_name'];
    ?>
    <input type="text" id="<?php echo esc_attr($id); ?>" name="<?php echo esc_attr($option_name); ?>" value="<?php echo esc_attr($option); ?>" placeholder="<?php echo esc_attr('Default &quot;Cons&quot;'); ?>" class="regular-text" />
    <?php
}

/*  Games settings tab - End  */