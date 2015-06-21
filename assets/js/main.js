$(document).ready( function() {

  $('#front_slider').carousel({
    interval: 5000 //changes the speed
  });

  echo.init({
      offset: 100,
      offsetLeft: 200,
      offsetRight: 200,
      throttle: 10,
      unload: false,
      callback: function (element, op) {

      }
  });

  $('.head-nav').click( function(e) {
    e.stopPropagation();
    e.preventDefault();
    console.log('yes');
    $('html, body').animate({
        scrollTop: $($(this).attr('href')).offset().top
    }, 2000);
  });

   $("#event_list").owlCarousel({

            loop: true,
            // margin: 10,
            nav: true,
            autoplay: true,
            autoplayTimeout: 3000,
            autoplayHoverPause: true,
            lazyLoad: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 4
                }
            },navText: [
              "<span class='icon-prev'></span>",
              "<span class='icon-next'></span>"
              ],
        });
});

$(function() {
    FastClick.attach(document.body);
});

$(function() {

  $('.event-list').hover( function() {
        $(this).find('.img-title').fadeIn(300);
    }, function() {
        $(this).find('.img-title').fadeOut(100);
    });

  $('.wp0').waypoint(function() {
    $('.wp0').addClass('animated bounceInRight');
  }, {
    offset: '85%'
  });

  $('.wp1').waypoint(function() {
    $('.wp1').addClass('animated bounceInLeft');
  }, {
    offset: '85%'
  });

  $('.wp2').waypoint(function() {
    $('.wp2').addClass('animated bounceInRight');
  }, {
    offset: '85%'
  });

  $('.wp3').waypoint(function() {
    $('.wp3').addClass('animated bounceInLeft');
  }, {
    offset: '85%'
  });

  $('.wp4').waypoint(function() {
    $('.wp4').addClass('animated fadeInUp');
  }, {
    offset: '85%'
  });

  $('.wp5').waypoint(function() {
    $('.wp5').addClass('animated fadeInUp');
  }, {
    offset: '85%'
  });

  $('.wp6').waypoint(function() {
    $('.wp6').addClass('animated fadeInUp');
  }, {
    offset: '85%'
  });
});