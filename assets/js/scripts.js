
/*
These functions make sure WordPress
and Materialize play nice together.
*/






//
//         $(document).ready(function(){
//         var headerHeight = $("header").height();
//     $('a[href^="#more"]').on('click',function (e) {
//         e.preventDefault();
//
//         var target = this.hash,
//         $target = $(target);
//
//         $('html, body').stop().animate({
//             'scrollTop': $target.offset().top - headerHeight
//         }, 1200, 'swing', function () {
//             window.location.hash = target ;
//         });
//     });
//
// });

// When the user scrolls the page, execute myFunction
window.onscroll = function() {stickyFunction()};

// Get the header
var header = document.getElementById("nav");

// Get the offset position of the navbar
var sticky = 150;

// Add the sticky class to the header when you reach its scroll position. Remove "sticky" when you leave the scroll position
function stickyFunction() {
  if (window.pageYOffset > sticky) {
    header.classList.add("fixed");
  } else {
    header.classList.remove("fixed");
  }
}


$(document).ready(function () {
    $(".dropdown-button").click(function (event) {
        //$('#nav-container').toggleClass('fixed');
        event.preventDefault();
        var isActive = ($(this).hasClass('js-open')) ? true : false; // checks if it is already active

        $('.dropdown-button').removeClass('js-open');
        if (!isActive) $(this).addClass('js-open'); // set active only if it was not active
    });
    $(".dropdown-button + .dropdown-content > li:last-child").focusout(function () {
    //This will check if any main dropdown-content last li loses focus. If it does, the dropdown-content closes when tabbing through the menu items

    $(".dropdown-button").removeClass('js-open');

});
});




// $(document).ready(function() {
//
// //$('.collapsible').collapsible();
//     // Remove no-js class
//     $('html').removeClass('no-js');
//
// 	$('.dropdown-button').on('click', function() {
//
//         if ( $(this).hasClass('js-open') ) {
//
//           $(this).children('ul').removeClass('js-hideElement');
//             $(this).children('ul').addClass('js-showElement');
//
//             //$('#nav > ul > li:not(.dropdownbutton)').removeClass('js-showElement');
//             $(this).removeClass('js-open');
//
//             $(this).attr('aria-expanded', false);
//
//         } else {
//
//             $(this).children('ul').removeClass('js-hideElement');
//             $(this).children('ul').addClass('js-showElement');
//             $(this).addClass('js-open');
//
//             $(this).attr('aria-expanded', true);
//
//         }
//
// 		return false;
// 	})
//
//     // sub menu
// 	// ------------------------
//
//     // When interacting with a li that has a sub menu
//     $('li:has("ul")').on('mouseover keyup click mouseleave', function(e) {
//
//     	// If either -
//     		// tabbing into the li that has a sub menu
//     		// hovering over the li that has a sub menu
//     	if ( e.keyCode === 9 | e.type === 'mouseover' ) {
//
//     		// Show sub menu
//     		$(this).children('ul').removeClass('js-hideElement');
//             $(this).children('ul').addClass('js-showElement');
//     	}
//
// 		// If mouse leaves li that has sub menu
// 		if ( e.type === 'mouseleave' ) {
//
// 			// hide sub menu
// 			$(this).children('ul').removeClass('js-showElement');
//             $(this).children('ul').addClass('js-hideElement');
// 		}
//
//
// 		// If clicking on li that has a sub menu
// 		if ( e.type === 'click' ) {
//
// 			// If sub menu is already open
// 			if ( $(this).children('a').hasClass('js-openSubMenu') ) {
//
//                 // remove Open class
// 				$(this).children('a').removeClass('js-openSubMenu');
//
// 				// Hide sub menu
// 	    		$(this).children('ul').removeClass('js-showElement');
// 	            $(this).children('ul').addClass('js-hideElement');
//
//
// 			// If sub menu is closed
// 			} else {
//
//                 // add Open class
// 				$(this).children('a').addClass('js-openSubMenu');
//
// 				// Show sub menu
// 	    		$(this).children('ul').removeClass('js-hideElement');
// 	            $(this).children('ul').addClass('js-showElement');
//
// 			}
//
// 			return false;
//
// 		} // end click event
//
//     });
//
//
//     // Tabbing through Levels of sub menu
// 	// ------------------------
//
//     // If key is pressed while on the last link in a sub menu
//     $('li > ul > li:last-child > a').on('keydown', function(e) {
//
//
//     	// If tabbing out of the last link in a sub menu AND not tabbing into another sub menu
//     	if ( (e.keyCode == 9) && $(this).parent('li').children('ul').length == 0 ) {
//
// 				// Close this sub menu
//         		$(this).parent('li').parent('ul').removeClass('js-showElement');
//                 $(this).parent('li').parent('ul').addClass('js-hideElement');
//
//
//     		// If tabbing out of a third level sub menu and there are no other links in the parent (level 2) sub menu
//     		if ( $(this).parent('li').parent('ul').parent('li').parent('ul').parent('li').children('ul').length > 0
//     			 && $(this).parent('li').parent('ul').parent('li').is(':last-child') ) {
//
//     				// Close the parent sub menu (level 2) as well
//     				$(this).parent('li').parent('ul').parent('li').parent('ul').removeClass('js-showElement');
//                     $(this).parent('li').parent('ul').parent('li').parent('ul').addClass('js-hideElement');
//     		}
//
//     	}
//
//     })
//
//
//
//
// })


// $('body').on('click','a[href^="#"]',function(event){
//     event.preventDefault();
//     var target_offset = $(this.hash).offset() ? $(this.hash).offset().top : 0;
//     //change this number to create the additional off set
//     var customoffset = $("header").height();
//     $('html, body').animate({scrollTop:target_offset - customoffset}, 900);
// });

var options = [
    {selector: '#more', offset: 50, callback: 'Materialize.fadeInImage("#starting")' }
];
Materialize.scrollFire(options);
$('.materialboxed').materialbox();
$('.modal').modal();
$('.modal-action').click(function(){
  $('#filter').modal('close');
})
  // Initialize collapse button
  $(".button-collapse").sideNav();
  // Initialize collapsible (uncomment the line below if you use the dropdown variation)
  $('.collapsible').collapsible();
  // $('.dropdown-button').dropdown({
  //     inDuration: 300,
  //     outDuration: 225,
  //     constrain_width: true, // Does not change width of dropdown to that of the activator
  //     hover: false, // Activate on hover
  //     stopPropagation: true,
  //     belowOrigin: true, // Displays dropdown below the button
  //     alignment: 'left' // Displays dropdown with edge aligned to the left of button
  // });

// $('.dropdown-button').click(function(event) {
//   if($(this).hasClass('active')) {
//     $(this).removeClass('active');
//   } else {
//     $(this).addClass('active');
//   }
//
// });




//   jQuery('.dropdown').click(function(event){
//          //remove all pre-existing active classes
// $(this).toggleClass('active');
//
//  //
//          $('.material-icons').toggleClass('rotate');
//   //       $("a", this).addClass("active");
//
//
//
//
//
//          // //add the active class to the link we clicked
//          if($("a", this).hasClass("active")) {
//
//            //jQuery('.dropdown-button').removeClass('active');
//            //$("a", this).removeClass('active').children().removeClass('rotate');
//          } else {
//
//            //$("a", this).addClass('active').children().addClass('rotate');
//          }
//
//
//          //Load the content
//          //e.g.
//          //load the page that the link was pointing to
//          //$('#content').load($(this).find(a).attr('href'));
//
//          //event.preventDefault();
//      });



window.cookieconsent_options = {
       learnMore: 'More info',
       theme: 'dark-bottom',
       link: document.location.origin + '/privacy'
   };
