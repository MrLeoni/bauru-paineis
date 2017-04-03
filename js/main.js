/*!
 * main v1.0.0 (http://agenciadelucca.com.br)
 */

jQuery(document).ready(function() {



  /*-------------------------------------
  // Navigation functions
  //-----------------------------------*/
  
  // open and close menu
  jQuery('#js-mobile-btn').click(function() {
    
    // check if the window is smaller than 1200px
    if(jQuery(window).width() < 1200) {
      
      // apply an '.active' class in the '#js-mobile-btn'
      jQuery(this).toggleClass('active');
      
      // check if the button has '.active' class
      var active = jQuery(this).hasClass('active');
      
      // storing the main navigation element
      nav = jQuery('.nav-links');
      
      // if button has class '.active'
      if(active) {
        
        // slide down the main navigation and change opacity to 1. This will generate
        // a smooth fade in effect after the main nav get slide down completely
        nav.slideDown(200, function() {
          nav.animate({ opacity: '1' }, 300);
        });
        
        // if the button hasn't a '.active' class
      } else {
        
        // change opacity of nav to 0 and then slide up the navigation
        nav.animate({ opacity: '0' }, 200, function() {
          nav.slideUp(300);
        })
        
      } // end if(active)
    
    }// end if(... < 1200)
    
  });
  
  // get height of an 'element' and apply on margin-top of the 'target'
  function clearElement(element, target) {
    if( element.length > 0 ) {
      
      var value = element.css('height');
      target.css('margin-top', value);
      
    }
  }
  
  // clear the '.site-header' from wp admin bar when users are logged in
  clearElement(jQuery('#wpadminbar'), jQuery('.site-header'));
  
  // create a space behind of the '.site-header'. This way the content of the site will
  // not get hidden, since we are using position asolute in the header
  clearElement(jQuery('.site-header'), jQuery('.clear-header'));
  
  
  
  /*-------------------------------------
  // Home page
  //-----------------------------------*/
  jQuery('.banner-slider').bxSlider({
    controls: false,
     speed: 600,
     pause: 7000,
     auto: true,
     mode: 'fade',
  });
  
  
  /*-------------------------------------
  // Blog page function
  //-----------------------------------*/
  
  var margin = function(screen) {
    
    var result;
    
    if (screen.width() < 460) {
      return result = 10;
    } else {
      return result = 60;
    }
    
  }
  
  jQuery('.clients-slider').bxSlider({
    pager: false,
    speed: 600,
    slideWidth: 150,
    minSlides: 2,
    maxSlides: 5,
    moveSlides: 1,
    slideMargin: margin(jQuery(window)),
  });
  
  
  
  /*-------------------------------------
  // Locals page function
  //-----------------------------------*/
  
  
  jQuery('.js-expand').click(function() {
    
    var clickedId = jQuery(this).attr('id');
    var arrow = jQuery('#' + clickedId + ' i.fa');
    var element = jQuery('*[data-target="' + clickedId + '"]');
    var elementDisplay = element.css('display');
    
    if ( elementDisplay === 'none') {
      element.slideDown(200);
      arrow.removeClass('fa-caret-down');
      arrow.addClass('fa-caret-up');
    } else {
      element.slideUp(200);
      arrow.removeClass('fa-caret-up');
      arrow.addClass('fa-caret-down');
    }
    
  });
  
  
  
  
  /*-------------------------------------
  // Single local page
  //-----------------------------------*/
  jQuery('.local-slider')
  .bxSlider({
    pager: false,
    auto: true,
    autoHover: true,
    speed: 600,
    pause: 7000
  })
  .magnificPopup({
    delegate: 'a',
    type: 'image',
    gallery: {
      enabled: true,
      tCounter: '',
    }
  });
  
  jQuery('.local-content').on('click', '#js-print', function() {
    window.print();
  });
  
  
  
  
  
  
   /*-------------------------------------
  // Blog page function
  //-----------------------------------*/
  
  jQuery('.blog-gallery').magnificPopup({
    delegate: 'a',
    type: 'image',
    gallery: {
      enabled: true
    }
  });



  /*-------------------------------------
  // Footer functions
  //-----------------------------------*/

  // display the current year
  function currentDate() {
    var date = new Date();
    jQuery("#js-date").html(date.getFullYear());
  }
  currentDate();

});