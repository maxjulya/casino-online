<div class="ale-admin-wrap">


    <div class="wrap ale-welcome-header">
        <h1><?php echo ALETHEME_SHORTNAME ?> <?php esc_html_e('Examples Install','gardener'); ?></h1>

            <div class="demos-welcome-text">
                <p><?php esc_html_e('The theme will automatically load all necessary files and create a copy of the selected example. You can also delete the installed demo at any time. ','gardener'); ?></p>
                <strong class="green"><?php esc_html_e('Recommendation:','gardener'); ?></strong>
                <ul>
                    <li><?php esc_html_e('We recommend to use a fresh install of WordPress for importing Demo Data. (no media, not posts, no pages, no plugins.)','gardener'); ?></li>
                    <li><?php esc_html_e('The upload process can take up 5 minutes. So please, be patient and do not close the page.','gardener'); ?></li>
                    <li class="red"><?php esc_html_e('Before importing Demo Examples you must install required plugins.','gardener'); ?></li>
                </ul>
            </div>

            <div class="wp-filter">
                <ul class="filter-links filter-options">
                    <li class="active" data-group="all" ><span><?php esc_html_e('All','gardener'); ?></span></li>
                    <li class="" data-group="photography" ><span><?php esc_html_e('Photography','gardener'); ?></span></li>
                    <li class="" data-group="micro-niche" ><span><?php esc_html_e('Micro Niche','gardener'); ?></span></li>
                    <li class="" data-group="creative" ><span><?php esc_html_e('Creative','gardener'); ?></span></li>
                    <li class="" data-group="business" ><span><?php esc_html_e('Business','gardener'); ?></span></li>
                    <li class="" data-group="shop" ><span><?php esc_html_e('Shop','gardener'); ?></span></li>
                    <li class="" data-group="one-page" ><span><?php esc_html_e('One Page','gardener'); ?></span></li>
                </ul>

                <form class="search-form search-plugins" method="get">
                    <select name="" class="sort-options">
                        <option value="" selected="selected"><?php esc_html_e('Default','gardener'); ?></option>
                        <option value="title"><?php esc_html_e('Title','gardener'); ?></option>
                        <option value="date-created"><?php esc_html_e('Date Created','gardener'); ?></option>
                    </select>
                    <label>
                        <input type="search" name="" value="" class="wp-filter-search filter__search js-shuffle-search" placeholder="<?php esc_html_e('Search','gardener'); ?>" >
                    </label>
                </form>
            </div>

            <div id="grid" class="ale-demo-page cf">


                <?php

                $installed_demo = ale_demo_state::get_installed_demo();
                $ale_demo_names = array();

                //Set Required Plugins
                $plugins = new ale_plugin_installer();
                $plugins->set_plugins_data(ale_global::$plugins_list);

                foreach (ale_global::$demo_list as $demo_id => $ale_temp_params) {
                    $ale_demo_names[$ale_temp_params['text']] = $demo_id;

                    $tmp_class = '';
                    if ($installed_demo !== false and $installed_demo['demo_id'] == $demo_id) {
                        $tmp_class = 'ale-demo-installed';
                    }

                    $data_groups = '';
                    $i = 0;
                    $del = '';
                    if($ale_temp_params['category']){
                        foreach($ale_temp_params['category'] as $cat){
                            if($i==0){
                                $del = '';
                            } else {
                                $del = ', ';
                            }
                            $data_groups .= $del.'"'.$cat.'"';
                            $i++;
                        }
                    }

                    ?>

                    <div data-groups='[<?php echo esc_attr($data_groups); ?>]' data-date-created="<?php echo esc_attr($ale_temp_params['date-create']) ?>" data-title="<?php echo esc_attr($ale_temp_params['text']) ?>" class="ale-demo-<?php echo esc_attr($demo_id) ?> ale-wp-admin-demo picture-item ale-demo-item <?php echo esc_attr($tmp_class) ?> cf">
                        <div class="ale_image">

                            <div class="ale_info cf">
                                <h2 class="demo_search_title"><?php echo esc_attr($ale_temp_params['text']) ?></h2>
                                <span class="ale-installed-text">
                                    <?php
                                    if (!empty(ale_global::$demo_list[$demo_id]['demo_installed_text'])) {
                                        echo esc_attr(ale_global::$demo_list[$demo_id]['demo_installed_text']);
                                    } else {
                                        echo esc_html_e('Installed','gardener');
                                    }
                                    ?>
                                </span>
                                <div class="aspect aspect--7x5">
                                    <div class="aspect__inner">
                                        <a href="<?php echo esc_url($ale_temp_params['demo_url']); ?>" target="_blank"><img src="<?php echo esc_url($ale_temp_params['demo_preview']); ?>" alt="<?php echo esc_attr($ale_temp_params['text']); ?>" /></a>
                                    </div>
                                </div>

                                <div class="required_plugins">
                                    <h4><?php esc_html_e('Required Plugins','gardener') ?>:</h4>
                                    <ul>
                                        <?php
                                        $olins_plugins = $plugins->get_plugins_data();
                                        $html_plugins_output = '';
                                        foreach ($olins_plugins as $plugin){
                                            if ( in_array( $plugin['slug'], $ale_temp_params['required_plugins'] ) ) {
                                                //Set the slug
                                                $plugin_slug = $plugin['slug'];
                                                $olins_url = '';
                                                $olins_html = '';

                                                if ( $plugins->is_plugin_installed( $plugin_slug ) === false ) {
                                                    $olins_url = admin_url( 'update.php' ) . '?action=install-plugin&plugin=' . $plugin_slug . '&_wpnonce=' . wp_create_nonce( 'install-plugin_' . $plugin_slug );
                                                    $olins_html = $plugin['name'] . '<span class="install_but"><a href="' . esc_url( $olins_url ) . '" class="install-plugin">' . esc_html__('Install','gardener') . '</a></span>';

                                                } else if ( $plugins->is_plugin_installed( $plugin_slug ) === true ) {
                                                    if ( $plugins->is_plugin_activated( $plugin_slug ) === false ) {
                                                        $olins_url = admin_url( 'plugins.php' ) . '?action=activate&plugin=' . $plugin['file_path'] . '&_wpnonce=' . wp_create_nonce( 'activate-plugin_' . $plugin['file_path'] );
                                                        $olins_html = $plugin['name'] . '<span class="install_but"><a href="' . esc_url( $olins_url ) . '" class="activate-plugin">' . esc_html__('Activate','gardener') . '</a></span>';
                                                    } else {
                                                        $olins_html = $plugin['name'] . '<span class="install_but installed"><i class="fa fa-check success" aria-hidden="true"></i> '.esc_html__('Active','gardener').'</span>';
                                                    }
                                                }

                                                if ( $olins_html !== '' ) {
                                                    $html_plugins_output .= '<li class="olins_plugin_name">' . $olins_html . '</li>';
                                                }
                                            }
                                        }
                                        echo ale_wp_kses($html_plugins_output);
                                        ?>
                                    </ul>
                                </div>

                                <div class="theme-actions">
                                    <a class="button button-primary ale-button-install-demo" href="#" data-demo-id="<?php echo esc_attr($demo_id) ?>">Install</a>
                                    <a class="button button-secondary ale-button-demo-preview" href="<?php echo esc_url(ale_global::$demo_list[$demo_id]['demo_url']) ?>" target="_blank">Preview</a>
                                    <a class="button button-secondary ale-button-uninstall-demo" href="#" data-demo-id="<?php echo esc_attr($demo_id) ?>">Uninstall</a>
                                    <a class="button button-primary disabled ale-button-installing-demo" href="#" data-demo-id="<?php echo esc_attr($demo_id) ?>">Installing...</a>
                                    <a class="button button-primary disabled ale-button-uninstalling-demo" href="#" data-demo-id="<?php echo esc_attr($demo_id) ?>">Uninstalling...</a>
                                </div>

                                <div class="ale-progress-bar-wrap"><div class="ale-progress-bar"></div></div>
                            </div>
                            <div class="ale-mask"></div>
                        </div>

                    </div>
                <?php } ?>
            </div>

    </div>


</div>