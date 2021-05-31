<?php

/**
 *
 * DB-IP.com IP geolocation API
 *
 */

function aces_geolocation( $post_id ){

	// IP geolocation API

	if ( get_option( 'aces_geolocation_enable') ) {

		$user_ip = $_SERVER['REMOTE_ADDR'];

		if ( get_option( 'aces_geolocation_api_key') ) {
			$api_key = esc_attr( get_option( 'aces_geolocation_api_key') );
		} else {
			$api_key = 'free';
		}

		$api_url = 'https://api.db-ip.com/v2/'. $api_key .'/'. $user_ip;

		$json = wp_remote_get( $api_url );
		$json = wp_remote_retrieve_body( $json );
	    $data = json_decode( $json );

	    // Creating an array of restricted countries

	    $post_restricted_countries = get_the_terms( $post_id, 'restricted-country' );

	    if ( !empty($data->countryCode) ) {

	    	$country_code = $data->countryCode;
	    	$country_name = $data->countryName;

		    if ( !empty($post_restricted_countries) ) {

		    	$restricted_countries = [];

			    foreach ( $post_restricted_countries as $restricted_country ) {
			    	$restricted_countries[] = get_term_meta($restricted_country->term_id, 'aces_country_code', true);
			    }

			    $restricted_countries_array = array_unique($restricted_countries);

			    // Showing the message

				if ( in_array($country_code, $restricted_countries_array) ) { ?>

					<i class="fas fa-times-circle"></i> <?php echo esc_html( 'Players from', 'aces' ); ?> <?php echo esc_html( $country_name ); ?> <?php echo esc_html( 'not accepted', 'aces' ); ?>

				<?php } else { ?>

					<i class="fas fa-check-circle"></i> <?php echo esc_html( 'Players from', 'aces' ); ?> <?php echo esc_html( $country_name ); ?> <?php echo esc_html( 'accepted', 'aces' ); ?>

				<?php }

		    } else { ?>

		    	<i class="fas fa-check-circle"></i> <?php echo esc_html( 'Players from', 'aces' ); ?> <?php echo esc_html( $country_name ); ?> <?php echo esc_html( 'accepted', 'aces' ); ?>

		    <?php }

		} else {

			echo esc_html( 'Service is unavailable or invalid API key.', 'aces' );

		}

	}

}