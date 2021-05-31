<?php
/*
 * Aspect Color
 * */

function gardener_customize_register( $wp_customize ) {



    $wp_customize->add_section('gardener_custom_colors', array(
        'title' => esc_html__('Custom Colors', 'gardener'),
        'priority' => 30,
    ));

    $wp_customize->add_setting('gardener_phone', array(
        'default' => '',
        'transport' => 'refresh',
        'sanitize_callback'	=> 'esc_attr',
    ));

    $wp_customize->add_setting('gardener_aspect_color', array(
        'default' => '',
        'transport' => 'refresh',
        'sanitize_callback'	=> 'esc_attr',
    ));

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'gardener_aspect_color_control', array(
        'label' => esc_html__('Aspect Color', 'gardener'),
        'section' => 'gardener_custom_colors',
        'settings' => 'gardener_aspect_color',
    ) ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'gardener_phone_control', array(
        'label' => esc_html__('Phone Number', 'gardener'),
        'section' => 'gardener_custom_colors',
        'settings' => 'gardener_phone',
        'type' => 'text'
    ) ) );

}

add_action('customize_register', 'gardener_customize_register');



// Output Customize CSS
function gardener_customize_css() { ?>

    <?php if(get_theme_mod('gardener_aspect_color')){ ?>

    <style type="text/css">



    </style>

    <?php } ?>

<?php }

add_action('wp_head', 'gardener_customize_css');