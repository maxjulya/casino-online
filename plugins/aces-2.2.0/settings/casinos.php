<?php

/*  Casinos settings tab - Start  */

/*  --- The setting sections ---  */

add_settings_section(
    'aces_casinos_tab_titles',
    esc_html__( 'Titles', 'aces' ),
    'aces_casinos_tab_titles_callback',
    'aces_casinos_tab'
);

add_settings_section(
    'aces_casinos_tab_slugs',
    esc_html__( 'Slugs', 'aces' ),
    'aces_casinos_tab_slugs_callback',
    'aces_casinos_tab'
);

add_settings_section(
    'aces_casinos_tab_rating_titles',
    esc_html__( 'Rating titles', 'aces' ),
    'aces_casinos_tab_rating_titles_callback',
    'aces_casinos_tab'
);

add_settings_section(
    'aces_casinos_tab_other_settings',
    esc_html__( 'Other settings', 'aces' ),
    'aces_casinos_tab_other_settings_callback',
    'aces_casinos_tab'
);

/*  --- Descriptions ---  */

function aces_casinos_tab_titles_callback( $args ) {
    ?>
    <p id="<?php echo esc_attr( $args['id'] ); ?>">
        <?php esc_html_e( 'Here you can change the default titles.', 'aces' ); ?>
    </p>
    <?php
}

function aces_casinos_tab_slugs_callback( $args ) {
    ?>
    <p id="<?php echo esc_attr( $args['id'] ); ?>">
        <?php esc_html_e( 'Here you can change the default slugs.', 'aces' ); ?><br>
    </p>
    <div class="card">
        <p>
            <strong><?php echo esc_html( 'WARNING:', 'aces' ); ?></strong><br>
            <?php echo esc_html( 'Slugs at custom post types (e.g. Casinos) and custom taxonomies (e.g. Casino Categories) cannot be the same.', 'aces' ); ?>
            <hr>
            <em><?php esc_html_e( 'After saving these settings, please, go to &quot;Settings&quot; - &quot;', 'aces' ); ?><strong><a href="<?php echo esc_url( admin_url( 'options-permalink.php' ) ); ?>" title="<?php esc_attr_e( 'Permalinks', 'aces' ); ?>"><?php esc_html_e( 'Permalinks', 'aces' ); ?></a></strong><?php esc_html_e( '&quot; and click the &quot;Save Changes&quot; button.', 'aces' ); ?> <strong><?php esc_html_e( 'Only after this action, new slugs will work.', 'aces' ); ?></strong></em>
        </p>
    </div>
    <?php
}

function aces_casinos_tab_rating_titles_callback( $args ) {
    ?>
    <p id="<?php echo esc_attr( $args['id'] ); ?>">
        <?php esc_html_e( 'Here you can change the default titles of the ratings.', 'aces' ); ?>
    </p>
    <?php
}

function aces_casinos_tab_other_settings_callback( $args ) {
    ?>
    <p id="<?php echo esc_attr( $args['id'] ); ?>">
        <?php esc_html_e( 'Other settings for casinos.', 'aces' ); ?>
    </p>
    <?php
}

/*  ----------------

Title setting fields

----------------  */

/*  --- "Casinos" section title ---  */

add_settings_field(
    'casinos_section_name',
    esc_html__( 'The title of the &quot;Casinos&quot; custom post type', 'aces' ),
    'aces_textfield_section_name_callback',
    'aces_casinos_tab',
    'aces_casinos_tab_titles',
    array(
        'id' => 'casinos_section_name', 
        'option_name' => 'casinos_section_name'
    )  
);
register_setting( 'aces_casinos_tab', 'casinos_section_name', 'esc_attr');

function aces_textfield_section_name_callback($args) {
    $option = esc_attr(get_option($args['option_name']));
    $id = $args['id'];
    $option_name = $args['option_name'];
    ?>
    <input type="text" id="<?php echo esc_attr($id); ?>" name="<?php echo esc_attr($option_name); ?>" value="<?php echo esc_attr($option); ?>" placeholder="<?php echo esc_attr('Default &quot;Casinos&quot;'); ?>" class="regular-text" />
    <?php
}

/*  --- The "Categories" custom taxonomy title ---  */

add_settings_field(
    'casinos_category_title',
    esc_html__( 'The title of the &quot;Casino Categories&quot; custom taxonomy', 'aces' ),
    'aces_textfield_category_title_callback',
    'aces_casinos_tab',
    'aces_casinos_tab_titles',
    array(
        'id' => 'casinos_category_title', 
        'option_name' => 'casinos_category_title'
    )  
);
register_setting( 'aces_casinos_tab', 'casinos_category_title', 'esc_attr');

function aces_textfield_category_title_callback($args) {
    $option = esc_attr(get_option($args['option_name']));
    $id = $args['id'];
    $option_name = $args['option_name'];
    ?>
    <input type="text" id="<?php echo esc_attr($id); ?>" name="<?php echo esc_attr($option_name); ?>" value="<?php echo esc_attr($option); ?>" placeholder="<?php echo esc_attr('Default &quot;Categories&quot;'); ?>" class="regular-text" />
    <?php
}

/*  --- The "Software" custom taxonomy title ---  */

add_settings_field(
    'casinos_software_title',
    esc_html__( 'The title of the &quot;Software&quot; custom taxonomy', 'aces' ),
    'aces_textfield_software_title_callback',
    'aces_casinos_tab',
    'aces_casinos_tab_titles',
    array(
        'id' => 'casinos_software_title', 
        'option_name' => 'casinos_software_title'
    )  
);
register_setting( 'aces_casinos_tab', 'casinos_software_title', 'esc_attr');

function aces_textfield_software_title_callback($args) {
    $option = esc_attr(get_option($args['option_name']));
    $id = $args['id'];
    $option_name = $args['option_name'];
    ?>
    <input type="text" id="<?php echo esc_attr($id); ?>" name="<?php echo esc_attr($option_name); ?>" value="<?php echo esc_attr($option); ?>" placeholder="<?php echo esc_attr('Default &quot;Software&quot;'); ?>" class="regular-text" />
    <?php
}

/*  --- The "Deposit Methods" custom taxonomy title ---  */

add_settings_field(
    'casinos_deposit_method_title',
    esc_html__( 'The title of the &quot;Deposit Methods&quot; custom taxonomy', 'aces' ),
    'aces_textfield_deposit_method_title_callback',
    'aces_casinos_tab',
    'aces_casinos_tab_titles',
    array(
        'id' => 'casinos_deposit_method_title', 
        'option_name' => 'casinos_deposit_method_title'
    )  
);
register_setting( 'aces_casinos_tab', 'casinos_deposit_method_title', 'esc_attr');

function aces_textfield_deposit_method_title_callback($args) {
    $option = esc_attr(get_option($args['option_name']));
    $id = $args['id'];
    $option_name = $args['option_name'];
    ?>
    <input type="text" id="<?php echo esc_attr($id); ?>" name="<?php echo esc_attr($option_name); ?>" value="<?php echo esc_attr($option); ?>" placeholder="<?php echo esc_attr('Default &quot;Deposit Methods&quot;'); ?>" class="regular-text" />
    <?php
}

/*  --- The "Withdrawal Methods" custom taxonomy title ---  */

add_settings_field(
    'casinos_withdrawal_method_title',
    esc_html__( 'The title of the &quot;Withdrawal Methods&quot; custom taxonomy', 'aces' ),
    'aces_textfield_withdrawal_method_title_callback',
    'aces_casinos_tab',
    'aces_casinos_tab_titles',
    array(
        'id' => 'casinos_withdrawal_method_title', 
        'option_name' => 'casinos_withdrawal_method_title'
    )  
);
register_setting( 'aces_casinos_tab', 'casinos_withdrawal_method_title', 'esc_attr');

function aces_textfield_withdrawal_method_title_callback($args) {
    $option = esc_attr(get_option($args['option_name']));
    $id = $args['id'];
    $option_name = $args['option_name'];
    ?>
    <input type="text" id="<?php echo esc_attr($id); ?>" name="<?php echo esc_attr($option_name); ?>" value="<?php echo esc_attr($option); ?>" placeholder="<?php echo esc_attr('Default &quot;Withdrawal Methods&quot;'); ?>" class="regular-text" />
    <?php
}

/*  --- The "Withdrawal Limits" custom taxonomy title ---  */

add_settings_field(
    'casinos_withdrawal_limit_title',
    esc_html__( 'The title of the &quot;Withdrawal Limits&quot; custom taxonomy', 'aces' ),
    'aces_textfield_withdrawal_limit_title_callback',
    'aces_casinos_tab',
    'aces_casinos_tab_titles',
    array(
        'id' => 'casinos_withdrawal_limit_title', 
        'option_name' => 'casinos_withdrawal_limit_title'
    )  
);
register_setting( 'aces_casinos_tab', 'casinos_withdrawal_limit_title', 'esc_attr');

function aces_textfield_withdrawal_limit_title_callback($args) {
    $option = esc_attr(get_option($args['option_name']));
    $id = $args['id'];
    $option_name = $args['option_name'];
    ?>
    <input type="text" id="<?php echo esc_attr($id); ?>" name="<?php echo esc_attr($option_name); ?>" value="<?php echo esc_attr($option); ?>" placeholder="<?php echo esc_attr('Default &quot;Withdrawal Limits&quot;'); ?>" class="regular-text" />
    <?php
}

/*  --- The "Restricted Countries" custom taxonomy title ---  */

add_settings_field(
    'casinos_restricted_countries_title',
    esc_html__( 'The title of the &quot;Restricted Countries&quot; custom taxonomy', 'aces' ),
    'aces_textfield_restricted_countries_title_callback',
    'aces_casinos_tab',
    'aces_casinos_tab_titles',
    array(
        'id' => 'casinos_restricted_countries_title', 
        'option_name' => 'casinos_restricted_countries_title'
    )  
);
register_setting( 'aces_casinos_tab', 'casinos_restricted_countries_title', 'esc_attr');

function aces_textfield_restricted_countries_title_callback($args) {
    $option = esc_attr(get_option($args['option_name']));
    $id = $args['id'];
    $option_name = $args['option_name'];
    ?>
    <input type="text" id="<?php echo esc_attr($id); ?>" name="<?php echo esc_attr($option_name); ?>" value="<?php echo esc_attr($option); ?>" placeholder="<?php echo esc_attr('Default &quot;Restricted Countries&quot;'); ?>" class="regular-text" />
    <?php
}

/*  --- The "Licences" custom taxonomy title ---  */

add_settings_field(
    'casinos_licences_title',
    esc_html__( 'The title of the &quot;Licences&quot; custom taxonomy', 'aces' ),
    'aces_textfield_licences_title_callback',
    'aces_casinos_tab',
    'aces_casinos_tab_titles',
    array(
        'id' => 'casinos_licences_title', 
        'option_name' => 'casinos_licences_title'
    )  
);
register_setting( 'aces_casinos_tab', 'casinos_licences_title', 'esc_attr');

function aces_textfield_licences_title_callback($args) {
    $option = esc_attr(get_option($args['option_name']));
    $id = $args['id'];
    $option_name = $args['option_name'];
    ?>
    <input type="text" id="<?php echo esc_attr($id); ?>" name="<?php echo esc_attr($option_name); ?>" value="<?php echo esc_attr($option); ?>" placeholder="<?php echo esc_attr('Default &quot;Licences&quot;'); ?>" class="regular-text" />
    <?php
}

/*  --- The "Languages" custom taxonomy title ---  */

add_settings_field(
    'casinos_languages_title',
    esc_html__( 'The title of the &quot;Languages&quot; custom taxonomy', 'aces' ),
    'aces_textfield_languages_title_callback',
    'aces_casinos_tab',
    'aces_casinos_tab_titles',
    array(
        'id' => 'casinos_languages_title', 
        'option_name' => 'casinos_languages_title'
    )  
);
register_setting( 'aces_casinos_tab', 'casinos_languages_title', 'esc_attr');

function aces_textfield_languages_title_callback($args) {
    $option = esc_attr(get_option($args['option_name']));
    $id = $args['id'];
    $option_name = $args['option_name'];
    ?>
    <input type="text" id="<?php echo esc_attr($id); ?>" name="<?php echo esc_attr($option_name); ?>" value="<?php echo esc_attr($option); ?>" placeholder="<?php echo esc_attr('Default &quot;Languages&quot;'); ?>" class="regular-text" />
    <?php
}

/*  --- The "Currencies" custom taxonomy title ---  */

add_settings_field(
    'casinos_currencies_title',
    esc_html__( 'The title of the &quot;Currencies&quot; custom taxonomy', 'aces' ),
    'aces_textfield_currencies_title_callback',
    'aces_casinos_tab',
    'aces_casinos_tab_titles',
    array(
        'id' => 'casinos_currencies_title', 
        'option_name' => 'casinos_currencies_title'
    )  
);
register_setting( 'aces_casinos_tab', 'casinos_currencies_title', 'esc_attr');

function aces_textfield_currencies_title_callback($args) {
    $option = esc_attr(get_option($args['option_name']));
    $id = $args['id'];
    $option_name = $args['option_name'];
    ?>
    <input type="text" id="<?php echo esc_attr($id); ?>" name="<?php echo esc_attr($option_name); ?>" value="<?php echo esc_attr($option); ?>" placeholder="<?php echo esc_attr('Default &quot;Currencies&quot;'); ?>" class="regular-text" />
    <?php
}

/*  ---------------

Slug setting fields

---------------  */

/*  --- "Casinos" section slug ---  */

add_settings_field(
    'casinos_section_slug',
    esc_html__( 'The slug of the &quot;Casinos&quot; custom post type', 'aces' ),
    'aces_textfield_callback',
    'aces_casinos_tab',
    'aces_casinos_tab_slugs',
    array(
        'id' => 'casino', 
        'option_name' => 'casinos_section_slug'
    )  
);
register_setting( 'aces_casinos_tab', 'casinos_section_slug', 'esc_attr');

/*  --- The "Categories" custom taxonomy slug ---  */

add_settings_field(
    'casino_category_slug',
    esc_html__( 'The slug of the &quot;Casino Categories&quot; custom taxonomy', 'aces' ),
    'aces_textfield_callback',
    'aces_casinos_tab',
    'aces_casinos_tab_slugs',
    array(
        'id' => 'casino-category', 
        'option_name' => 'casino_category_slug'
    )  
);
register_setting( 'aces_casinos_tab', 'casino_category_slug', 'esc_attr');

/*  --- The "Software" custom taxonomy slug ---  */

add_settings_field(
    'casino_software_slug',
    esc_html__( 'The slug of the &quot;Software&quot; custom taxonomy', 'aces' ),
    'aces_textfield_callback',
    'aces_casinos_tab',
    'aces_casinos_tab_slugs',
    array(
        'id' => 'software', 
        'option_name' => 'casino_software_slug'
    )  
);
register_setting( 'aces_casinos_tab', 'casino_software_slug', 'esc_attr');

/*  --- The "Deposit Methods" custom taxonomy slug ---  */

add_settings_field(
    'casino_deposit_method_slug',
    esc_html__( 'The slug of the &quot;Deposit Methods&quot; custom taxonomy', 'aces' ),
    'aces_textfield_callback',
    'aces_casinos_tab',
    'aces_casinos_tab_slugs',
    array(
        'id' => 'deposit-method', 
        'option_name' => 'casino_deposit_method_slug'
    )  
);
register_setting( 'aces_casinos_tab', 'casino_deposit_method_slug', 'esc_attr');

/*  --- The "Withdrawal Methods" custom taxonomy slug ---  */

add_settings_field(
    'casino_withdrawal_method_slug',
    esc_html__( 'The slug of the &quot;Withdrawal Methods&quot; custom taxonomy', 'aces' ),
    'aces_textfield_callback',
    'aces_casinos_tab',
    'aces_casinos_tab_slugs',
    array(
        'id' => 'withdrawal-method', 
        'option_name' => 'casino_withdrawal_method_slug'
    )  
);
register_setting( 'aces_casinos_tab', 'casino_withdrawal_method_slug', 'esc_attr');

/*  --- The "Withdrawal Limits" custom taxonomy slug ---  */

add_settings_field(
    'casino_withdrawal_limit_slug',
    esc_html__( 'The slug of the &quot;Withdrawal Limits&quot; custom taxonomy', 'aces' ),
    'aces_textfield_callback',
    'aces_casinos_tab',
    'aces_casinos_tab_slugs',
    array(
        'id' => 'withdrawal-limit', 
        'option_name' => 'casino_withdrawal_limit_slug'
    )  
);
register_setting( 'aces_casinos_tab', 'casino_withdrawal_limit_slug', 'esc_attr');

/*  --- The "Restricted Countries" custom taxonomy slug ---  */

add_settings_field(
    'casino_restricted_countries_slug',
    esc_html__( 'The slug of the &quot;Restricted Countries&quot; custom taxonomy', 'aces' ),
    'aces_textfield_callback',
    'aces_casinos_tab',
    'aces_casinos_tab_slugs',
    array(
        'id' => 'restricted-country', 
        'option_name' => 'casino_restricted_countries_slug'
    )  
);
register_setting( 'aces_casinos_tab', 'casino_restricted_countries_slug', 'esc_attr');

/*  --- The "Licences" custom taxonomy slug ---  */

add_settings_field(
    'casino_licence_slug',
    esc_html__( 'The slug of the &quot;Licences&quot; custom taxonomy', 'aces' ),
    'aces_textfield_callback',
    'aces_casinos_tab',
    'aces_casinos_tab_slugs',
    array(
        'id' => 'licence', 
        'option_name' => 'casino_licence_slug'
    )  
);
register_setting( 'aces_casinos_tab', 'casino_licence_slug', 'esc_attr');

/*  --- The "Languages" custom taxonomy slug ---  */

add_settings_field(
    'casino_language_slug',
    esc_html__( 'The slug of the &quot;Languages&quot; custom taxonomy', 'aces' ),
    'aces_textfield_callback',
    'aces_casinos_tab',
    'aces_casinos_tab_slugs',
    array(
        'id' => 'language', 
        'option_name' => 'casino_language_slug'
    )  
);
register_setting( 'aces_casinos_tab', 'casino_language_slug', 'esc_attr');

/*  --- The "Currencies" custom taxonomy slug ---  */

add_settings_field(
    'casino_currency_slug',
    esc_html__( 'The slug of the &quot;Currencies&quot; custom taxonomy', 'aces' ),
    'aces_textfield_callback',
    'aces_casinos_tab',
    'aces_casinos_tab_slugs',
    array(
        'id' => 'currency', 
        'option_name' => 'casino_currency_slug'
    )  
);
register_setting( 'aces_casinos_tab', 'casino_currency_slug', 'esc_attr');

/*  General Text Field Callback (for slugs) Start */

function aces_textfield_callback($args) {
    $option = esc_attr(get_option($args['option_name']));
    $id = $args['id'];
    $option_name = $args['option_name'];
    ?>
    <input type="text" id="<?php echo esc_attr($id); ?>" name="<?php echo esc_attr($option_name); ?>" value="<?php echo esc_attr($option); ?>" placeholder="<?php echo esc_attr('Default'); ?> &quot;<?php echo esc_attr($id); ?>&quot;" class="regular-text" />
    <?php
}

/*  General Text Field Callback (for slugs) End */

/*  ------------------------

Rating titles setting fields

------------------------  */

/*  --- Trust & Fairness ---  */

add_settings_field(
    'rating_1',
    esc_html__( 'Trust & Fairness', 'aces' ),
    'aces_textfield_rating_titles_callback',
    'aces_casinos_tab',
    'aces_casinos_tab_rating_titles',
    array(
        'rating_1'
    )  
);
register_setting( 'aces_casinos_tab', 'rating_1', 'esc_attr');

/*  --- Games & Software ---  */

add_settings_field(
    'rating_2',
    esc_html__( 'Games & Software', 'aces' ),
    'aces_textfield_rating_titles_callback',
    'aces_casinos_tab',
    'aces_casinos_tab_rating_titles',
    array(
        'rating_2'
    )  
);
register_setting( 'aces_casinos_tab', 'rating_2', 'esc_attr');

/*  --- Bonuses & Promotions ---  */

add_settings_field(
    'rating_3',
    esc_html__( 'Bonuses & Promotions', 'aces' ),
    'aces_textfield_rating_titles_callback',
    'aces_casinos_tab',
    'aces_casinos_tab_rating_titles',
    array(
        'rating_3'
    )  
);
register_setting( 'aces_casinos_tab', 'rating_3', 'esc_attr');

/*  --- Customer Support ---  */

add_settings_field(
    'rating_4',
    esc_html__( 'Customer Support', 'aces' ),
    'aces_textfield_rating_titles_callback',
    'aces_casinos_tab',
    'aces_casinos_tab_rating_titles',
    array(
        'rating_4'
    )  
);
register_setting( 'aces_casinos_tab', 'rating_4', 'esc_attr');

/*  --- Overall Rating ---  */

add_settings_field(
    'rating_overall',
    esc_html__( 'Overall Rating', 'aces' ),
    'aces_textfield_rating_titles_callback',
    'aces_casinos_tab',
    'aces_casinos_tab_rating_titles',
    array(
        'rating_overall'
    )  
);
register_setting( 'aces_casinos_tab', 'rating_overall', 'esc_attr');

/*  General Text Field Callback (for rating titles) Start */

function aces_textfield_rating_titles_callback($args) {
    $option = esc_attr(get_option($args[0]));
    ?>
    <input type="text" id="<?php echo esc_attr($args[0]); ?>" name="<?php echo esc_attr($args[0]); ?>" value="<?php echo esc_attr($option); ?>"  class="regular-text" />
    <?php
}

/*  General Text Field Callback (for rating titles) End */

/*  ----------------

Other settings fields

----------------  */

/*  --- The title "Play Now" button of a casino ---  */

add_settings_field(
    'casinos_play_now_title',
    esc_html__( 'The global title of the &quot;Play Now&quot; button', 'aces' ),
    'aces_textfield_play_now_title_callback',
    'aces_casinos_tab',
    'aces_casinos_tab_other_settings',
    array(
        'id' => 'casinos_play_now_title', 
        'option_name' => 'casinos_play_now_title'
    )  
);
register_setting( 'aces_casinos_tab', 'casinos_play_now_title', 'esc_attr');

function aces_textfield_play_now_title_callback($args) {
    $option = esc_attr(get_option($args['option_name']));
    $id = $args['id'];
    $option_name = $args['option_name'];
    ?>
    <input type="text" id="<?php echo esc_attr($id); ?>" name="<?php echo esc_attr($option_name); ?>" value="<?php echo esc_attr($option); ?>" placeholder="<?php echo esc_attr('Default &quot;Play Now&quot;'); ?>" class="regular-text" />
    <?php
}

/*  --- The title of the "Pros" block ---  */

add_settings_field(
    'casinos_pros_title',
    esc_html__( 'The global title of the &quot;Pros&quot; block', 'aces' ),
    'aces_textfield_pros_title_callback',
    'aces_casinos_tab',
    'aces_casinos_tab_other_settings',
    array(
        'id' => 'casinos_pros_title', 
        'option_name' => 'casinos_pros_title'
    )  
);
register_setting( 'aces_casinos_tab', 'casinos_pros_title', 'esc_attr');

function aces_textfield_pros_title_callback($args) {
    $option = esc_attr(get_option($args['option_name']));
    $id = $args['id'];
    $option_name = $args['option_name'];
    ?>
    <input type="text" id="<?php echo esc_attr($id); ?>" name="<?php echo esc_attr($option_name); ?>" value="<?php echo esc_attr($option); ?>" placeholder="<?php echo esc_attr('Default &quot;Pros&quot;'); ?>" class="regular-text" />
    <?php
}

/*  --- The title of the "Cons" block ---  */

add_settings_field(
    'casinos_cons_title',
    esc_html__( 'The global title of the &quot;Cons&quot; block', 'aces' ),
    'aces_textfield_cons_title_callback',
    'aces_casinos_tab',
    'aces_casinos_tab_other_settings',
    array(
        'id' => 'casinos_cons_title', 
        'option_name' => 'casinos_cons_title'
    )  
);
register_setting( 'aces_casinos_tab', 'casinos_cons_title', 'esc_attr');

function aces_textfield_cons_title_callback($args) {
    $option = esc_attr(get_option($args['option_name']));
    $id = $args['id'];
    $option_name = $args['option_name'];
    ?>
    <input type="text" id="<?php echo esc_attr($id); ?>" name="<?php echo esc_attr($option_name); ?>" value="<?php echo esc_attr($option); ?>" placeholder="<?php echo esc_attr('Default &quot;Cons&quot;'); ?>" class="regular-text" />
    <?php
}

/*  Casinos settings tab - End  */