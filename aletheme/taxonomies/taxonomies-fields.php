<?php
/*
    A short user Guide:
    ===================

    //text field
    $my_meta->addText(
        $prefix . 'text_field_id',
        array('name' => __('My Text ', 'tax-meta'), 'desc' => 'this is a field desription')
    );
    //textarea field
    $my_meta->addTextarea($prefix . 'textarea_field_id', array('name' => __('My Textarea ', 'tax-meta')));
    //checkbox field
    $my_meta->addCheckbox($prefix . 'checkbox_field_id', array('name' => __('My Checkbox ', 'tax-meta')));
    //select field
    $my_meta->addSelect(
        $prefix . 'select_field_id',
        array('selectkey1' => 'Select Value1', 'selectkey2' => 'Select Value2'),
        array('name' => __('My select ', 'tax-meta'), 'std' => array('selectkey2'))
    );
    //radio field
    $my_meta->addRadio(
        $prefix . 'radio_field_id',
        array('radiokey1' => 'Radio Value1', 'radiokey2' => 'Radio Value2'),
        array('name' => __('My Radio Filed', 'tax-meta'), 'std' => array('radionkey2'))
    );
    //date field
    $my_meta->addDate($prefix . 'date_field_id', array('name' => __('My Date ', 'tax-meta')));
    //Time field
    $my_meta->addTime($prefix . 'time_field_id', array('name' => __('My Time ', 'tax-meta')));
    //Color field
    $my_meta->addColor($prefix . 'color_field_id', array('name' => __('My Color ', 'tax-meta')));
    //Image field
    $my_meta->addImage($prefix . 'image_field_id', array('name' => __('My Image ', 'tax-meta')));
    //file upload field
    $my_meta->addFile($prefix . 'file_field_id', array('name' => __('My File ', 'tax-meta')));
    //wysiwyg field
    $my_meta->addWysiwyg($prefix . 'wysiwyg_field_id', array('name' => __('My wysiwyg Editor ', 'tax-meta')));
    //taxonomy field
    $my_meta->addTaxonomy(
        $prefix . 'taxonomy_field_id',
        array('taxonomy' => 'category'),
        array('name' => __('My Taxonomy ', 'tax-meta'))
    );
    //posts field
    $my_meta->addPosts(
        $prefix . 'posts_field_id',
        array('args' => array('post_type' => 'page')),
        array('name' => __('My Posts ', 'tax-meta'))
    );

    //To Create a reapeater Block first create an array of fields
    //use the same functions as above but add true as a last param


    $repeater_fields[] = $my_meta->addText(
        $prefix . 're_text_field_id',
        array('name' => __('My Text ', 'tax-meta')),
        true
    );
    $repeater_fields[] = $my_meta->addTextarea(
        $prefix . 're_textarea_field_id',
        array('name' => __('My Textarea ', 'tax-meta')),
        true
    );
    $repeater_fields[] = $my_meta->addCheckbox(
        $prefix . 're_checkbox_field_id',
        array('name' => __('My Checkbox ', 'tax-meta')),
        true
    );
    $repeater_fields[] = $my_meta->addImage(
        $prefix . 'image_field_id',
        array('name' => __('My Image ', 'tax-meta')),
        true
    );


    //Then just add the fields to the repeater block

    //repeater block
    $my_meta->addRepeaterBlock(
        $prefix . 're_',
        array('inline' => true, 'name' => __('This is a Repeater Block', 'tax-meta'), 'fields' => $repeater_fields)
    );
 * */

if(class_exists('Tax_Meta_Class')) {
    if (is_admin()) {
        /*
         * prefix of meta keys, optional
         */
        $prefix = 'ale_';
        /*
         * configure your meta box
         */
        $config_location = array(
            'id' => 'ale_custom_icon',
            // meta box id, unique per meta box
            'title' => esc_html__('Category Icon','gardener'),
            // meta box title
            'pages' => array('work-category'),
            // taxonomy name, accept categories, post_tag and custom taxonomies
            'context' => 'normal',
            // where the meta box appear: normal (default), advanced, side; optional
            'fields' => array(),
            // list of meta fields (can be added by field arrays)
            'local_images' => true,
            // Use local or hosted images (meta box images for add/remove)
            'use_with_theme' => true
            //change path if used with theme set to true, false for a plugin or anything else for a custom path(default false).
        );


        /*
         * Initiate your meta box
         */
        $location_icon = new Tax_Meta_Class($config_location);


        $location_icon->addImage($prefix . 'image_field_id', array('name' => esc_html__('Category Icon ', 'gardener')));


        /*
         * Don't Forget to Close up the meta box decleration
         */
        //Finish Meta Box Decleration
        $location_icon->Finish();
    }
}
