/******************************************/
/*Back To Top - Start                     */
/******************************************/

jQuery(document).ready(function( $ ) {
$(window).scroll(function() {

      if ($(this).scrollTop() > 50) {
          $('.back-to-top').fadeIn('slow');
      } else {
          $('.back-to-top').fadeOut('slow');
      }
      
  });
 $('.back-to-top').click(function(){
      $('html, body').animate({scrollTop : 0},1500);
      return false;
  });
});

/******************************************/
/*Back To Top - End                       */
/******************************************/


/******************************************/
/*Smooth Scroll - Start                   */
/******************************************/

$(function() {
    var scroll = new SmoothScroll('a[href*="#section"]');
});


/******************************************/
/*Smooth Scroll - End                     */
/******************************************/


/******************************************/
/*Mobile Navbar Collapse - Start          */
/******************************************/

function closeFunction()
  { 
    document.getElementById('collapse_target').style.display = "none";

  }
function openFunction(){
    document.getElementById('collapse_target').style.display = "initial";
  }


/******************************************/
/*Mobile Navbar Collapse - End            */
/******************************************/

