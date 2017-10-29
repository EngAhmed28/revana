//start on hover open dropdown menu
$('.dropdown').hover(
  function() {
    $(this).find('.dropdown-menu').stop(true, true).delay(200).slideDown();
  }, 
  function() {
    $(this).find('.dropdown-menu').stop(true, true).delay(200).slideUp();
  }
  );

$('.dropdown-menu').hover(
  function() {
    $(this).stop(true, true);
  },
  function() {
    $(this).stop(true, true).delay(200).slideUp();
  }
  );


//start script of go to the div or id
$(function() {
  $('a.page-scroll').bind('click', function(event) {
    var $anchor = $(this);
    $('html, body').stop().animate({
      scrollTop: $($anchor.attr('href')).offset().top
    }, 1500, 'easeInOutExpo');
    event.preventDefault();
  });
});
//End script of go to the div or id


//start script of load gif

document.onreadystatechange = function () {
  var state = document.readyState
  if (state == 'complete') {
    setTimeout(function(){
      document.getElementById('interactive');
      document.getElementById('load').style.visibility="hidden";
    },1000);
  }
}
//End script of load gif


$(document).ready(function() {
  $('#showmenu').click(function() {
    $('.menu').toggle("slide");
   
  });

});
///slider duration

$('#carousel-example-2').carousel({
  interval: 80000
})

///owl carousel



//owl carousel
$(document).ready(function () {

  var owl = $("#owl-demo1");

  owl.owlCarousel({
            items: 8, //10 items above 1000px browser width
            itemsDesktop: [1000, 6], //5 items between 1000px and 901px
            itemsDesktopSmall: [900, 4], // betweem 900px and 601px
            itemsTablet: [600, 4], //2 items between 600 and 0
            itemsMobile: false, // itemsMobile disabled - inherit from itemsTablet option
            autoPlay: true,
            navigation:false
          })

});
//owl carousel
$(document).ready(function () {

  var owl = $("#owl-demo2");

  owl.owlCarousel({
            items: 3, //10 items above 1000px browser width
            itemsDesktop: [1000, 3], //5 items between 1000px and 901px
            itemsDesktopSmall: [900, 2], // betweem 900px and 601px
            itemsTablet: [600, 2], //2 items between 600 and 0
            itemsMobile: false, // itemsMobile disabled - inherit from itemsTablet option
            autoPlay: true,
            navigation:false
          })

});


$(document).ready(function () {

  var owl = $("#owl-demo11");

  owl.owlCarousel({
        items: 4, //10 items above 1000px browser width
        itemsDesktop: [1000, 3], //5 items between 1000px and 901px
        itemsDesktopSmall: [900, 2], // betweem 900px and 601px
        itemsTablet: [600, 1], //2 items between 600 and 0
        itemsMobile: [300, 1], // itemsMobile disabled - inherit from itemsTablet option
        autoPlay: true,
        navigation: false
      })

});
/****************************/
$(document).ready(function () {

  var owl = $("#owl-demo12");

  owl.owlCarousel({
        items: 3, //10 items above 1000px browser width
        itemsDesktop: [1000, 3], //5 items between 1000px and 901px
        itemsDesktopSmall: [900, 2], // betweem 900px and 601px
        itemsTablet: [600, 1], //2 items between 600 and 0
        itemsMobile: [300, 1], // itemsMobile disabled - inherit from itemsTablet option
        autoPlay: true,
        navigation: false
      })

});

$(document).ready(function () {

  var owl = $("#owl-demo13");

  owl.owlCarousel({
        items: 4, //10 items above 1000px browser width
        itemsDesktop: [1000, 4], //5 items between 1000px and 901px
        itemsDesktopSmall: [900, 2], // betweem 900px and 601px
        itemsTablet: [600, 1], //2 items between 600 and 0
        itemsMobile: [300, 1], // itemsMobile disabled - inherit from itemsTablet option
        autoPlay: true,
        navigation: false
      })

});

$(document).ready(function () {

  var owl = $("#owl-demo33");

  owl.owlCarousel({
        items: 3, //10 items above 1000px browser width
        itemsDesktop: [1000, 3], //5 items between 1000px and 901px
        itemsDesktopSmall: [900, 2], // betweem 900px and 601px
        itemsTablet: [600, 1], //2 items between 600 and 0
        itemsMobile: [300, 1], // itemsMobile disabled - inherit from itemsTablet option
        autoPlay: true,
        navigation: false
      })

});


















