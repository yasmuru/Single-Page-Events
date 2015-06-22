<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Single Page Events
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo home_url(); ?>"><?php echo get_bloginfo('name');?></a>
            </div>
            <?php if( is_front_page() ) { ?>
            <div class="collapse navbar-collapse push-right" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav header-nav">
                	<?php 
                	// wp_nav_menu( array( 'theme_location' => 'primary', 'container' => false ) ); 
                	?>                    
                    <li>
                        <a class="head-nav" href="#services">Services</a>
                    </li>
                    <li>
                        <a class="head-nav" href="#events">Events</a>
                    </li>
                    <li>
                        <a class="head-nav" id="about" href="#our_team">Our Team</a>
                    </li>
                    <li>
                        <a class="head-nav" href="#contact">Contact Us</a>
                    </li>
                </ul>
            </div>
            <?php } ?>
        </div>
        <!-- /.container -->
    </nav>

    <?php
    	if( is_front_page() ) {

            $slider_args = array(
                'post_type' => 'sliders',
                'showposts' => -1,
                'order'     => 'ASC',
            );

            $slider_posts = new WP_Query( $slider_args );

            if( $slider_posts->have_posts() ) {
                echo '<header id="front_slider" class="carousel slide">';
                echo '<ol class="carousel-indicators">';
                for($i = 0; $i<$slider_posts->found_posts; $i++) {
                    $class="";
                    if( $i == 0 ) {
                        $class= 'active';
                    }
                    echo '<li data-target="#front_slider" data-slide-to="' . $i . '" class="' . $class . '"></li>';
                }
                echo '</ol>';

                echo '<div class="carousel-inner">';
                $slide_count = 1;
                while( $slider_posts->have_posts() ) : $slider_posts->the_post();
                    $img_src    =   wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID(), 'full' ), 'full' );
                    if( $img_src ) {
                        if( is_array( $img_src ) ) {
                            $class="";
                            if($slide_count == 1) {
                                $class = 'active';
                            }
                            echo '<div class="item ' . $class . '">';
                            echo '<div class="fill" style="background-image:url(' . $img_src[0] . ');"></div>';
                            echo '<span class="layer"></span>';
                            echo '<div class="slider-text">';
                            echo '<h3>' . get_the_title() . '</h3>';
                            echo '<p>' . get_the_excerpt() . '</p>';
                            echo '</div></div>';                   
                            $slide_count++;
                        }
                    }
                endwhile;

                echo '</div>';
                echo '<a class="left carousel-control" href="#front_slider" data-slide="prev"><span class="icon-prev"></span></a>';
                echo '<a class="right carousel-control" href="#front_slider" data-slide="next">';
                echo '<span class="icon-next"></span>';
                echo '</a></header>';
            }
}
    		?>