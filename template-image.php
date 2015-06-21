<?php
/**
 * Template Name: Image Gallery
 */
get_header();?>

<section class="image-gallery">
<?php
$picture_ids = sp_get_option('picture_ids');

if( ! empty( $picture_ids ) ) {
    echo '<div id="gallery-container">';
    echo '<ul class="items--small">';
    $pictures_ids = explode( ';', $picture_ids );
    $picture_count = 0;
    foreach( $pictures_ids as $id ) {
        $generated_id = $id . ';';
        $id = str_replace('id-', '', $id );
        if( ! empty( $id ) ) {
            $image_medium = wp_get_attachment_image_src( $id, 'medium' );
            echo '<li class="item"><a href="#"><img data-echo="' . $image_medium[0] . '"></a></li>';
        }
    }
    echo '</ul>';

    echo '<ul class="items--big">';
    foreach( $pictures_ids as $id ) {
        $generated_id = $id . ';';
        $id = str_replace('id-', '', $id );
        if( ! empty( $id ) ) {
            $image = wp_get_attachment_image_src( $id, 'featured' );
            echo '<li class="item--big">';
            echo '<a href="#">';
            echo '<img data-echo="' . $image[0] , '">';
            echo '</a></li>';
        }
    }
    echo '</ul>';

?>
     <div class="controls">
      <span class="control icon-arrow-left" data-direction="previous"></span> 
      <span class="control icon-arrow-right" data-direction="next"></span> 
      <span class="grid icon-grid"></span>
      <span class="fs-toggle icon-fullscreen"></span>
    </div>
</div>
    <?php
}
?>
</section>
<?php
get_footer();
?>
<script>
    $(document).ready(function(){
     $('#gallery-container').sGallery({
        fullScreenEnabled: true
      });
    });
  </script>