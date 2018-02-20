
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




  jQuery('.dropdown').click(function(event){
         //remove all pre-existing active classes
$('.dropdown-button').removeClass('active');

 //
         $('.material-icons').removeClass('rotate');
  //       $("a", this).addClass("active");





         // //add the active class to the link we clicked
         if($("a", this).hasClass("active")) {

           //jQuery('.dropdown-button').removeClass('active');
           $("a", this).removeClass('active').children().removeClass('rotate');
         } else {

           $("a", this).addClass('active').children().addClass('rotate');
         }


         //Load the content
         //e.g.
         //load the page that the link was pointing to
         //$('#content').load($(this).find(a).attr('href'));

         //event.preventDefault();
     });



window.cookieconsent_options = {
       learnMore: 'More info',
       theme: 'dark-bottom',
       link: document.location.origin + '/privacy'
   };
