
/*
These functions make sure WordPress
and Materialize play nice together.
*/

// $(document).ready(function(){
//
//   $('a[href*="#"]:not([href="#"])').click(function() {
//   if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
//     var target = $(this.hash);
//     target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
//     if (target.length) {
//       $('html, body').animate({
//         scrollTop: target.offset().top - 400
//       }, 1000);
//       return false;
//     }
//   }
// });
//
// });



var headerHeight = $("header").height();


        $(document).ready(function(){
    $('a[href^="#"]').on('click',function (e) {
        e.preventDefault();

        var target = this.hash,
        $target = $(target);

        $('html, body').stop().animate({
            'scrollTop': $target.offset().top - headerHeight
        }, 1200, 'swing', function () {
            window.location.hash = target ;
        });
    });
});

var options = [
    {selector: '#about-pathways', offset: 50, callback: 'Materialize.fadeInImage("#about-pathways")' },
    {selector: '#more', offset: 50, callback: 'Materialize.fadeInImage("#starting")' }
];
Materialize.scrollFire(options);
$('.modal').modal();
$('.modal-action').click(function(){
  $('#filter').modal('close');
})
  // Initialize collapse button
  $(".button-collapse").sideNav();
  // Initialize collapsible (uncomment the line below if you use the dropdown variation)
  //$('.collapsible').collapsible();
$(".dropdown-button").dropdown();
  $(".dropdown-button").click(function(){


  // //   $width = $("li.dropdown").width();
  $id = $(this).parent().attr("id");
  // //
  //$( "li" ).not(document.getElementById("#"+$id+"")).children( "a" ).removeClass("active");
  // $( "li" ).not(document.getElementById("#"+$id+"")).children( "ul" ).toggleClass("block");
  // // $("#"+$id+"").children("ul").toggleClass("block").css("min-width", $("li.dropdown").width());
  $("#"+$id+" a i").toggleClass("rotate");
  // //   $("#"+$id+" a").toggleClass("activate");
  // //
  });
  // //

window.cookieconsent_options = {
       learnMore: 'More info',
       theme: 'dark-bottom',
       link: document.location.origin + '/privacy'
   };
