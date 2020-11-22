$(window).load(function () {
$('.humberger').on('click',function () {
    $(this).toggleClass('active');
    $('.menu__content').toggleClass('active');
})
$('.menu__content ul li').on('click',function () {
    $(this).next('ul').toggleClass('active');
})
$('.main-carousel').flickity({
    // options
    cellAlign: 'center',
    prevNextButtons: false,
    pageDots: false,
    // watchCSS: false,
  });
  $('.slide__wrap').each(function (i,container) {
    var $this = $(this);
    var flkty = $(this).data('flickity');
    var selectedIndex = flkty.selectedIndex;
    var slideCount = flkty.slides.length;
    var $dots = $('.dot');
    for (i = 0; i < slideCount; i++) {
      $dots.append('<span></span>');
    }
    var $dots = $dots.find('span');
    $($dots[0]).addClass('active');
  $(this).on('select.flickity', function() {
      $dots.filter('.active').removeClass('active');
      $dots.eq(flkty.selectedIndex).addClass('active');
  })
  $dots.on('click',function() {
      console.log('dang');
      var index = $(this).index();
      console.log(index);
      $this.flickity('select', index);
    });
  });
 $('.loader-wrap').css("display", "none");
 $('.close').on('click',function(e){
   e.preventDefault();
   $('.contact').css("display", "none");
 })
 $('.hotro').click(function(event){
   event.stopPropagation();

   $('.contact').css("display", "flex");
   console.log('hotro');
 })
$('body').click(function(event) {
  console.log(event.target.length);
  if (!$('.contact').is(event.target)) {
  }else{
    $('.contact').css("display", "none");
  }
});
});
