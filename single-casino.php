<?php

get_header();
?>

    <main class="casino_page wrapper_narrow">
        <article class="casino_page_container">

            <section class="casino_page_box">
                <div class="casino_page_image_wrap">
                    <div class="casino_page_image">
                        <?php echo get_the_post_thumbnail(get_the_ID(), 'casino_item_single'); ?>
                    </div>
                    <div class="item_rating"><span><?php if (!empty(get_post_meta(get_the_ID(), 'oc_rating_text', true))) { ?><?php echo esc_attr(get_post_meta(get_the_ID(), 'oc_rating_text', true)); ?><?php } else { ?>
                                4.5
                            <?php } ?></span></div>
                </div>

                <div class="casino_page_description">
                    <div class="top_content">
                        <div class="top_line">
                            <h1><?php the_title(); ?></h1>

                        </div>

                    </div>
                    <div class="bottom_content">
                        <p>
                            <?php if (!empty(get_post_meta(get_the_ID(), 'oc_casino_rating_desc', true))) { ?><?php echo esc_attr(get_post_meta(get_the_ID(), 'oc_casino_rating_desc', true)); ?><?php } else { ?>
                            <?php } ?>

                        </p>
                    </div>
                    <div class="button read_review">
                        <a href="<?php the_permalink(); ?>">GET $1 000 BONUS</a>
                    </div>
                </div>

            </section>

            <section id="overview" class="casino_page_review">
                <?php the_content(); ?>
            </section>

            <section class="basic_information">
                <h3>Basic Information</h3>
                <div class="content_box">
                    <div class="left_box">
                        <div class="top_side">
                            <span class="label">Website:</span>
                            <a href="<?php echo esc_url(get_post_meta(get_the_ID(), 'oc_casino_site_text', true)); ?>"><?php if (!empty(get_post_meta(get_the_ID(), 'oc_casino_site_text', true))) { ?><?php echo esc_attr(get_post_meta(get_the_ID(), 'oc_casino_site_text', true)); ?><?php } else { ?>
                                    www.website.com
                                <?php } ?></a>
                        </div>
                        <div class="middle_side">
                            <span class="label">All Games:</span>
                            <span><?php if (!empty(get_post_meta(get_the_ID(), 'oc_casino_item_all_games', true))) { ?><?php echo esc_attr(get_post_meta(get_the_ID(), 'oc_casino_item_all_games', true)); ?><?php } else { ?>
                                    580+
                                <?php } ?></span>
                        </div>
                        <div class="bottom_side">
                            <span class="label">Licence:</span>
                            <span><?php if (!empty(get_post_meta(get_the_ID(), 'oc_casino_item_licence', true))) { ?><?php echo esc_attr(get_post_meta(get_the_ID(), 'oc_casino_item_licence', true)); ?><?php } else { ?>
                                    Antigua (ADOG), United Kingdom (UKGC)
                                <?php } ?></span>
                        </div>
                    </div>
                    <div class="central_box">
                        <div class="top_side">
                            <span class="label">Online:</span>
                            <span><?php if (!empty(get_post_meta(get_the_ID(), 'oc_casino_item_online', true))) { ?><?php echo esc_attr(get_post_meta(get_the_ID(), 'oc_casino_item_online', true)); ?><?php } else { ?>
                                    Since 2009
                                <?php } ?></span>
                        </div>
                        <div class="middle_side">
                            <span class="label">Currencies:</span>
                            <span><?php if (!empty(get_post_meta(get_the_ID(), 'oc_casino_item_currencies', true))) { ?><?php echo esc_attr(get_post_meta(get_the_ID(), 'oc_casino_item_currencies', true)); ?><?php } else { ?>
                                    BRL, EUR, SEK, USD, ZAR
                                <?php } ?></span>
                        </div>
                        <div class="bottom_side">
                            <span class="label">Owner:</span>
                            <span><?php if (!empty(get_post_meta(get_the_ID(), 'oc_casino_item_owner', true))) { ?><?php echo esc_attr(get_post_meta(get_the_ID(), 'oc_casino_item_owner', true)); ?><?php } else { ?>
                                    Universe Entertainment Services Malta Limited
                                <?php } ?></span>
                        </div>
                    </div>
                    <div class="right_box">
                        <div class="top_side">
                            <span class="label">E-mail:</span>
                            <span><?php if (!empty(get_post_meta(get_the_ID(), 'oc_casino_item_mail', true))) { ?><?php echo esc_attr(get_post_meta(get_the_ID(), 'oc_casino_item_mail', true)); ?><?php } else { ?>
                                    support.casino@casino.gambling
                                <?php } ?></span>
                        </div>
                        <div class="middle_side">
                            <span class="label">Languages:</span>
                            <span><?php if (!empty(get_post_meta(get_the_ID(), 'oc_casino_item_languages', true))) { ?><?php echo esc_attr(get_post_meta(get_the_ID(), 'oc_casino_item_languages', true)); ?><?php } else { ?>
                                    English, Czech, German, Greek, Spanish, Finnish, Norwegian, Polish, Portuguese, Russian, Swedish
                                <?php } ?></span>
                        </div>
                        <div class="bottom_side">
                            <span class="label">Support:</span>
                            <span><?php if (!empty(get_post_meta(get_the_ID(), 'oc_casino_item_support', true))) { ?><?php echo esc_attr(get_post_meta(get_the_ID(), 'oc_casino_item_support', true)); ?><?php } else { ?>
                                    24/7 Live chat, Email. Phone
                                <?php } ?></span>
                        </div>
                    </div>
                </div>
            </section>

            <section class="casino_page_bottom">
                <div id="pros_cons" class="casino_page_advantages">
                    <div class="pros">
                        <h3>Pros</h3>
                        <ul class="features">

                            <li class="true">
                                <?php if (!empty(get_post_meta(get_the_ID(), 'oc_casino_item_pros', true))) { ?>
                                    <svg width="11" height="8" viewBox="0 0 11 8" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path d="M4.22476 7.03779L1.4396 4.26748C1.42354 4.25151 1.41079 4.23252 1.40209 4.2116C1.39339 4.19069 1.38892 4.16826 1.38892 4.14561C1.38892 4.12295 1.39339 4.10053 1.40209 4.07961C1.41079 4.05869 1.42354 4.0397 1.4396 4.02373L2.14272 3.31982C2.20991 3.25264 2.31851 3.25264 2.38569 3.31982L4.21929 5.14248C4.28647 5.20967 4.39585 5.20889 4.46304 5.1417L8.5146 1.05107C8.58179 0.983106 8.69116 0.983106 8.75913 1.05029L9.46304 1.7542C9.53022 1.82139 9.53022 1.92998 9.46382 1.99717L5.04976 6.45108L5.05054 6.45186L4.4685 7.03701C4.40132 7.1042 4.29194 7.1042 4.22476 7.03779Z"
                                              fill="#3DBC61" stroke="#3DBC61" stroke-miterlimit="10"/>
                                    </svg>
                                    <?php echo esc_attr(get_post_meta(get_the_ID(), 'oc_casino_item_pros', true)); ?><?php } else { ?>

                                <?php } ?>

                            </li>
                            <li class="true">
                                <?php if (!empty(get_post_meta(get_the_ID(), 'oc_casino_item_pros_two', true))) { ?>
                                    <svg width="11" height="8" viewBox="0 0 11 8" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path d="M4.22476 7.03779L1.4396 4.26748C1.42354 4.25151 1.41079 4.23252 1.40209 4.2116C1.39339 4.19069 1.38892 4.16826 1.38892 4.14561C1.38892 4.12295 1.39339 4.10053 1.40209 4.07961C1.41079 4.05869 1.42354 4.0397 1.4396 4.02373L2.14272 3.31982C2.20991 3.25264 2.31851 3.25264 2.38569 3.31982L4.21929 5.14248C4.28647 5.20967 4.39585 5.20889 4.46304 5.1417L8.5146 1.05107C8.58179 0.983106 8.69116 0.983106 8.75913 1.05029L9.46304 1.7542C9.53022 1.82139 9.53022 1.92998 9.46382 1.99717L5.04976 6.45108L5.05054 6.45186L4.4685 7.03701C4.40132 7.1042 4.29194 7.1042 4.22476 7.03779Z"
                                              fill="#3DBC61" stroke="#3DBC61" stroke-miterlimit="10"/>
                                    </svg>
                                    <?php echo esc_attr(get_post_meta(get_the_ID(), 'oc_casino_item_pros_two', true)); ?><?php } else { ?>

                                <?php } ?>
                            </li>
                            <li class="true">
                                <?php if (!empty(get_post_meta(get_the_ID(), 'oc_casino_item_pros_three', true))) { ?>
                                    <svg width="11" height="8" viewBox="0 0 11 8" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path d="M4.22476 7.03779L1.4396 4.26748C1.42354 4.25151 1.41079 4.23252 1.40209 4.2116C1.39339 4.19069 1.38892 4.16826 1.38892 4.14561C1.38892 4.12295 1.39339 4.10053 1.40209 4.07961C1.41079 4.05869 1.42354 4.0397 1.4396 4.02373L2.14272 3.31982C2.20991 3.25264 2.31851 3.25264 2.38569 3.31982L4.21929 5.14248C4.28647 5.20967 4.39585 5.20889 4.46304 5.1417L8.5146 1.05107C8.58179 0.983106 8.69116 0.983106 8.75913 1.05029L9.46304 1.7542C9.53022 1.82139 9.53022 1.92998 9.46382 1.99717L5.04976 6.45108L5.05054 6.45186L4.4685 7.03701C4.40132 7.1042 4.29194 7.1042 4.22476 7.03779Z"
                                              fill="#3DBC61" stroke="#3DBC61" stroke-miterlimit="10"/>
                                    </svg>
                                    <?php echo esc_attr(get_post_meta(get_the_ID(), 'oc_casino_item_pros_three', true)); ?><?php } else { ?>

                                <?php } ?>
                            </li>
                            <li class="true">
                                <?php if (!empty(get_post_meta(get_the_ID(), 'oc_casino_item_pros_four', true))) { ?>
                                    <svg width="11" height="8" viewBox="0 0 11 8" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path d="M4.22476 7.03779L1.4396 4.26748C1.42354 4.25151 1.41079 4.23252 1.40209 4.2116C1.39339 4.19069 1.38892 4.16826 1.38892 4.14561C1.38892 4.12295 1.39339 4.10053 1.40209 4.07961C1.41079 4.05869 1.42354 4.0397 1.4396 4.02373L2.14272 3.31982C2.20991 3.25264 2.31851 3.25264 2.38569 3.31982L4.21929 5.14248C4.28647 5.20967 4.39585 5.20889 4.46304 5.1417L8.5146 1.05107C8.58179 0.983106 8.69116 0.983106 8.75913 1.05029L9.46304 1.7542C9.53022 1.82139 9.53022 1.92998 9.46382 1.99717L5.04976 6.45108L5.05054 6.45186L4.4685 7.03701C4.40132 7.1042 4.29194 7.1042 4.22476 7.03779Z"
                                              fill="#3DBC61" stroke="#3DBC61" stroke-miterlimit="10"/>
                                    </svg>
                                    <?php echo esc_attr(get_post_meta(get_the_ID(), 'oc_casino_item_pros_four', true)); ?><?php } else { ?>

                                <?php } ?>
                            </li>
                            <li class="true">
                                <?php if (!empty(get_post_meta(get_the_ID(), 'oc_casino_item_pros_five', true))) { ?>
                                    <svg width="11" height="8" viewBox="0 0 11 8" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path d="M4.22476 7.03779L1.4396 4.26748C1.42354 4.25151 1.41079 4.23252 1.40209 4.2116C1.39339 4.19069 1.38892 4.16826 1.38892 4.14561C1.38892 4.12295 1.39339 4.10053 1.40209 4.07961C1.41079 4.05869 1.42354 4.0397 1.4396 4.02373L2.14272 3.31982C2.20991 3.25264 2.31851 3.25264 2.38569 3.31982L4.21929 5.14248C4.28647 5.20967 4.39585 5.20889 4.46304 5.1417L8.5146 1.05107C8.58179 0.983106 8.69116 0.983106 8.75913 1.05029L9.46304 1.7542C9.53022 1.82139 9.53022 1.92998 9.46382 1.99717L5.04976 6.45108L5.05054 6.45186L4.4685 7.03701C4.40132 7.1042 4.29194 7.1042 4.22476 7.03779Z"
                                              fill="#3DBC61" stroke="#3DBC61" stroke-miterlimit="10"/>
                                    </svg>
                                    <?php echo esc_attr(get_post_meta(get_the_ID(), 'oc_casino_item_pros_five', true)); ?><?php } else { ?>

                                <?php } ?>
                            </li>

                        </ul>
                    </div>
                    <div class="cons">
                        <h3>Cons</h3>
                        <ul class="features">

                            <li class="true">
                                <?php if (!empty(get_post_meta(get_the_ID(), 'oc_casino_item_cons', true))) { ?>
                                    <svg width="10" height="11" viewBox="0 0 10 11" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path d="M6.52193 5.50001L9.32505 2.46329C9.45443 2.32313 9.45443 2.0936 9.32505 1.95243L8.33036 0.874854C8.26763 0.807511 8.1829 0.76973 8.09458 0.76973C8.00627 0.76973 7.92153 0.807511 7.8588 0.874854L5.05568 3.91157L2.25255 0.874854C2.18982 0.807511 2.10508 0.76973 2.01677 0.76973C1.92846 0.76973 1.84372 0.807511 1.78099 0.874854L0.787239 1.95243C0.756256 1.98596 0.731677 2.02578 0.714908 2.06961C0.698139 2.11344 0.689507 2.16042 0.689507 2.20786C0.689507 2.25531 0.698139 2.30228 0.714908 2.34611C0.731677 2.38994 0.756256 2.42976 0.787239 2.46329L3.58943 5.50001L0.786301 8.53673C0.656926 8.67689 0.656926 8.90642 0.786301 9.04759L1.78099 10.1252C1.84372 10.1925 1.92846 10.2303 2.01677 10.2303C2.10508 10.2303 2.18982 10.1925 2.25255 10.1252L5.05568 7.08743L7.8588 10.1252C7.92153 10.1925 8.00627 10.2303 8.09458 10.2303C8.1829 10.2303 8.26763 10.1925 8.33036 10.1252L9.32505 9.04759C9.45443 8.90642 9.45443 8.67689 9.32505 8.53673L6.52193 5.50001Z"
                                              fill="#BC3D3D"/>
                                    </svg>
                                    <?php echo esc_attr(get_post_meta(get_the_ID(), 'oc_casino_item_cons', true)); ?><?php } else { ?>

                                <?php } ?>
                            </li>


                            <li class="true">
                                <?php if (!empty(get_post_meta(get_the_ID(), 'oc_casino_item_cons_two', true))) { ?>
                                    <svg width="10" height="11" viewBox="0 0 10 11" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path d="M6.52193 5.50001L9.32505 2.46329C9.45443 2.32313 9.45443 2.0936 9.32505 1.95243L8.33036 0.874854C8.26763 0.807511 8.1829 0.76973 8.09458 0.76973C8.00627 0.76973 7.92153 0.807511 7.8588 0.874854L5.05568 3.91157L2.25255 0.874854C2.18982 0.807511 2.10508 0.76973 2.01677 0.76973C1.92846 0.76973 1.84372 0.807511 1.78099 0.874854L0.787239 1.95243C0.756256 1.98596 0.731677 2.02578 0.714908 2.06961C0.698139 2.11344 0.689507 2.16042 0.689507 2.20786C0.689507 2.25531 0.698139 2.30228 0.714908 2.34611C0.731677 2.38994 0.756256 2.42976 0.787239 2.46329L3.58943 5.50001L0.786301 8.53673C0.656926 8.67689 0.656926 8.90642 0.786301 9.04759L1.78099 10.1252C1.84372 10.1925 1.92846 10.2303 2.01677 10.2303C2.10508 10.2303 2.18982 10.1925 2.25255 10.1252L5.05568 7.08743L7.8588 10.1252C7.92153 10.1925 8.00627 10.2303 8.09458 10.2303C8.1829 10.2303 8.26763 10.1925 8.33036 10.1252L9.32505 9.04759C9.45443 8.90642 9.45443 8.67689 9.32505 8.53673L6.52193 5.50001Z"
                                              fill="#BC3D3D"/>
                                    </svg>
                                    <?php echo esc_attr(get_post_meta(get_the_ID(), 'oc_casino_item_cons_two', true)); ?><?php } else { ?>

                                <?php } ?>
                            </li>

                            <li class="true">
                                <?php if (!empty(get_post_meta(get_the_ID(), 'oc_casino_item_cons_three', true))) { ?>
                                    <svg width="10" height="11" viewBox="0 0 10 11" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path d="M6.52193 5.50001L9.32505 2.46329C9.45443 2.32313 9.45443 2.0936 9.32505 1.95243L8.33036 0.874854C8.26763 0.807511 8.1829 0.76973 8.09458 0.76973C8.00627 0.76973 7.92153 0.807511 7.8588 0.874854L5.05568 3.91157L2.25255 0.874854C2.18982 0.807511 2.10508 0.76973 2.01677 0.76973C1.92846 0.76973 1.84372 0.807511 1.78099 0.874854L0.787239 1.95243C0.756256 1.98596 0.731677 2.02578 0.714908 2.06961C0.698139 2.11344 0.689507 2.16042 0.689507 2.20786C0.689507 2.25531 0.698139 2.30228 0.714908 2.34611C0.731677 2.38994 0.756256 2.42976 0.787239 2.46329L3.58943 5.50001L0.786301 8.53673C0.656926 8.67689 0.656926 8.90642 0.786301 9.04759L1.78099 10.1252C1.84372 10.1925 1.92846 10.2303 2.01677 10.2303C2.10508 10.2303 2.18982 10.1925 2.25255 10.1252L5.05568 7.08743L7.8588 10.1252C7.92153 10.1925 8.00627 10.2303 8.09458 10.2303C8.1829 10.2303 8.26763 10.1925 8.33036 10.1252L9.32505 9.04759C9.45443 8.90642 9.45443 8.67689 9.32505 8.53673L6.52193 5.50001Z"
                                              fill="#BC3D3D"/>
                                    </svg>
                                    <?php echo esc_attr(get_post_meta(get_the_ID(), 'oc_casino_item_cons_three', true)); ?><?php } else { ?>

                                <?php } ?>
                            </li>
                            <li class="true">
                                <?php if (!empty(get_post_meta(get_the_ID(), 'oc_casino_item_cons_four', true))) { ?>
                                    <svg width="10" height="11" viewBox="0 0 10 11" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path d="M6.52193 5.50001L9.32505 2.46329C9.45443 2.32313 9.45443 2.0936 9.32505 1.95243L8.33036 0.874854C8.26763 0.807511 8.1829 0.76973 8.09458 0.76973C8.00627 0.76973 7.92153 0.807511 7.8588 0.874854L5.05568 3.91157L2.25255 0.874854C2.18982 0.807511 2.10508 0.76973 2.01677 0.76973C1.92846 0.76973 1.84372 0.807511 1.78099 0.874854L0.787239 1.95243C0.756256 1.98596 0.731677 2.02578 0.714908 2.06961C0.698139 2.11344 0.689507 2.16042 0.689507 2.20786C0.689507 2.25531 0.698139 2.30228 0.714908 2.34611C0.731677 2.38994 0.756256 2.42976 0.787239 2.46329L3.58943 5.50001L0.786301 8.53673C0.656926 8.67689 0.656926 8.90642 0.786301 9.04759L1.78099 10.1252C1.84372 10.1925 1.92846 10.2303 2.01677 10.2303C2.10508 10.2303 2.18982 10.1925 2.25255 10.1252L5.05568 7.08743L7.8588 10.1252C7.92153 10.1925 8.00627 10.2303 8.09458 10.2303C8.1829 10.2303 8.26763 10.1925 8.33036 10.1252L9.32505 9.04759C9.45443 8.90642 9.45443 8.67689 9.32505 8.53673L6.52193 5.50001Z"
                                              fill="#BC3D3D"/>
                                    </svg>
                                    <?php echo esc_attr(get_post_meta(get_the_ID(), 'oc_casino_item_cons_four', true)); ?><?php } else { ?>

                                <?php } ?>
                            </li>

                            <li class="true">
                                <?php if (!empty(get_post_meta(get_the_ID(), 'oc_casino_item_cons_five', true))) { ?>
                                    <svg width="10" height="11" viewBox="0 0 10 11" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path d="M6.52193 5.50001L9.32505 2.46329C9.45443 2.32313 9.45443 2.0936 9.32505 1.95243L8.33036 0.874854C8.26763 0.807511 8.1829 0.76973 8.09458 0.76973C8.00627 0.76973 7.92153 0.807511 7.8588 0.874854L5.05568 3.91157L2.25255 0.874854C2.18982 0.807511 2.10508 0.76973 2.01677 0.76973C1.92846 0.76973 1.84372 0.807511 1.78099 0.874854L0.787239 1.95243C0.756256 1.98596 0.731677 2.02578 0.714908 2.06961C0.698139 2.11344 0.689507 2.16042 0.689507 2.20786C0.689507 2.25531 0.698139 2.30228 0.714908 2.34611C0.731677 2.38994 0.756256 2.42976 0.787239 2.46329L3.58943 5.50001L0.786301 8.53673C0.656926 8.67689 0.656926 8.90642 0.786301 9.04759L1.78099 10.1252C1.84372 10.1925 1.92846 10.2303 2.01677 10.2303C2.10508 10.2303 2.18982 10.1925 2.25255 10.1252L5.05568 7.08743L7.8588 10.1252C7.92153 10.1925 8.00627 10.2303 8.09458 10.2303C8.1829 10.2303 8.26763 10.1925 8.33036 10.1252L9.32505 9.04759C9.45443 8.90642 9.45443 8.67689 9.32505 8.53673L6.52193 5.50001Z"
                                              fill="#BC3D3D"/>
                                    </svg>
                                    <?php echo esc_attr(get_post_meta(get_the_ID(), 'oc_casino_item_cons_five', true)); ?><?php } else { ?>

                                <?php } ?>
                            </li>

                        </ul>
                    </div>
                </div>

            </section>

            <section id="top_games" class="home_best_game slider">
                <h3 class="title">Top Games</h3>
                <div class="best_casino_slider">
                    <?php

                    $posts_per_page = '12';

                    $wp_query = new WP_Query(array(
                        'post_type' => 'game',
                        'posts_per_page' => $posts_per_page
                    ));

                    if (have_posts()) : while (have_posts()) : the_post();

                        ?>

                        <div class="best_slider_item">
                            <?php echo get_the_post_thumbnail(get_the_ID(), 'game_img_small'); ?>
                            <div class="content_box">
                                <div class="title"><?php the_title(); ?></div>
                                 <div class="check_casinos button read_review"><a href="#">Check Available Casinos</a>
                                </div>
                            </div>
                        </div>

                    <?php endwhile; endif;
                    wp_reset_query(); ?>

                </div>

            </section>

            <section id="featured_providers" class="partners">

                <?php
                $terms = get_the_terms(get_the_ID(), 'software');

                if (!empty($terms)) : ?>

                    <?php foreach ($terms as $term) : ?>
                        <div class="partners_item_wrap">
                            <div class="partners_item">
                                <?php
                                $software_logo = get_term_meta($term->term_id, 'taxonomy-image-id', true);
                                if ($software_logo) { ?>
                                    <?php echo wp_get_attachment_image($software_logo, 'partners_img', "", array("class" => "space-software-logo")); ?>
                                <?php } ?>
                            </div>
                        </div>
                    <?php endforeach; ?>

                    <?php
                endif;
                ?>

            </section>

            <section class="casino_page_content home_content_bottom">
                <div class="left_box">
                    <?php if (get_post_meta(get_the_ID(), 'oc_casino_left_top_text', true)) { ?>
                        <p><?php echo esc_attr(get_post_meta(get_the_ID(), 'oc_casino_left_top_text', true)); ?></p>
                    <?php } ?>
                    <?php if (get_post_meta(get_the_ID(), 'oc_casino_left_top_text', true)) { ?>
                        <p><?php echo esc_attr(get_post_meta(get_the_ID(), 'oc_casino_left_bottom_text', true)); ?></p>
                    <?php } ?>
                </div>
                <div class="right_box">
                    <?php if (get_post_meta(get_the_ID(), 'oc_casino_right_top_text', true)) { ?>
                        <p><?php echo esc_attr(get_post_meta(get_the_ID(), 'oc_casino_right_top_text', true)); ?></p>
                    <?php } ?>
                    <?php if (get_post_meta(get_the_ID(), 'oc_casino_right_top_text', true)) { ?>
                        <p><?php echo esc_attr(get_post_meta(get_the_ID(), 'oc_casino_right_bottom_text', true)); ?></p>
                    <?php } ?>
                </div>
            </section>

            <section id="casino_bonuses" class="casino_bonuses_slider recommended_bonuses">
                <div class="title_and_arrows">
                    <h3>Casino Bonuses</h3>
                    <div class="slider_arrows">

                    </div>
                </div>

                <div class="bonuses_list">
                <?php
                $posts_per_page = '15';

                $wp_query = new WP_Query(array(
                    'post_type' => 'bonus',
                    'posts_per_page' => $posts_per_page

                ));

                if (have_posts()) : while (have_posts()) : the_post();

                    ?>

                    <a href="#" class="bonus_card">
                        <div class="bonus_card_image">
                            <picture>
                                <?php if (!empty(get_the_post_thumbnail(get_the_ID(), 'casino_item_single', true))) { ?>

                                    <?php echo get_the_post_thumbnail(get_the_ID(), 'casino_item_single'); ?>
                                <?php } ?>

                                <?php if (empty(get_the_post_thumbnail(get_the_ID(), 'casino_item_single', true))) { ?>
                                    <img class="spare_bonus_img"
                                         src="<?php echo get_stylesheet_directory_uri() . '/layouts/img/bonuses_cards/logos/bonuses_white.jpg' ?>"
                                         style="width: 300px; height:112px;" alt="bonus image">
                                <?php } ?>
                            </picture>
                            <div class="rating">
                                <?php if (!empty(get_post_meta(get_the_ID(), 'oc_bonus_rating_text', true))) { ?>
                                    <?php echo esc_attr(get_post_meta(get_the_ID(), 'oc_bonus_rating_text', true)); ?>
                                <?php } else { ?>
                                    8.2
                                <?php } ?>
                            </div>
                        </div>
                        <div class="bonus_card_text">
                            <div class="bonus_card_title">
                                <?php the_title(); ?>
                            </div>
                            <div class="bonus_card_additional">
                                <?php if (!empty(get_post_meta(get_the_ID(), 'oc_bonus_wager', true))) { ?>
                                    <div class="bonus_card_info">
                                        <div class="bonus_card_info_head">
                                            <?php esc_html_e('Wager: ', 'onlinecasino'); ?>
                                        </div>
                                        <div class="bonus_card_info_body">
                                            <?php echo get_post_meta($post->ID, 'oc_bonus_wager', true); ?>
                                        </div>
                                    </div>
                                <?php } ?>

                                <?php if (!empty(get_post_meta(get_the_ID(), 'oc_free_spins', true))) { ?>
                                    <div class="bonus_card_info">
                                        <div class="bonus_card_info_head">
                                            <?php echo esc_html_e('FreeSpins: ', 'onlinecasino'); ?>
                                        </div>
                                        <div class="bonus_card_info_body">
                                            <?php echo esc_attr(get_post_meta(get_the_ID(), 'oc_free_spins', true)); ?>
                                        </div>
                                    </div>
                                <?php } ?>

                                <?php if (!empty(get_post_meta(get_the_ID(), 'oc_bonus_amount', true))) { ?>
                                    <div class="bonus_card_info">
                                        <div class="bonus_card_info_head">
                                            <?php echo esc_html_e('Amount: ', 'onlinecasino'); ?>
                                        </div>
                                        <div class="bonus_card_info_body">
                                            <?php echo esc_attr(get_post_meta(get_the_ID(), 'oc_bonus_amount', true)); ?>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </a>

                <?php endwhile; endif;
                wp_reset_query(); ?>

                </div>

            </section>

            <section class="player_review" id="player_review" style="max-width: 1136px;">
                <div class="authors">
                    <div class="authors_reviews">
                        <div class="authors_reviews_head">
                            <div class="authors_reviews_head_left">
                                <h3 class="authors_reviews_title">Player reviews</h3>
                                (<span class="authors_reviews_amount">558</span>)
                            </div>
                            <div class="authors_reviews_head_right">
                                <div class="authors_reviews_scale">
                                    <div class="authors_reviews_scale_numbers">
                                        <div class="authors_reviews_scale_statistics">
                                            <picture><img
                                                        src="<?php echo get_stylesheet_directory_uri() . '/layouts/img/authors/icons/like.svg' ?>"
                                                        alt="like"></picture>
                                            542
                                        </div>
                                        <div class="authors_reviews_scale_statistics">
                                            16
                                            <picture><img
                                                        src="<?php echo get_stylesheet_directory_uri() . '/layouts/img/authors/icons/dislike.svg' ?>"
                                                        alt="dislike"></picture>
                                        </div>
                                    </div>

                                    <div class="authors_reviews_scale_red">
                                        <div class="authors_reviews_scale_green"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="authors_reviews_body">
                            <div class="authors_review">
                                <div class="authors_review_left">
                                    <div class="authors_review_avatar">
                                        <picture><img
                                                    src="<?php echo get_stylesheet_directory_uri() . '/layouts/img/authors/avatar.svg' ?>"
                                                    alt=""></picture>
                                    </div>
                                    <div class="authors_review_text">
                                        <div class="authors_review_name">RVS9733</div>
                                        <div class="authors_review_blck">
                                            Registration date: <strong>12.04.2020</strong>
                                        </div>
                                        <div class="authors_review_blck">
                                            Reviews: <strong>135</strong>
                                        </div>
                                    </div>
                                </div>
                                <div class="authors_review_right">
                                    <div class="authors_review_description">
                                        To begin the review of Casino-X it is best to acknowledge the fact that this
                                        operator is
                                        considered
                                        to be one of the
                                        best in Runet and is becoming more and more recognizable on the European market.
                                    </div>
                                    <div class="authors_review_number">
                                        8.6
                                    </div>
                                </div>
                            </div>
                            <div class="authors_review">
                                <div class="authors_review_left">
                                    <div class="authors_review_avatar">
                                        <picture><img
                                                    src="<?php echo get_stylesheet_directory_uri() . '/layouts/img/authors/avatar.svg' ?>"
                                                    alt=""></picture>
                                    </div>
                                    <div class="authors_review_text">
                                        <div class="authors_review_name">RVS9733</div>
                                        <div class="authors_review_blck">
                                            Registration date: <strong>12.04.2020</strong>
                                        </div>
                                        <div class="authors_review_blck">
                                            Reviews: <strong>135</strong>
                                        </div>
                                    </div>
                                </div>
                                <div class="authors_review_right authors_review_right--red">
                                    <div class="authors_review_description">
                                        To begin the review of Casino-X it is best to acknowledge the fact that this
                                        operator is
                                        considered
                                        to be one of the
                                        best in Runet and is becoming more and more recognizable on the European market.
                                    </div>
                                    <div class="authors_review_number">
                                        3.1
                                    </div>
                                </div>
                            </div>
                            <div class="authors_review">
                                <div class="authors_review_left">
                                    <div class="authors_review_avatar">
                                        <picture><img
                                                    src="<?php echo get_stylesheet_directory_uri() . '/layouts/img/authors/avatar.svg' ?>"
                                                    alt=""></picture>
                                    </div>
                                    <div class="authors_review_text">
                                        <div class="authors_review_name">RVS9733</div>
                                        <div class="authors_review_blck">
                                            Registration date: <strong>12.04.2020</strong>
                                        </div>
                                        <div class="authors_review_blck">
                                            Reviews: <strong>135</strong>
                                        </div>
                                    </div>
                                </div>
                                <div class="authors_review_right">
                                    <div class="authors_review_description">
                                        To begin the review of Casino-X it is best to acknowledge the fact that this
                                        operator is
                                        considered
                                        to be one of the
                                        best in Runet and is becoming more and more recognizable on the European market.
                                    </div>
                                    <div class="authors_review_number">
                                        8.6
                                    </div>
                                </div>
                            </div>

                            <!--                            <button type="button" class="authors_button">-->
                            <!--                                LOAD MORE-->
                            <!--                            </button>-->
                        </div>
                    </div>
                    <form class="authors_form">
                        <div class="authors_reviews_head">
                            <div class="authors_reviews_head_left">
                                <h3 class="authors_reviews_title">Leave your review:</h3>
                            </div>

                            <div class="authors_reviews_head_right">
                                <div class="authors_reviews_scale">
                                    <div class="authors_reviews_scale_slider">
                                        <div class="authors_reviews_scale_numbers">
                                            <div class="authors_reviews_scale_statistics">
                                                1
                                            </div>
                                            <div class="authors_reviews_scale_statistics">
                                                10
                                            </div>
                                        </div>
                                        <div id="slider-range">
                                        </div>
                                    </div>
                                    <div class="authors_reviews_scale_number" id="slider-range-value">
                                        10
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="authors_form_body">
                            <label class="authors_form_label">
                                <div class="authors_form_review">
                                    <div class="authors_form_block">
                        <textarea class="elementWithCounter" data-counter-element=".likesReviewCounter" maxlength="70"
                                  placeholder="Write your Pros"></textarea>
                                        <picture><img
                                                    src="<?php echo get_stylesheet_directory_uri() . '/layouts/img/authors/icons/like.svg' ?>"
                                                    alt="like"></picture>
                                        <div class="authors_form_block_counter likesReviewCounter"><span>70</span>
                                            characters left
                                        </div>
                                    </div>
                                    <div class="authors_form_block">
                        <textarea class="elementWithCounter" data-counter-element=".dislikesReviewCounter"
                                  maxlength="70" placeholder="Write your Cons"></textarea>
                                        <picture><img
                                                    src="<?php echo get_stylesheet_directory_uri() . '/layouts/img/authors/icons/dislike.svg' ?>"
                                                    alt="dislike"></picture>
                                        <div class="authors_form_block_counter dislikesReviewCounter"><span>70</span>
                                            characters left
                                        </div>
                                    </div>
                                </div>
                                <div class="authors_form_checkbox">
                                    <label>
                        <span>To begin the review of Casino-X it is best to acknowledge the fact that this
                            operator <a href="#" class="authors_link"> is considered to be</a></span>
                                        <input type="checkbox">
                                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <path d="M0 11.522l1.578-1.626 7.734 4.619 13.335-12.526 1.353 1.354-14 18.646z"/>
                            </svg>
                        </span>
                                    </label>
                                </div>
                                <button type="submit" class="read_review authors_button">
                                    Place Casino Review
                                </button>
                            </label>
                        </div>
                    </form>
                </div>
            </section>

            <section class="more_casinos_slider home_mobile_casinos">

                <h2 class="box_titile">More Casinos</h2>

                <?php
                $posts_per_page = '20';

                $casino = new WP_Query(array('post_type' => 'casino', 'posts_per_page' => $posts_per_page));
                $i = '0';
                ?>

                <div class="slider_wrapper">
                    <div class="item_list more_casinos_slider_list">

                        <?php if ($casino->have_posts()) : while ($casino->have_posts()) : $casino->the_post();
                            $i++;
                            ?>
                            <div class="item_main_wrap">
                                <div class="item_casino">
                                    <div class="item_casino_wrap">
                                        <div class="item_casino_thumb_wrap">
                                            <a href="<?php the_permalink(); ?>" class="thumbnail">
                                                <?php echo get_the_post_thumbnail(get_the_ID(), 'casino_list_thumb'); ?>
                                            </a>
                                        </div>
                                        <div class="item_rating">
                                <span><?php if (!empty(get_post_meta(get_the_ID(), 'oc_rating_text', true))) {
                                        ?><?php echo esc_attr(get_post_meta(get_the_ID(), 'oc_rating_text', true)); ?><?php } ?>
                                </span>
                                        </div>
                                        <h3><?php the_title(); ?></h3>
                                        <div class="item_content_wrap">
                                            <div class="info_box">
                                    <span>
                                        <?php if (!empty(get_post_meta(get_the_ID(), 'oc_casino_wager', true))) {
                                            echo esc_html_e('Wager ', 'onlinecasino'); ?><?php echo esc_attr(get_post_meta(get_the_ID(), 'oc_casino_wager', true)); ?>

                                        <?php } ?>
                                    </span>
                                                <span><?php if (!empty(get_post_meta(get_the_ID(), 'oc_welcome_bonus', true))) {
                                                        ?><?php echo esc_attr(get_post_meta(get_the_ID(), 'oc_welcome_bonus', true)); ?>
                                                        <?php echo esc_html_e('Welcome bonus', 'onlinecasino'); ?><?php } ?>
                                    </span>
                                            </div>
                                            <div class="item_payment">
                                                <picture>
                                                    <source srcset="<?php echo get_stylesheet_directory_uri() . '/layouts/img/items/payment_green.svg' ?>"
                                                            type="image/webp">
                                                    <img
                                                            src="<?php echo get_stylesheet_directory_uri() . '/layouts/img/items/payment_green.svg' ?>"
                                                            alt="plus">
                                                </picture>
                                            </div>
                                            <div class="button read_review">
                                                <a href="<?php the_permalink(); ?>">CLAIM $1200 BONUS</a>
                                            </div>
                                            <div class="info_box read_review">
                                                <a href="<?php the_permalink(); ?>">Read Review</a>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        <?php endwhile; endif;
                        wp_reset_query(); ?>


                    </div>
                </div>

            </section>

            <section class="home_content_bottom">
                <?php if (!empty(get_post_meta(get_the_ID(), 'oc_casino_bottom_text_field', true))) { ?>
                    <div class="content_block_second hide">
                        <?php echo esc_attr(get_post_meta(get_the_ID(), 'oc_casino_bottom_text_field', true)); ?>
                    </div>
                    <a class="content_toggle_second" href="#">Read More</a>
                <?php } ?>
            </section>

        </article>
        <aside class="casino_page_sidebar">
            <div class="view_section anchor_menu">
                <div class="view_section_title"><?php echo esc_html_e('Navigation:', 'onlinecasino'); ?></div>
                <ul>
                    <a href="#overview">
                        <li><?php echo esc_html_e('Overview', 'onlinecasino'); ?></li>
                    </a>
                    <a href="#pros_cons">
                        <li><?php echo esc_html_e('Pros and Cons', 'onlinecasino'); ?></li>
                    </a>
                    <a href="#top_games">
                        <li><?php echo esc_html_e('Top Games', 'onlinecasino'); ?></li>
                    </a>
                    <a href="#featured_providers">
                        <li><?php echo esc_html_e('Featured Providers', 'onlinecasino'); ?></li>
                    </a>
                    <a href="#casino_bonuses">
                        <li><?php echo esc_html_e('Casino Bonuses', 'onlinecasino'); ?></li>
                    </a>
                    <a href="#player_review">
                        <li><?php echo esc_html_e('Player review', 'onlinecasino'); ?></li>
                    </a>
                </ul>
            </div>
        </aside>
        <!--        --><?php
        //        if (is_active_sidebar('sidebar-casino')) :
        //            dynamic_sidebar('sidebar-casino');
        //        endif;
        //        ?>
    </main>

<?php
//get_sidebar();
get_footer();
