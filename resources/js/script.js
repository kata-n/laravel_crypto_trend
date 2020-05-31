$(function() {
  //フッターを最下部に固定
  var mainContents = $('.l-mainwrapper');
  console.log(mainContents);
  $(".l-footer").css("padding-bottom", mainContents + "px");
});