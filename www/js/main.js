$(function () {
                $.nette.init();
            });

$(document).ready(function() {
    
  $('.images').magnificPopup({
    delegate: "a:has(img)",
    type: 'image',
    gallery: {
      enabled: true,
      tPrev: 'Předchozí (Levá šipka)', 
      tNext: 'Další (Pravá šipka)',
      tCounter: '<span class="mfp-counter">%curr% z %total%</span>'
    },
    midClick: true,
    
    zoom: {
        enabled: true,
        duration: 200, 
        easing: 'ease-in-out',    
        opener: function(openerElement) {
            return openerElement.is('img') ? openerElement : openerElement.find('img');
        }
    }
  });
  
  $('.photo-pop').magnificPopup({
    type: 'image',  
    midClick: true,
    
    zoom: {
        enabled: true,
        duration: 200, 
        easing: 'ease-in-out',    
        opener: function(openerElement) {
            return openerElement.is('img') ? openerElement : openerElement.find('img');
        }
    }
  });
  
});

function slideSwitch() {
    var $active = $('#slideshow a.active-s');

    if ( $active.length == 0 ){
        $active = $('#slideshow a:last');
    }

    var $next =  $active.next().length ? $active.next(): $('#slideshow a:first');



    $active.addClass('last-active');


    $next.children().css({opacity: 0.0});
    $next.addClass('active-s');

    $next.children().animate({opacity: 1.0}, 1000, function() {
            $active.removeClass('active-s last-active');
        });
}

$(function() {
    setInterval( "slideSwitch()", 5000 );
});