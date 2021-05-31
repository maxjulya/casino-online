var ale_wp_admin_demos = {};
var aleDemoProgressBar = {};
var aleDemoFullInstaller = {};

(function ($) {
    'use strict';

    ale_wp_admin_demos = {

        init: function init() {

            jQuery().ready(function() {

                //Disable the Install Demo Content Button and enable if plugins are already installed.
                var installDemoButton = jQuery('.ale-wp-admin-demo .ale-button-install-demo');
                installDemoButton.addClass('disabled').attr('title',olins_strings.required_plugins);

                function enableInstallButton(){
                    jQuery('.ale_info').each(function(){
                        if(jQuery(this).find('.install_but').length == jQuery(this).find('.installed').length){
                            jQuery(this).find(installDemoButton).removeClass('disabled').attr('title','');
                        }
                    });
                }
                enableInstallButton();



                jQuery( '.activate-plugin, .install-plugin' ).live('click',function( event ) {
                    event.preventDefault();

                    if ( jQuery( this ).hasClass( 'disabled' ) ) {
                        return;
                    }

                    function ale_parse_url( url ) {
                        var urlArray = url.split( '?' )[1].split( '&' ),
                            result = [],
                            elLenght = urlArray.length,
                            i;

                        for(i=0; i < elLenght; ++i){
                            var elementArray = urlArray[i].split( '=' );
                            result[ elementArray[ 0 ] ] = elementArray[ 1 ];
                        }

                        return result;
                    }

                    //Save the link
                    var $oldLink = jQuery( this ).attr( 'href' );

                    // Get a reference ot the link
                    var $link = jQuery( this ),

                        // Parse URL to extract variables
                        url = ale_parse_url( $link.attr( 'href' ) ),
                        // Get a reference to the HTML field which will display whether the plugin was activated or not
                        $actionResult = $link.parents( '.olins_plugin_name' ).find( '.install_but' ),

                        action;


                    // Assign the appropriate AJAX action based on which link was clicked
                    if ( url.action === 'install-plugin' ) {
                        action = 'olins_post_install_plugin';
                    } else if ( url.action === 'activate' ) {
                        action = 'olins_post_activate_plugin';
                    }

                    // Disable the installation/activation links for the other plugins
                    jQuery( '.required_plugins ul li a' ).addClass( 'disabled' );

                    var activationLimit;

                    $actionResult.html('<i class="fa fa-spinner fa-spin fa-fw"></i>');

                    // Tell the server to activate the plugin
                    var ajaxRequest = jQuery.ajax({
                        url: olins_strings.ale_ajax_url,
                        type: 'post',
                        data: {
                            action: action,
                            olins_plugin_nonce: url._wpnonce,
                            olins_plugin_slug: url.plugin
                        },
                        complete: function( data ) {
                            clearTimeout( activationLimit );

                            // Result
                            if ( data.responseText === 'successful installation' || data.responseText === 'successful activation' ) {

                                $actionResult.empty().html('<i class="fa fa-check success" aria-hidden="true"></i> ' + olins_strings.plugin_active).removeClass().addClass( 'install_but installed' );
                                enableInstallButton();

                            } else if ( data.status === 500 ) {

                                $actionResult.empty().text( olins_strings.plugin_failed_activation_memory ).addClass( 'olins-plugin-action-failed' );

                            } else if ( typeof data.responseText !== 'undefined' && data.responseText.indexOf( 'target' ) !== -1 ) {

                                var againLink = '<i class="fa fa-times red" aria-hidden="true"></i> <a href="' + $oldLink + '" class="install-plugin">' + olins_strings.tryAgain + '</a>'
                                $actionResult.empty().html( againLink ).addClass( 'olins-plugin-action-failed' );

                            } else {
                                var faildActivation = '<i class="fa fa-times red" aria-hidden="true"></i> <a href="' + $oldLink + '" class="install-plugin">' +  olins_strings.plugin_failed_activation + ' ' + olins_strings.tryAgain +'</a>'
                                $actionResult.empty().html( faildActivation ).addClass( 'olins-plugin-action-failed' );

                            }

                            // Re-enable links
                            jQuery( '.required_plugins ul li .disabled' ).removeClass( 'disabled' );
                        }
                    });

                    // Set a time limit of 60 seconds for the activation process.
                    if ( url.action === 'activate' || url.action === 'install-plugin' ) {
                        activationLimit = setTimeout(function() {
                            ajaxRequest.abort();

                            var faildActivation = '<i class="fa fa-times red" aria-hidden="true"></i> <a href="' + $oldLink + '" class="install-plugin">' +  olins_strings.plugin_failed_activation + ' ' + olins_strings.tryAgain +'</a>'
                            $actionResult.empty().html( olins_strings.plugin_failed_activation_retry ).addClass( 'olins-plugin-action-failed' );

                            jQuery( '.required_plugins ul li .disabled' ).removeClass( 'disabled' );
                        }, 60000);
                    }
                });

                // install
                jQuery('.ale-wp-admin-demo .ale-button-install-demo').click(function(event) {
                    event.preventDefault();
                    if(!jQuery(this).hasClass('disabled')){
                        var demo_id = jQuery(this).data('demo-id');
                        var ale_confirm = '';

                        ale_confirm = confirm('Click OK to install the selected demo example');

                        if (ale_confirm === true) {
                            ale_wp_admin_demos._install_full(demo_id);
                        }
                    } else {
                        alert(olins_strings.required_plugins);
                    }
                });

                // uninstall
                jQuery('.ale-wp-admin-demo .ale-button-uninstall-demo').click(function(event) {
                    event.preventDefault();

                    var ale_confirm = confirm('Click OK to Uninstall the selected demo example.');
                    if (ale_confirm === true) {
                        var demo_id = jQuery(this).data('demo-id');
                        ale_wp_admin_demos._uninstall(demo_id);
                    }
                });
            });
        },


        _uninstall: function(demo_id) {
            ale_wp_admin_demos._block_navigation();

            jQuery('.ale-wp-admin-demo:not(.ale-demo-' + demo_id + ')')
                .addClass('ale-demo-disabled')
            ;

            jQuery('.ale-demo-' + demo_id)
                .addClass('ale-demo-uninstalling')
                .removeClass('ale-demo-installed')
            ;

            aleDemoProgressBar.progress_bar_wrapper_element = jQuery('.ale-demo-' + demo_id + ' .ale-progress-bar-wrap');
            aleDemoProgressBar.progress_bar_element = jQuery('.ale-demo-' + demo_id + ' .ale-progress-bar');
            aleDemoProgressBar.show();
            aleDemoProgressBar.change(40);

            aleDemoProgressBar.timer_change(90);

            var request_data = {
                action: 'ale_ajax_demo_install',
                ale_demo_action:'uninstall_demo',
                ale_demo_id: demo_id,
                ale_magic_token: olins_strings.aleWpAdminImportNonce
            };
            jQuery.ajax({
                type: 'POST',
                url: ale_wp_admin_demos._getAdminAjax('uninstall_demo'),
                cache:false,
                data: request_data,
                dataType: 'json',
                success: function(data, textStatus, XMLHttpRequest){

                    aleDemoProgressBar.change(100);


                    setTimeout(function() {
                        aleDemoProgressBar.hide();
                        aleDemoProgressBar.reset();

                        jQuery('.ale-demo-' + demo_id)
                            .removeClass('ale-demo-uninstalling');

                        jQuery('.ale-demo-disabled').removeClass('ale-demo-disabled');

                        ale_wp_admin_demos._unblock_navigation();

                    }, 500);
                },
                error: function(MLHttpRequest, textStatus, errorThrown){
                    ale_wp_admin_demos._show_network_error('uninstall', MLHttpRequest, textStatus, errorThrown);
                }
            });


        },

        _install_full: function (demoId) {
            ale_wp_admin_demos._block_navigation();
            ale_wp_admin_demos._ui_install_start(demoId);
            aleDemoProgressBar.timer_change(10);

            aleDemoFullInstaller.installNextStep(demoId, 0, function () {
                // on finish!
                ale_wp_admin_demos._unblock_navigation();
                ale_wp_admin_demos._ui_install_end(demoId);
            });
        },

        _show_network_error:function (ale_ajax_request_name, MLHttpRequest, textStatus, errorThrown) {

            var responseText = MLHttpRequest.responseText.replace(/<br>/g, '\n');

            alert(
                'Ajax error.\n' +
                'textStatus: ' + textStatus + '\n' +
                'ale_ajax_request_name: ' + ale_ajax_request_name + '\n' +
                'errorThrown: ' + errorThrown + '\n' + '\n' +
                'responseText: ' + responseText
            );
        },


        _ui_install_start:function (demo_id) {
            jQuery('.ale-wp-admin-demo:not(.ale-demo-' + demo_id + ')')
                .addClass('ale-demo-disabled')
                .removeClass('ale-demo-installed')
            ;

            jQuery('.ale-demo-' + demo_id).addClass('ale-demo-installing');

            aleDemoProgressBar.progress_bar_wrapper_element = jQuery('.ale-demo-' + demo_id + ' .ale-progress-bar-wrap');
            aleDemoProgressBar.progress_bar_element = jQuery('.ale-demo-' + demo_id + ' .ale-progress-bar');
            aleDemoProgressBar.show();
            aleDemoProgressBar.change(2);
        },

        _ui_install_end: function (demo_id) {
            aleDemoProgressBar.change(100);
            setTimeout(function() {
                aleDemoProgressBar.hide();
                aleDemoProgressBar.reset();

                jQuery('.ale-demo-' + demo_id)
                    .removeClass('ale-demo-installing')
                    .addClass('ale-demo-installed');


                jQuery('.ale-demo-disabled').removeClass('ale-demo-disabled');

            }, 500);

        },

        _block_navigation: function () {
            window.onbeforeunload = function() {
                return "The demo is installing now. If you want to close the page, you will need to uninstall the broken demo.";
            };
        },

        _unblock_navigation: function() {
            window.onbeforeunload = '';
        },

        _getAdminAjax: function(stepName) {
            if (typeof stepName === 'undefined') {
                stepName = 'not_set';
            }

            function s4() {
                return Math.floor((1 + Math.random()) * 0x10000)
                    .toString(16)
                    .substring(1);
            }
            return olins_strings.ale_ajax_url + '&step=' + stepName + '&uid=' + s4() + s4() + s4() + s4();
        }
    };

    aleDemoProgressBar = {
        progress_bar_wrapper_element: '',
        progress_bar_element: '',
        current_value: 0,
        goto_value: 0,
        timer:'',
        last_goto_value:0,

        show: function show() {
            aleDemoProgressBar.progress_bar_wrapper_element.addClass('ale-progress-bar-visible');
        },

        hide: function hide() {
            aleDemoProgressBar.progress_bar_wrapper_element.removeClass('ale-progress-bar-visible');
        },

        reset:function reset() {
            clearInterval(aleDemoProgressBar.timer);
            aleDemoProgressBar.current_value = 0;
            aleDemoProgressBar.goto_value = 0;
            aleDemoProgressBar.timer = '';
            aleDemoProgressBar.last_goto_value = 0;
            aleDemoProgressBar.change(0);
        },


        change: function change(new_progress) {
            aleDemoProgressBar.progress_bar_element.css('width', new_progress + '%');
            aleDemoProgressBar.last_goto_value = new_progress;
            if (new_progress === 100) {
                clearInterval(aleDemoProgressBar.timer);
            }
        },


        timer_change: function timer_change(new_progress) {
            clearInterval(aleDemoProgressBar.timer);

            aleDemoProgressBar._ui_change(aleDemoProgressBar.last_goto_value);
            aleDemoProgressBar.current_value = aleDemoProgressBar.last_goto_value;


            clearInterval(aleDemoProgressBar.timer);
            aleDemoProgressBar.timer = setInterval(function(){
                if (Math.floor((Math.random() * 5) + 1) === 1) {
                    var tmp_value = Math.floor((Math.random() * 5) + 1) + aleDemoProgressBar.current_value;
                    if (tmp_value <= new_progress) {
                        aleDemoProgressBar._ui_change(aleDemoProgressBar.current_value);
                        aleDemoProgressBar.current_value = tmp_value;
                    } else {
                        aleDemoProgressBar._ui_change(new_progress);
                        clearInterval(aleDemoProgressBar.timer);
                    }
                }

            }, 1000);
            aleDemoProgressBar.last_goto_value = new_progress;
        },

        _ui_change: function change(new_progress) {
            aleDemoProgressBar.progress_bar_element.css('width', new_progress + '%');
        }
    };

    aleDemoFullInstaller = {

        installNextStep: function (demoId, step, onFinishCallback) {
            if (typeof step === 'undefined') {
                step = 0;
            }

            var steps = aleDemoFullInstaller._getSteps(demoId);

            var currentStep = steps[step];
            aleDemoProgressBar.timer_change(currentStep.progress);

            currentStep.data.ale_magic_token = olins_strings.aleWpAdminImportNonce;


            jQuery.ajax({
                type: 'POST',
                url: aleDemoFullInstaller._getAdminAjax(currentStep.data.ale_demo_action),
                cache:false,
                data: currentStep.data,
                dataType: 'json',
                success: function(data, textStatus, XMLHttpRequest){
                    if (typeof steps[step + 1] !== 'undefined') {
                        aleDemoFullInstaller.installNextStep(demoId, step + 1, onFinishCallback);
                    } else {
                        onFinishCallback();
                    }
                },
                error: function(MLHttpRequest, textStatus, errorThrown){

                    var responseText = MLHttpRequest.responseText.replace(/<br>/g, '\n');

                    console.log('textStatus: ' + textStatus);
                    console.log('errorThrown: ' + errorThrown);
                    console.log('responseText: ' + responseText);

                    alert('An Error. Click ok to continue.\n');

                    if (typeof steps[step + 1] !== 'undefined') {
                        aleDemoFullInstaller.installNextStep(demoId, step + 1, onFinishCallback);
                    } else {
                        onFinishCallback();
                    }
                }
            });
        },


        _getAdminAjax: function(stepName) {
            if (typeof stepName === 'undefined') {
                stepName = 'not_set';
            }

            function s4() {
                return Math.floor((1 + Math.random()) * 0x10000)
                    .toString(16)
                    .substring(1);
            }
            return olins_strings.ale_ajax_url + '&step=' + stepName + '&uid=' + s4() + s4() + s4() + s4();
        },


        _getSteps: function (demoId) {
            return {
                0: {
                    progress: 10,
                    data: {
                        action: 'ale_ajax_demo_install',
                        ale_demo_action: 'remove_content_before_install',
                        ale_demo_id: ''
                    }
                },
                1: {
                    progress: 22,
                    data: {
                        action: 'ale_ajax_demo_install',
                        ale_demo_action:'ale_options_media',
                        ale_demo_id: demoId
                    }

                },
                2: {
                    progress: 28,
                    data: {
                        action: 'ale_ajax_demo_install',
                        ale_demo_action:'ale_works_media',
                        ale_demo_id: demoId
                    }
                },
                3: {
                    progress: 36,
                    data: {
                        action: 'ale_ajax_demo_install',
                        ale_demo_action:'ale_posts_media',
                        ale_demo_id: demoId
                    }
                },
                4: {
                    progress: 48,
                    data: {
                        action: 'ale_ajax_demo_install',
                        ale_demo_action:'ale_pages_media',
                        ale_demo_id: demoId
                    }
                },
                5: {
                    progress: 68,
                    data: {
                        action: 'ale_ajax_demo_install',
                        ale_demo_action:'ale_library_media',
                        ale_demo_id: demoId
                    }
                },
                6: {
                    progress: 85,
                    data: {
                        action: 'ale_ajax_demo_install',
                        ale_demo_action:'ale_import',
                        ale_demo_id: demoId
                    }
                }
            };
        }
    };

})();

ale_wp_admin_demos.init();





