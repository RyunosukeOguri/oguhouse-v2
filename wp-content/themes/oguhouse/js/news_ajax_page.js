// ニュース-扉ページ Ajax
(function($) {

  var targe_ajax_list = $('.infomation-archive'); //ターゲット
  var more_btn = $("#news_page_more"); //もっと見るボタンを表示する場所
  var all_num = $(".all_count").text();
  var now_post_num = targe_ajax_list.find("li").length; // 現在表示されている数
  var get_post_num = 40; // もっと読むボタンを押した時に取得する数
  
  $('.tab_condition').append('<div class="news-count text-right"><span>現在のニュース表示件数:' + now_post_num + '</span><span> / ' + all_num + '</span></div>');
  
  if ( now_post_num < all_num ) { // ニュース件数が４０件以上ならもっと見るボタンを表示
    more_btn.append('<a class="more-btn" href="">もっと見る</a>');
  }
    
  $('#news_page_more a').live("click", function(){
    var root_path = $('#root_path').text();
    page = getUrlVars();
    console.log(root_path);
    var loading_img = '<img class="ajax_loading" src="' + root_path + '/wp-content/themes/ICMG/images/icons/gif-load.gif" />';
    $("#ajax-loader").html(loading_img);
    //Ajax
    $.ajax({
      type : "POST",
      url : root_path + "/wp-content/themes/ICMG/ajax_loading/news_page_more.php",
      data : {
          'now_post_num': now_post_num,
          'get_post_num': get_post_num,
          'page'        : page['page'],
          'is_more'     : true,

      },

      complete: function(data){
      },
      success: function(data){
        // now_post_num = now_post_num + get_post_num;
        // console.log(data);
        console.log(data);

          $(".tab_condition").find("ul").each(function(){
              $(this).append(data);
          });
          more_btn.find("a").remove(); //もっと見るボタン削除
          $(".news-count").find("span").remove(); //現在のページ表示件数削除
          now_post_num = targe_ajax_list.find("li").length; //現在の表示しているニュースの件数を取得
          //表示しているニュースの件数を挿入
          $('.tab_condition').append('<div class="news-count text-right"><span>現在のニュース表示件数:' + now_post_num + '</span><span> / ' + all_num + '</span></div>');
 
          if (now_post_num != all_num) { 
            // もっと見るボタン挿入
            more_btn.append('<a class="more-btn" href="#">もっと見る</a>');
          }else{
            more_btn.append('これ以上記事はありません。');
          }
  
          $("#ajax-loader").find('img').remove(); //ローダー画像削除

      },
      error: function(){
        alert("sorry It failed in deletion");
      }
    });
    return false;
  });

})(jQuery);


var getUrlVars = function(){
      var vars = {}; 
      var param = location.search.substring(1).split('&');

      for(var i = 0; i < param.length; i++) {
          var keySearch = param[i].search(/=/);
          var key = '';
          if(keySearch != -1) key = param[i].slice(0, keySearch);
          var val = param[i].slice(param[i].indexOf('=', 0) + 1);
          if(key != '') vars[key] = decodeURI(val);
      }
      // vars.t = type == null ? "" : type;
      return vars; 
  }




    