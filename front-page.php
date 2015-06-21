<?php
/** 
 * Front page template.
 */
get_header();
?>
<div id="services">
  <div class="container-fluid intro" id="about">
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <span class="glyphicon glyphicon-star top-icon"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span>
          <h1 class="chain"><?php echo esc_attr( sp_get_option( 'services_title' ) ); ?></h1>
          <p class="text-intro"><?php echo esc_attr( wp_unslash( sp_get_option( 'services_intro' ) ) ); ?></p>
        </div>
      </div>
    </div>
    <?php
      $service_args = array(
        'post_type' => 'services',
        'showposts' => -1,
        'order'     => 'ASC',
      );
      $service_posts = new WP_Query( $service_args );

      if( $service_posts->have_posts() ) :
        echo '<div class="container-fluid">';
        $left = true; $count = 0;
        while( $service_posts->have_posts() ) : $service_posts->the_post();
         $img_src    =   wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID(), 'full' ), 'full' );
          if( $img_src ) {
            if( is_array( $img_src ) ) {
              $post_icon = get_post_meta( get_the_ID(), '_custom_icon_box', true );
              $img_title = get_post_meta( get_the_ID(), '_img_title_box', true );
              echo '<div class="row">';
              if( $left ) {
                echo '<div class="col-md-6 section event-list nopadding" data-echo-background="' . $img_src[0] .'">';
                echo '<div class="img-title"><h3>' . $img_title . '</h3></div></div>';
                echo '<div class="col-md-6 section-text nopadding">';
                echo '<div class="wp' . $count . '">';
                echo '<span class="icon-right ' . $post_icon . '"></span>';
                echo '<h2 class="frame">' . get_the_title() . '</h2>';
                echo '<p>' . get_the_content() . '</p>';
                echo '</div></div>';

                $left = false;
              } else {
                echo '<div class="col-md-6 section-text nopadding">';
                echo '<div class="wp' . $count . '">';
                echo '<span class="icon-left ' . $post_icon . '"></span>';
                echo '<h2 class="mech">' . get_the_title() . '</h2>';
                echo '<p>' . get_the_content() . '</p>';
                echo '</div></div>';
                echo '<div class="col-md-6 section event-list nopadding" data-echo-background="' . $img_src[0] .'">';
                echo '<div class="img-title"><h3>' . $img_title . '</h3></div></div>';
      
                $left = true;
              }
              echo '</div>';
              $count++;
            } 
          }
          endwhile;
          echo '</div></div>';

      endif;

      $args = array(
        'post_type' => 'events',
        'showposts' => -1,
      );
      $event_posts = new WP_Query($args);
      if ( $event_posts->have_posts() ) :
        echo '<section id="events" class="portfolio-section"><article class="">';
        echo '<div class="">';
        echo '<h3> All Events </h3>';
        echo '<ul id="event_list" class="owl-carousel">';
        while( $event_posts->have_posts() ) : $event_posts->the_post();
          $img_src    =   wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID(), 'event' ), 'event' );
          if( $img_src ) {
              if( is_array( $img_src ) ) {
            echo '<li class="item">';
            echo '<figure>';
            echo '<img src="' . $img_src[0] . '" />';
            echo '<span class="layer"></span>';
            echo '<div class="mask">';
            echo '<h2>' . get_the_title() . '</h2>';
            echo '<p>' . get_the_excerpt() . '</p>';
            echo '</div></figure></li>';
          } }
        endwhile;

        echo '</ul></div></article></section>';

      endif;

  $team_args = array(
    'post_type' => 'ourteam',
    'showposts' => 3,
  );

  $team_posts = new WP_Query($team_args);

  if( $team_posts->have_posts() ) {
    echo '<section id="our_team" class="our-team">';
    echo '<div class="container">';
    echo '<h3>Our Team</h3>';
    echo '<ul id="team_list">';

    while( $team_posts->have_posts() ) : $team_posts->the_post();
      $img_src    =   wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID(), 'featured' ), 'featured' );
      if( $img_src ) {
        echo '<li class="col-md-4">';
        echo '<div class="member">';
        echo '<div class="ih-item circle colored effect10 bottom_to_top">';
        echo '<a><div class="img"><img src="' . $img_src[0] . '"></div>';
        echo '<div class="info">';
        echo '<h3>' . get_the_title() . '</h3>';
        echo '<p>' . get_the_excerpt() . '</p>';
        echo '</div></a>';
        $social_links   = get_post_meta( get_the_ID(), '_team_custom_fields', true );
        if( is_array($social_links) ) :
          echo '<div class="team-social col-sm-6">';
          echo '<ul>'; 
          if( ! empty($social_links['fblink']) ) {
            echo '<li><a href="' . $social_links['fblink'] . '" target="_blank" class="facebook-icon social-icon"></a></li>';
          }
          if( !empty($social_links['twlink']) ) {
            echo '<li><a href="' . $social_links['twlink'] . '" target="_blank" class="twitter-icon social-icon"></a></li>';
          }
          if(! empty($social_links['gplus']) ) {
            echo '<li><a href="' . $social_links['gplus'] . '" target="_blank" class="gplus-icon social-icon"></a></li>';
          }
          echo '</ul></div>';

        endif;
        echo '</div></div></li>';
      }
    endwhile; 
    echo '</ul></div></section>';
  }
 
get_footer();