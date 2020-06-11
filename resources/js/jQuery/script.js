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
          $('#js-classtaget').addClass('js-toggle-sp-menu-target');
      }else{
          $('#js-classtaget').removeClass('js-toggle-sp-menu-target');
      }
  });

  //フッターを最下部に固定
      var $footer = $('.l-footer');
      if(window.innerHeight > $footer.offset().top + $footer.outerHeight() ) {
          $footer.attr({'style': 'position:fixed; top:' + (window.innerHeight - $footer.outerHeight()) + 'px;' });
      }

});