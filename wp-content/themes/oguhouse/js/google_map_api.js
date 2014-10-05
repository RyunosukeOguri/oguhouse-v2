//  Google Map API
(function($) {

google.load("maps", "3.x", {"other_params":"sensor=false"});

//マップの初期設定
function initialize() {

//マップの中心座標
  var myLatLng = new google.maps.LatLng(35.671779, 139.757718);
	
//マップの設定オプション
  var myOptions = {
    zoom: 17,                                 //ズームレベル
    center: myLatLng,                         //中心座標
    // mapTypeId: google.maps.MapTypeId.ROADMAP,  //マップタイプ
    // mapTypeControlOptions:{
    // mapTypeIds: [google.maps.MapTypeId.ROADMAP, 'ICMG']
    // }
  };
	
  var map = new google.maps.Map(document.getElementById("map"), myOptions);

  /* アイコン画像パス取得*/
  var root_path = $('#root_path').text();
  var iconImg = root_path + "/wp-content/themes/ICMG/images/icons/pin.png";

  /* アイコン設定 */
  var icon = new google.maps.MarkerImage(iconImg,
    new google.maps.Size(82,42),
    new google.maps.Point(0,0),
    new google.maps.Point(31,42)
  );
  var shadow = new google.maps.MarkerImage(iconImg,
    new google.maps.Size(82,42),
    new google.maps.Point(0,42),
    new google.maps.Point(31,42)
  );
  var markerOptions = {
    position: myLatLng,
    map: map,
    icon: icon,
    shadow: shadow,
    title: 'NBF日比谷ビル'
  };

  var marker = new google.maps.Marker(markerOptions);


  var samplestyle = [
    {
      featureType: "all",
      elementType: "all",
      stylers: [
        { hue: "#ff0022" },
        { visibility: "on" }
      ]
    },{
      featureType: "transit.station",
      elementType: "all",
      stylers: [
        { hue: "#ff0000" },
        { visibility: "on" },
        { saturation: 99 },
        { lightness: 8 }
      ]
    },{
      featureType: "poi",
      elementType: "geometry",
      stylers: [
        { visibility: "on" },
        { saturation: -100 },
        { gamma: 2.39 }
      ]
    },{
      featureType: "road",
      elementType: "all",
      stylers: [
        { saturation: 16 },
        { visibility: "on" }
      ]
    },{
      featureType: "landscape",
      elementType: "all",
      stylers: [
        { saturation: -100 },
        { visibility: "on" }
      ]
    },{
      featureType: "administrative",
      elementType: "all",
      stylers: [
        { saturation: 99 },
        { gamma: 0.73 }
      ]
    },{
      featureType: "road.local",
      elementType: "labels",
      stylers: [
        { visibility: "off" }
      ]
    },{
      featureType: "water",
      elementType: "all",
      stylers: [
        { visibility: "simplified" },
        { saturation: -98 }
      ]
    },{
      featureType: "road",
      elementType: "all",
      stylers: [
        { saturation: -6 },
        { visibility: "simplified" }
      ]
    },{
      featureType: "road.highway",
      elementType: "labels",
      stylers: [
        { visibility: "on" }
      ]
    },{
      featureType: "transit.line",
      elementType: "geometry",
      stylers: [
        { lightness: 16 },
        { gamma: 0.97 },
        { saturation: 48 }
      ]
    },{
      featureType: "road.highway",
      elementType: "geometry",
      stylers: [
        { gamma: 0.97 },
        { saturation: -100 },
        { lightness: 10 }
      ]
    }
  ];

// var samplestyle = [
//     {
//       featureType: "poi.park",
//       elementType: "all",
//       stylers: [
//         { gamma: 0.4 }
//       ]
//     },{
//       featureType: "water",
//       elementType: "all",
//       stylers: [
//         { hue: "#00ffff" },
//         { lightness: 50 }
//       ]
//     },{
//       featureType: "road",
//       elementType: "all",
//       stylers: [
//         { visibility: "off" }
//       ]
//     },{
//       featureType: "transit",
//       elementType: "all",
//       stylers: [
//         { visibility: "off" }
//       ]
//     },{
//       featureType: "transit",
//       elementType: "all",
//       stylers: [
//         { gamma: 0 },
//         { visibility: "off" }
//       ]
//     }
//   ];
  
  var samplestyleOptions = {
    name: "ICMG_color"
  };
  
  var sampleMapType = new google.maps.StyledMapType(samplestyle, samplestyleOptions);
  map.mapTypes.set('ICMG', sampleMapType);
  map.setMapTypeId('ICMG');
}


//作成したマップの呼び出し
google.setOnLoadCallback(initialize);

})(jQuery);