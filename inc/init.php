<?php
/**
 * All Theme related functions.
 */

add_filter( 'show_admin_bar', '__return_false' );

/**
 * Add custom post types.
 *
 * @since  1.0.0
 *
 * @return void.
 */
function sp_custom_post_types(){

    $slider_labels = array(
        'name'                => _x( 'Home Sliders', 'Post Type General Name', 'sp' ),
        'singular_name'       => _x( 'Slider', 'Post Type Singular Name', 'sp' ),
        'menu_name'           => __( 'Home Sliders', 'sp' ),
        'parent_item_colon'   => __( 'Parent Slider:', 'sp' ),
        'all_items'           => __( 'All Sliders', 'sp' ),
        'view_item'           => __( 'View Sliders', 'sp' ),
        'add_new_item'        => __( 'Add New Slider', 'sp' ),
        'add_new'             => __( 'Add New', 'sp' ),
        'edit_item'           => __( 'Edit Slider', 'sp' ),
        'update_item'         => __( 'Update Slider', 'sp' ),
        'search_items'        => __( 'Search Slider', 'sp' ),
        'not_found'           => __( 'Not found', 'sp' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'sp' ),
    );
    $slider_args = array(
        'label'               => __( 'Home Sliders', 'sp' ),
        'description'         => __( 'Home Page Sliders', 'sp' ),
        'labels'              => $slider_labels,
        'supports'            => array( 'title', 'thumbnail', 'excerpt' ),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => false,
        'show_in_admin_bar'   => false,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => false,
        'exclude_from_search' => true,
        'publicly_queryable'  => false,
        'capability_type'     => 'page',
        'rewrite'             => array( 'slug' => 'sliderss' ),
    );
    register_post_type( 'sliders', $slider_args );

    $labels = array(
        'name'                => _x( 'Services', 'Post Type General Name', 'sp' ),
        'singular_name'       => _x( 'Service', 'Post Type Singular Name', 'sp' ),
        'menu_name'           => __( 'Services', 'sp' ),
        'parent_item_colon'   => __( 'Parent Service:', 'sp' ),
        'all_items'           => __( 'All Services', 'sp' ),
        'view_item'           => __( 'View Service', 'sp' ),
        'add_new_item'        => __( 'Add New Service', 'sp' ),
        'add_new'             => __( 'Add New', 'sp' ),
        'edit_item'           => __( 'Edit Service', 'sp' ),
        'update_item'         => __( 'Update Service', 'sp' ),
        'search_items'        => __( 'Search Service', 'sp' ),
        'not_found'           => __( 'Not found', 'sp' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'sp' ),
    );
    $args = array(
        'label'               => __( 'Services', 'sp' ),
        'description'         => __( 'Services posts', 'sp' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'editor','thumbnail','excerpt' ),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => false,
        'show_in_admin_bar'   => false,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => false,
        'exclude_from_search' => true,
        'publicly_queryable'  => false,
        'capability_type'     => 'page',
        'rewrite'             => array( 'slug' => 'services' ),
    );
    register_post_type( 'services', $args );

        $events_labels = array(
        'name'                => _x( 'Events', 'Post Type General Name', 'sp' ),
        'singular_name'       => _x( 'Event', 'Post Type Singular Name', 'sp' ),
        'menu_name'           => __( 'Events', 'sp' ),
        'parent_item_colon'   => __( 'Parent Event:', 'sp' ),
        'all_items'           => __( 'All Events', 'sp' ),
        'view_item'           => __( 'View Event', 'sp' ),
        'add_new_item'        => __( 'Add New Event', 'sp' ),
        'add_new'             => __( 'Add New', 'sp' ),
        'edit_item'           => __( 'Edit Event', 'sp' ),
        'update_item'         => __( 'Update Event', 'sp' ),
        'search_items'        => __( 'Search Event', 'sp' ),
        'not_found'           => __( 'Not found', 'sp' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'sp' ),
    );
    $events_args = array(
        'label'               => __( 'Events', 'sp' ),
        'description'         => __( 'Event posts', 'sp' ),
        'labels'              => $events_labels,
        'supports'            => array( 'title', 'editor','thumbnail', 'excerpt' ),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => false,
        'show_in_admin_bar'   => false,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => false,
        'exclude_from_search' => true,
        'publicly_queryable'  => false,
        'capability_type'     => 'page',
        'rewrite'             => array( 'slug' => 'events' ),
    );
    register_post_type( 'events', $events_args );

    $team_labels = array(
        'name'                => _x( 'Team Members', 'Post Type General Name', 'sp' ),
        'singular_name'       => _x( 'Team Member', 'Post Type Singular Name', 'sp' ),
        'menu_name'           => __( 'Team Members', 'sp' ),
        'parent_item_colon'   => __( 'Team Members Post:', 'sp' ),
        'all_items'           => __( 'All Team Members', 'sp' ),
        'view_item'           => __( 'View Team Member', 'sp' ),
        'add_new_item'        => __( 'Add New Team Member', 'sp' ),
        'add_new'             => __( 'Add New Member', 'sp' ),
        'edit_item'           => __( 'Edit Member', 'sp' ),
        'update_item'         => __( 'Update Member', 'sp' ),
        'search_items'        => __( 'Search Member', 'sp' ),
        'not_found'           => __( 'Not found', 'sp' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'sp' ),
    );
    $team_args = array(
        'label'               => __( 'Team Members', 'sp' ),
        'description'         => __( 'Team Member detailed posts', 'sp' ),
        'labels'              => $team_labels,
        'supports'            => array( 'title','thumbnail', 'excerpt' ),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => false,
        'show_in_admin_bar'   => false,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => false,
        'exclude_from_search' => true,
        'publicly_queryable'  => false,
        'capability_type'     => 'page',
    );
    register_post_type( 'ourteam', $team_args );

    $test_labels = array(
        'name'                => _x( 'Testimonials', 'Post Type General Name', 'sp' ),
        'singular_name'       => _x( 'Testimonial', 'Post Type Singular Name', 'sp' ),
        'menu_name'           => __( 'Testimonials', 'sp' ),
        'parent_item_colon'   => __( 'Parent Testimonial:', 'sp' ),
        'all_items'           => __( 'All Testimonials', 'sp' ),
        'view_item'           => __( 'View Testimonial', 'sp' ),
        'add_new_item'        => __( 'Add New Testimonial', 'sp' ),
        'add_new'             => __( 'Add New', 'sp' ),
        'edit_item'           => __( 'Edit Testimonial', 'sp' ),
        'update_item'         => __( 'Update Testimonial', 'sp' ),
        'search_items'        => __( 'Search Testimonial', 'sp' ),
        'not_found'           => __( 'Not found', 'sp' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'sp' ),
    );
    $test_args = array(
        'label'               => __( 'Testimonials', 'sp' ),
        'description'         => __( 'Testimonial posts', 'sp' ),
        'labels'              => $test_labels,
        'supports'            => array( 'title', 'editor','thumbnail','excerpt' ),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => false,
        'show_in_admin_bar'   => false,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => false,
        'exclude_from_search' => true,
        'publicly_queryable'  => false,
        'capability_type'     => 'page',
    );
    register_post_type( 'testimonials', $test_args );

}
add_action( 'init', 'sp_custom_post_types', 999 );

/**
 * Add custom meta boxes.
 *
 * @since  1.0.0
 *
 * @return void.
 */
function sp_custom_metabox() {
    add_meta_box( '_post_custom_fields', __( 'Social Links', 'sp' ), 'custom_fields_callback', 'ourteam' ); 
    add_meta_box( '_icon_custom_fields', __( 'Details', 'sp'), 'custom_fields_callback', 'services' );
}
add_action( 'add_meta_boxes', 'sp_custom_metabox' );

/**
 * Call back function for custom meta boxes.
 *
 * @since  1.0.0
 *
 * @param  Post $post   Post to create meta box.
 *
 * @return void.
 */
function custom_fields_callback($post) {
    wp_nonce_field( 'custom_fields_meta_box', 'custom_fields_meta_box_nonce' );

    $postype = get_post_type( $post );
    if( $postype == 'ourteam' ) {

    $links    = get_post_meta( $post->ID, '_team_custom_fields', true );

    ?>
    <table class="form-table">
        <tr valign="top">
            <th scope="row">
                <label for="member_fb_link"> <?php _e( 'Facebook Link', 'lk' ); ?> </label>
            </th>
            <td><input  type="text" id="member_fb_link" name="member_fb_link" value="<?php echo @$links['fblink']; ?>" size="100"/>
            </td>
        </tr>

        <tr valign="top">
            <th scope="row"> <label for="member_twitter_link"> <?php _e( 'Twitter Link', 'lk' ); ?> </label></th>
            <td><input  type="text" id="member_twitter_link" name="member_twitter_link" value="<?php echo @$links['twlink']; ?>" size="100"/>
            </td>
        </tr>

        <tr valign="top">
            <th scope="row"> <label for="member_gplus_link"> <?php _e( 'Google Plus Link', 'lk' ); ?></label></th>
            <td><input type="text" id="member_gplus_link" name="member_gplus_link" value="<?php echo @$links['gplus']; ?>" size="100" /></td>
        </tr>
    </table>

    <?php
    } elseif( $postype == 'services') {
        $post_icon = get_post_meta( $post->ID, '_custom_icon_box', true );
        $image_title = get_post_meta( $post->ID, '_img_title_box', true );
        ?>
        <style>
        .icons-display span:before {
            display: inline-block;
            width: 1em;
            text-align: center;
        }
        .icons-display span:hover, .icons-display span.active {
            background: none repeat scroll 0% 0% #B13CB6;
            color: #FFF;
            cursor: pointer;
            border: solid 2px #B13CB6;
        }
        .icon-place {
            top: 10px;
            right: 0;
            left: 0;
            margin:0 auto;
            padding: 8px 5px;
            width: 70px;
            height: 70px;

            color: #fff;
            font-size: 50px;

            background: #00aff7;
            border: solid 2px #00aff7;
            border-radius: 30%;
        }
        </style>
        <script type="text/javascript">
            jQuery(document).ready(function($){
                $('.icon-place').click( function() {
                    $(this).addClass('active');
                    $(this).siblings().removeClass('active');
                    $("#post_icon").val( $(this).attr('data-value'));
                });
                $('.icons-display span').each( function() {

                    if( $("#post_icon").val() == $(this).attr('data-value') ) {
                        $(this).addClass('active');
                    }
                });
            });
        </script>
        <table class="form-table">
            <tr valign="top">
                <th scope="row">
                    <label for="post_icon"> <?php _e( 'Select Icon For This Service: ', 'sp' ); ?> </label>
                </th>
                <td>
                    <div class="icons-display">
                        <span class="glyphicon glyphicon-camera icon-place"  data-value="glyphicon glyphicon-camera" title="Camera"></span>
                        <span class="glyphicon glyphicon-grain icon-place"  data-value="glyphicon glyphicon-grain" title="Leaf"></span>
                        <span class="glyphicon glyphicon-cutlery icon-place" data-value="glyphicon glyphicon-cutlery" title="Food"></span>
                        <span class="glyphicon glyphicon-tree-conifer icon-place" data-value="glyphicon glyphicon-tree-conifer" title="Tree"></span>
                        <span class="glyphicon glyphicon-music icon-place" data-value="glyphicon glyphicon-music" title="Music"></span>
                        <span class="glyphicon glyphicon-star icon-place" data-value="glyphicon glyphicon-star" title="Star"></span>
                    </div>
                    <input type="hidden" id="post_icon" name="post_icon" value="<?php echo $post_icon; ?>">
                </td>
            </tr>
            <tr valign="top">
                <th scope="row"><label for="img_title"><?php _e( 'Title on Image:', 'sp' ); ?></label></th>
                <td>
                    <input type="text" class="code large-text" name="img_title" id="img_title" value="<?php echo $image_title; ?>" />
                </td>
            </tr>
        </table>

        <?php
    }
}

/**
 * Update team custom fields when save/update post.
 *
 * @since  1.0.0
 *
 * @param  int    $post_id Post's id.
 *
 * @return void.
 */
function save_team_custom_fields( $post_id ){

    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }

    if( isset( $_POST['ourteam'] ) && 'page' == $_POST['ourteam'] ) {
        if ( ! current_user_can( 'edit_page', $post_id ) ) {
          return;
        }
    } else {
        if ( ! current_user_can( 'edit_post', $post_id ) ) {
            return;
        }
    }

     // Check if our nonce is set.
    if ( ! isset( $_POST['custom_fields_meta_box_nonce'] ) ) {
        return;
    }

    if( ! wp_verify_nonce( $_POST['custom_fields_meta_box_nonce'], 'custom_fields_meta_box' ) ) {
        return;
    }

    $twlink = ''; $fblink = ''; $gplus = ''; $linkedin = ''; $github= '';
    if( isset( $_POST['member_fb_link'] ) ) {
        $fblink = esc_attr( $_POST['member_fb_link'] );
    }

    if( isset( $_POST['member_twitter_link'] ) ) {
        $twlink = esc_attr( $_POST['member_twitter_link'] );
    }

    if( isset( $_POST['member_gplus_link'] ) ) {
        $gplus  = esc_attr( $_POST['member_gplus_link'] );
    }

    $fields = array(
        'fblink'    => $fblink,
        'twlink'    => $twlink,
        'gplus'     => $gplus,
    );
    update_post_meta( $post_id, '_team_custom_fields', $fields );
}
add_action( 'save_post', 'save_team_custom_fields' );

/**
 * Save career custom meta box values when save/update post.
 *
 * @since  1.0.0
 *
 * @param  int    $post_id Post's id.
 *
 * @return void.
 */
function save_services_custombox( $post_id ) {
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }

    if( isset( $_POST['services'] ) && 'page' == $_POST['services'] ) {
        if ( ! current_user_can( 'edit_page', $post_id ) ) {
          return;
        }
    } else {
        if ( ! current_user_can( 'edit_post', $post_id ) ) {
            return;
        }
    }

     // Check if our nonce is set.
    if ( ! isset( $_POST['custom_fields_meta_box_nonce'] ) ) {
        return;
    }

    if( ! wp_verify_nonce( $_POST['custom_fields_meta_box_nonce'], 'custom_fields_meta_box' ) ) {
        return;
    }

    $icon_class = '';

    if( isset( $_POST['post_icon'] ) ) {
        $icon_class = esc_attr( $_POST['post_icon'] );
    }
    update_post_meta( $post_id, '_custom_icon_box', $icon_class );

    if( isset( $_POST['img_title'] ) ) {
        update_post_meta( $post_id, '_img_title_box', $_POST['img_title'] );
    }
}
add_action( 'save_post', 'save_services_custombox' );


/**
 * Default option values. Fetches when db options not created.
 *
 * @since  1.0.0
 *
 */
if ( ! function_exists( 'sp_get_option' ) ) {
    function sp_get_option( $key ) {

        $theme_options      = get_option( '_blue_star_options' );

        $defaults           = array(
            'facebook_link'     => 'https://facebook.com',
            'twitter_link'      => 'https://twitter.com',
            'gplus_link'        => 'https://plus.google.com',
            'services_title'    => 'Blue Stars Event Management',
            'services_intro'    => '',
            'contact_address'   => '<p><span class="bold-16p">Blue Stars Events Management</span><br>
            2250 Lexington Avenue<br>
            Chennai - <a href="mailto:info@bluestarsevents.com">info@bluestarsevents.com</a><br>
            <strong>Ph:</strong> +91 - 1234567890<br />
            <strong>Ph:</strong> +91 - 1234567890<br />
            <strong>Ph:</strong> +91 - 1234567890<br />
            </p>',
            'picture_ids'       => '',
        );

        $theme_options = wp_parse_args( $theme_options, $defaults );

        if ( isset( $theme_options[ $key ] ) )
            return $theme_options[ $key ];

        return false;
    }
}