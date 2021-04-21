
/*
These functions make sure WordPress
and Materialize play nice together.
*/


// When the user scrolls the page, execute stickyFunction
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

    function dropdownReset() {
      $('.dropdown-button').removeClass('js-open');
      $('.dropdown-button').removeClass('active');
      $('.dropdown-button').attr("aria-expanded", "false");
    }

    document.onkeydown=function(e) {
      if(e.which == 27) {

      var setFocus = $('a.js-open');
      // on escape press get currently open dropdown-button then close this and set focus to this dropdown-button
      dropdownReset();
      setFocus.focus();
      return false;
      }
    }

    $(".dropdown-button").click(function (event) {
        //$('#nav-container').toggleClass('fixed');
        event.preventDefault();
        var isActive = ($(this).hasClass('js-open')) ? true : false; // checks if it is already active

        dropdownReset();
        if (!isActive) $(this).addClass('js-open');
        if (!isActive) $(this).addClass('active');
        if (!isActive) $(this).attr("aria-expanded", "true"); // set active only if it was not active
    });

    $(".dropdown-button + .dropdown-content > li:last-child").focusout(function () {
    //This will check if any main dropdown-content last li loses focus. If it does, the dropdown-content closes when tabbing through the menu items
    dropdownReset();

});
});


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

window.cookieconsent_options = {
       learnMore: 'More info',
       theme: 'dark-bottom',
       link: document.location.origin + '/privacy'
   };
