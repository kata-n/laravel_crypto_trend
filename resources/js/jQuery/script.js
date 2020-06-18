$(function() {
  //spメニュー
  $('.js-toggle-sp-menu').click(function(){
    $(this).toggleClass('active');
    $('.js-toggle-sp-menu-target').toggleClass('active');
  });

  $(window).outerWidth(function(){
      var x = $(window).outerWidth();
      var y = 767;
      if (x <= y) {
          $('.js-navtarget').addClass('js-toggle-sp-menu-target');
      }else{
          $('.js-navtarget').removeClass('js-toggle-sp-menu-target');
      }
  });
});