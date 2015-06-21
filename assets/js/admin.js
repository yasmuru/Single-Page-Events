jQuery(document).ready(function($){ 
    var cus_uploader;
    $('#event_image_button').click(function(e) {

        e.preventDefault();
        //If the uploader object has already been created, reopen the dialog
        if (cus_uploader) {
            cus_uploader.open();
            return;
        }
        //Extend the wp.media object
        cus_uploader = wp.media.frames.file_frame = wp.media({
            title: 'Choose Images',
            button: {
                text: 'Choose Images'
            },
            multiple: true,
        });

        //When a file is selected, grab the URL and set it as the text field's value
        cus_uploader.on('select', function() {
            attachment = cus_uploader.state().get('selection').toJSON();

            for( var i=0; i<attachment.length; i++ ) {
                var url             = attachment[i].url;
                // url                 = url.replace(/.([^.]*)$/,'-150x150.'+'$1');
                var generated_id    = 'id-'+ attachment[i].id + ';';
                var img             = '<li id="' + generated_id + '"><span class="c-close"></span><img src="' + url + '"/></li>';
                $('#c_images').append(img);
                $('#picture_ids').val($('#picture_ids').val() + generated_id );
            }

        });

        //Open the uploader dialog
        cus_uploader.open();
    });

    $(".c-close").live('click', function(){
        var remove_image = $("#picture_ids").val().replace( $(this).parent().attr('id') , '' );
        $("#picture_ids").val( remove_image );
        $(this).parent("li").fadeOut(300);
    });
});