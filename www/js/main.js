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


