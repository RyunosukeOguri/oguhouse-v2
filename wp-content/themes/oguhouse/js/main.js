(function($) {

  //スクロールトップ
  jQuery.easing.quart = function (x, t, b, c, d) {
    return -c * ((t=t/d-1)*t*t*t - 1) + b;
  };

  var toTopElm = $(".to_top a");

  toTopElm.bind("click", function(){
    $("html, body").animate({
      scrollTop: 0
    }, 500, 'quart');
    return false;
  });

  //$('#myTab').tab('show');

  $('#myModal').modal('hide');


    $('#myTab a').click(function (e) {
    e.preventDefault();
    $(this).tab('show');
  });

  //スライダー用
  $(window).load(function() {
    $('.flexslider').flexslider({
      animation: "slide"
    });
  });

})(jQuery);