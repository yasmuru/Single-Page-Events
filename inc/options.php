<?php
/**
 * Theme Settings.
 */
if(!defined('ABSPATH')) exit;

/**
 * Setup Theme Admin Menu
 */
function setup_theme_admin_menus() {
    add_submenu_page('themes.php',
        'Theme Settings', 'Theme Settings', 'manage_options',
        'theme-settings-page', 'theme_front_page_settings');
}
add_action('admin_menu', 'setup_theme_admin_menus');

/**
 * Theme Options Page
 */
function theme_front_page_settings() {
    if (!current_user_can('manage_options')) {
        wp_die('You do not have sufficient permissions to access this page.');
    }
?>
<div class="wrap">
<?php
    if (isset($_POST["update_settings"])) {
        check_admin_referer('update-theme-config');

        $theme_options          = array(
            'facebook_link'     => esc_url( $_POST['facebook_link'] ),
            'twitter_link'      => esc_url( $_POST['twitter_link'] ),
            'gplus_link'        => esc_url( $_POST['gplus_link'] ),
            'contact_address'   => esc_html( wp_unslash( $_POST['contact_address'] ) ),
            'services_title'    => esc_attr( $_POST['services_title'] ),
            'services_intro'    => esc_attr( wp_unslash( $_POST['services_intro'] ) ),
            'picture_ids'       => esc_attr( $_POST['picture_ids'] ),
            'contact_shortcode' => esc_attr( $_POST['contact_shortcode'] ),
        );
        update_option('_blue_star_options', $theme_options);
    ?>
        <div id="message" class="updated">Settings saved</div>
    <?php

    }

    $facebook_link          = esc_url( sp_get_option( 'facebook_link' ) );
    $twitter_link           = esc_url( sp_get_option( 'twitter_link' ) );
    $gplus_link             = esc_url( sp_get_option( 'gplus_link' ) );
    $contact_address        = html_entity_decode( esc_html( wp_unslash( sp_get_option( 'contact_address' ) ) ) );
    $services_title         = esc_attr( sp_get_option( 'services_title' ) );
    $services_intro         = esc_attr( sp_get_option( 'services_intro' ) );
    $picture_ids            = esc_attr( sp_get_option( 'picture_ids' ) );
    $contact_shortcode      = esc_attr( sp_get_option( 'contact_shortcode' ) );
    ?>
<h2>Theme Settings</h2>

<form method="POST" action="">
    <?php wp_nonce_field('update-theme-config') ?>
    <input type="hidden" name="update_settings" value="Y" />

    <table class="form-table">
        <tr valign="top">
            <th scope="row"><label for="services_title"><?php _e( 'Intro Title', 'sp' ); ?></label></th>
            <td>
                <input type="text" name="services_title" id="services_title" value="<?php echo $services_title; ?>" class="code large-text" />
            </td>
        </tr>
        <tr valign="top">
            <th scope="row"><label for="services_intro"><?php _e( 'Introduction Content', 'sp' ); ?></label></th>
            <td>
                <textarea name="services_intro" id="services_intro" rows="5" cols="100" class="code"><?php echo $services_intro; ?></textarea> 
            </td>
        </tr>
        <tr valign="top">
            <th scope="row"><label for="contact_address"><?php _e( 'Contact Address', 'sp' ); ?></label></th>
            <td>
                <?php wp_editor( $contact_address, 'contact_address', array( 'textarea_rows' => '10', 'media_buttons' => false ) ); ?>
            </td>
        </tr>
        <tr valign="top">
            <th scope="row"><label for="facebook_link"><?php _e( 'Facebook URL', 'sp' ); ?></label></th>
            <td>
                <input type="text" name="facebook_link" id="facebook_link" value="<?php echo $facebook_link; ?>" class="code large-text" />
            </td>
        </tr>
        <tr valign="top">
            <th scope="row"><label for="twitter_link"><?php _e( 'Twitter URL', 'sp' ); ?></label></th>
            <td>
                <input type="text" name="twitter_link" id="facebook_link" value="<?php echo $twitter_link; ?>" class="code large-text" />
            </td>
        </tr>
        <tr valign="top">
            <th scope="row"><label for="gplus_link"><?php _e( 'Google Plus URL', 'sp' ); ?></label></th>
            <td>
                <input type="text" name="gplus_link" id="gplus_link" value="<?php echo $gplus_link; ?>" class="code large-text" />
            </td>
        </tr>
        <tr valign="top">
            <th scope="row"><label for="event_images"> <?php _e( 'Upload Event Images', 'lk' ); ?></label></th>
            <td>
                <div class="toggle-image">
                    <input id="event_image_button" class="button" type="button" value="Upload Images" />
                    <span class="show-image">Hide images</span>
                    <ul id="c_images">
                        <input id="picture_ids" name="picture_ids" type="hidden" value="<?php echo $picture_ids; ?>" />
                        <?php
                            if( ! empty( $picture_ids ) ) {
                                $pictures_ids = explode( ';', $picture_ids );
                                foreach( $pictures_ids as $id ) {
                                    $generated_id = $id . ';';
                                    $id = str_replace('id-', '', $id );
                                    if( ! empty( $id ) ) {
                                        echo '<li id="' . $generated_id . '" ><span class="c-close"></span>';
                                        echo wp_get_attachment_image( $id, 'medium' );
                                        echo '</li>';
                                    }
                                }
                            }
                        ?>
                    </ul>
                </div>
            </td>
        </tr>

        <tr valign="top">
            <th scope="row"><label for="contact_shortcode"><?php _e('Contact Form 7', 'sp'); ?></label></th>
            <td>
                <?php 
                include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
                if( is_plugin_active('contact-form-7/wp-contact-form-7.php') ) { ?>
                <select name="contact_shortcode" id="contact_shortcode">
                    <?php
                        $args = array('post_type' => 'wpcf7_contact_form', 'posts_per_page' => -1);
                        
                        if( $cf7Forms = get_posts( $args ) ){
                            foreach($cf7Forms as $cf7Form){
                                $selected = '';
                                if( $contact_shortcode == $cf7Form->ID  ) {
                                    $selected = 'selected';
                                }
                                echo '<option value="' . $cf7Form->ID . '" ' . $selected . ' > ' . $cf7Form->post_title . ' </option>' ;
                            }
                        }
                    ?>
                </select>
                <?php } else {
                    echo '<p>Please activate contact form 7 plugin</p>';
                    echo '<input type="hidden" name="contact_shortcode" id="contact_shortcode" value="' . $contact_shortcode . '">';
                } ?>
            </td>
        </tr>
    </table>
    
    <?php submit_button(); ?>
</form>
<?php
    wp_enqueue_script( 'admin-script', THEME_JS_URL . '/admin.js', array(), '1.0.0' );
    wp_enqueue_style( 'admin-style', THEME_CSS_URL . '/admin.css', array(), '1.0.0' );
}
?>