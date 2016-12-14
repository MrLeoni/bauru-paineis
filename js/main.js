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
  // usefull to clear the main navigation menu from the wp admin bar, when logged in
  function clearElement(element, target) {
    
    // check to see if element exist and only execut the function if it's true
    if( element.length > 0 ) {
      var value = element.css('height');
      target.css('margin-top', value);
    }
    
  }
  
  // clear the '.site-header' from wp admin bar when users are logged in
  clearElement(jQuery('#wpadminbar'), jQuery('.site-header'));
  
  // creat a space behind of the '.site-header'. This way the content of the site will
  // not get hidden, since we are using position asolute in the header
  clearElement(jQuery('.site-header'), jQuery('.clear-header'));
  
  
  
  /*-------------------------------------
  // Locals page function
  //-----------------------------------*/
  
  jQuery('.js-btn-trigger').click(function() {
    
    //Applying 'active' class only to the cliked button
    jQuery(this).toggleClass('active');
    
    // Remove 'active' class if the button clicked isn't the actual 'active' button
    jQuery('.js-btn-trigger').not(jQuery(this)).removeClass('active');
    
    // Check if the button has class 'active' when its clicked
    var classCheck = jQuery(this).hasClass('active');
    
    // Storing important elements in variables
    // Get the clicked btn id
    var btnId = jQuery(this).attr('id');
    
    // Using the button id to pick the correspondent '<article>'
    var element = jQuery('article[data-post="' + btnId + '"]');
    
    // Get all <article> except the 'element'
    var elementHide = jQuery('.local-post-content').not(jQuery(element));
    
    // If btn has 'active' class
    if (classCheck) {
      
      // Hide all 'local-post-content'
      elementHide.animate({opacity: "0"}, 200, function() {
        elementHide.slideUp(200);
      });
      
      // Show the correspondent '<article>'
      element.slideDown(200, function() {
        element.animate({opacity: "1"}, 200);
      });
      
    } else {
      
      element.animate({opacity: "0"}, 200, function() {
        element.slideUp(200);
      });
    }
    
  });
  
  
  
   /*-------------------------------------
  // Locals page function
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