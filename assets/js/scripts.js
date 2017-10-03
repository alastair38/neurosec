
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

$('body').on('click','a[href^="#"]',function(event){
    event.preventDefault();
    var target_offset = $(this.hash).offset() ? $(this.hash).offset().top : 0;
    //change this number to create the additional off set
    var customoffset = $("header").height();
    $('html, body').animate({scrollTop:target_offset - customoffset}, 900);
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
