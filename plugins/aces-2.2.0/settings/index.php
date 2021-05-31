<?php

/*  Aces Settings Init Start */

function aces_settings_init() {

    /*  ---  Casinos  ---  */

    include_once ABSPATH . '/wp-content/plugins/aces/settings/casinos.php';

    /*  ---  Games  ---  */

    include_once ABSPATH . '/wp-content/plugins/aces/settings/games.php';

    /*  ---  Bonuses  ---  */

    include_once ABSPATH . '/wp-content/plugins/aces/settings/bonuses.php';

    /*  ---  Geolocation  ---  */

    include_once ABSPATH . '/wp-content/plugins/aces/settings/geolocation.php';

}

add_action( 'admin_init', 'aces_settings_init' );

/*  Aces Settings Init End */
 
/*  Aces Options Menu Item Start */

function aces_options_page() {
	add_menu_page(
		esc_html__( 'ACES', 'aces' ),
		esc_html__( 'ACES Options', 'aces' ),
		'manage_options',
		'aces',
		'aces_options_page_html',
		plugins_url( 'aces/images/menu-icon.png' ),
        59
	);
}
add_action( 'admin_menu', 'aces_options_page' );

/*  Aces Options Menu Item End */

/*  Aces Options Page Start */

function aces_options_page_html() {

if ( ! current_user_can( 'manage_options' ) ) {
	return;
}

if ( isset( $_GET['settings-updated'] ) ) {
	add_settings_error( 'aces_messages', 'aces_message', esc_html__( 'Settings Saved', 'aces' ), 'updated' );
}

settings_errors( 'aces_messages' );

if( isset( $_GET[ 'tab' ] ) ) {  
    $active_tab = $_GET[ 'tab' ];  
} else {
    $active_tab = 'casinos_tab';
}
?>

<div class="wrap">
    <style type="text/css">
        #aces_casinos_tab_titles,
        #aces_casinos_tab_slugs,
        #aces_casinos_tab_rating_titles,
        #aces_casinos_tab_other_settings,
        #aces_games_tab_titles,
        #aces_games_tab_slugs,
        #aces_games_tab_other_settings,
        #aces_bonuses_tab_titles,
        #aces_bonuses_tab_slugs,
        #aces_bonuses_tab_other_settings,
        #aces_geolocation_tab_title,
        #aces_geolocation_tab_api {
            border-top: 1px solid #ccc;
            padding-top: 5px;
        }
        form h2 {
            color: #e74c3c;
        }
    </style>
	<h1 class="wp-heading-inline"><?php echo esc_html( get_admin_page_title() ); ?><span class="title-count theme-count"><?php echo esc_html( '2.1', 'aces' ); ?></span></h1>
    <div style="padding-bottom: 10px;">
        <?php esc_html_e( 'ACES plugin by', 'aces' ); ?> <a href="<?php echo esc_url( __( 'https://space-themes.com/', 'aces' ) ); ?>" title="<?php esc_attr_e( 'Space-Themes.com', 'aces' ); ?>" target="_blank"><?php esc_html_e( 'Space-Themes.com', 'aces' ); ?></a>
    </div>
    
    <h2 class="nav-tab-wrapper">
        <a href="?page=aces&tab=casinos_tab" class="nav-tab <?php echo $active_tab == 'casinos_tab' ? 'nav-tab-active' : ''; ?>"><?php esc_html_e('Casinos', 'aces'); ?></a>
        <a href="?page=aces&tab=games_tab" class="nav-tab <?php echo $active_tab == 'games_tab' ? 'nav-tab-active' : ''; ?>"><?php esc_html_e('Games', 'aces'); ?></a>
        <a href="?page=aces&tab=bonuses_tab" class="nav-tab <?php echo $active_tab == 'bonuses_tab' ? 'nav-tab-active' : ''; ?>"><?php esc_html_e('Bonuses', 'aces'); ?></a>
        <a href="?page=aces&tab=geolocation_tab" class="nav-tab <?php echo $active_tab == 'geolocation_tab' ? 'nav-tab-active' : ''; ?>"><?php esc_html_e('Geolocation', 'aces'); ?></a>
    </h2> 

	<form method="post" action="options.php">
    	<?php

        submit_button( esc_html__( 'Save Settings', 'aces' ) );

        if( $active_tab == 'casinos_tab' )  {

            settings_fields( 'aces_casinos_tab' );
            do_settings_sections( 'aces_casinos_tab' );

        } else if( $active_tab == 'games_tab' )  {

            settings_fields( 'aces_games_tab' );
            do_settings_sections( 'aces_games_tab' );

        } else if( $active_tab == 'bonuses_tab' )  {

            settings_fields( 'aces_bonuses_tab' );
            do_settings_sections( 'aces_bonuses_tab' );

        } else if( $active_tab == 'geolocation_tab' )  {

            settings_fields( 'aces_geolocation_tab' );
            do_settings_sections( 'aces_geolocation_tab' );

        }

    	submit_button( esc_html__( 'Save Settings', 'aces' ) );

    	?>
	</form>
</div>

<?php
}

/*  Aces Options Page End */