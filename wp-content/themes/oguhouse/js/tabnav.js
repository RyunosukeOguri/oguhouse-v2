(function($){
 
  $(document).ready(function() {
        $('.tab_condition:first').show();
        $('.tab_inner li:first').addClass('active');
 
        $('.tab_inner li').click(function() {
            $('.tab_inner li').removeClass('active');
            $(this).addClass('active');
            $('.tab_condition').hide();
 
            $(jQuery(this).find('a').attr('href')).fadeIn();
            return false;
        });
    });

   $(document).ready(function() {
        $('.tab_area:first').show();
        $('.tab li:first').addClass('active');
        repImg($('.tabNav ul .active'),"on");
 
        $('.tab li').click(function() {
            repImg($('.tabNav ul .active'),"off");
            $('.tab li').removeClass('active');
            $(this).addClass('active');
            repImg($('.tabNav ul .active'),"on");
            $('.tab_area').hide();
 
            $(jQuery(this).find('a').attr('href')).fadeIn();
            return false;
        });
 
        var unactive;
        $('.tabNav ul li').hover(function(){
            unactive = $(this).hasClass("active");
            if(!unactive){
                repImg($(this),"on");
            }
        },function(){
            unactive = $(this).hasClass("active");
            if(!unactive){
                repImg($(this),"off");
            }
        });
    });

   
    // サイドメニュー用
    $('.side_content ul li').click(function() {
      $('.side_menu01 li').removeClass('active');
        $(this).addClass('active');
    });

 
    function repImg(el,change){
        var src = el.find("img").attr("src"),
                rep;
        if(change == "on"){
            rep = src.replace("_off.png","_on.png");
        }else{
            rep = src.replace("_on.png","_off.png");
        }
        el.find("img").attr("src",rep);
    }
 
    // hoverで透明から半透明
    // $(".trans_obj ul li, .wp_rp_content ul li, .child_content ul li").hover(function(){
    //     $(this).animate({
    //         "opacity": "0.6",
    //     },{
    //         "duration": 500,
    //         "easing": "linear"
    //     });
    // },function(){
    //     $(this).animate({
    //         "opacity": "1"
    //     },{
    //         "duration": 500,
    //         "easing": "linear"
    //     });
    // });



 
 
 
})(jQuery);