// $(document).ready(function(){
//   $('.slider').slick({
//             //dots:true,
//             arrows: true,
//             autoplay:true,
//             autoplaySpeed: 5000,
//             infinite: true,
//             //fade: true,
//   });
// });

$(document).ready(function() {
  $('.slider').slick({
    autoplay: true,
    autoplaySpeed: 5000,
    dots: true,
    fade: true,
    arrows: true,
    arrowsPlacement: 'beforeSlides',
    prevArrow: '<button type="button" class="slider-button custom-prev-button">'
               + '<span class="material-icons" aria-hidden="true">chevron_left</span>'
               + '  <span class="screen-reader-text">Previous slide</span>'
               + '</button>',
    nextArrow: '<button type="button" class="slider-button custom-next-button">'
               + '<span class="material-icons" aria-hidden="true">chevron_right</span>'
               + '  <span class="screen-reader-text">Next slide</span>'
               + '</button>',
    pauseIcon: '<span class="material-icons" aria-hidden="true">pause</span>',
    playIcon: '<span class="material-icons" aria-hidden="true">play_arrow</span>'
  });
});
