<style type="text/css">
	
	#header-form{
		width: auto;
		height: 20%;
	}

	#footer-form{
		width: auto;
		height: 50px;
	}
	
	#inputform{
		width: 80%;
		margin: 0 auto;
	}
	
	#input-div{
		text-align: center;
		width: 100%;
		margin: 0 auto;
		white-space:nowrap;
	}
	
	#search-div{
		margin: 0px;
		width: 100%;
		height: 500px;
	}
	
	#map-div{
		border: 1px solid #000000;
		height: 100%;
		float: left;
		width: 74%;
	}
	
	#map-canvas {
    	width: 100%;
    	height: 100%;
    	float:left;
	}
	
	#parking-div{
		border: 1px solid #000000;
		width: 25%;
		height: 100%;
		float:left;
	}
	
	#details-div{
		margin: 10;
		width: 90%;
		border: 1px solid #000000;
	}
	
	#window-div{
		margin: 0;
		width: 200px;
		height: 200px;
		border: 1px solid #000000;
	}
	
	#details-img-div{
		margin: 5;
		text-align: center;
		width: 90%;
	}
	#details-comment-div{
	    width: 100%;
	}
</style>

<html>
	<head>
		<meta charset="UTF-8" />
		<title>検索画面</title>
		<!-- googleMAP API -->
		<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true"></script>
		<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?libraries=geometry&sensor=true_or_false"></script>
		<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?libraries=places&sensor=true_or_false"></script>
		<!-- jQuery UI + datepicker UI -->
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1/jquery-ui.min.js"></script>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1/i18n/jquery.ui.datepicker-ja.min.js"></script>
		<!-- jQuery UIのCSS -->
		<link type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/ui-lightness/jquery-ui.css" rel="stylesheet" />
		<!-- 共通処理 -->
		<script type="text/javascript" src="../test_js/common_getdata.js" charset="UTF-8"></script>
		<!-- カレンダーボックスの作成 -->
		<script type="text/javascript">
			$(function(){
 				$("#datepicker").datepicker({
					showOtherMonths: true,
					selectOtherMonths: true,
					dateFormat: 'yy年mm月dd日'
				});
			});
		</script>
	</head>
	<body onload="initialize()">
			<form id="header-form">
				<?php include('../resources/views/common/test_header.blade.php'); ?>
			</form>
			<form id="inputform">
				<div id="input-div">
					<font>キーワード：</font><input type="text" id="address" size="20" value="" onkeydown="if(event.keyCode == 13){moveAddress()}">
					&emsp;
					<font>利用日：</font><input type="text" id="datepicker" size="10" value="">
					&emsp;
					<font>検索範囲(km)：</font><input type="text" id="selectScope" size="10" value="1" onkeydown="if(event.keyCode == 13){moveAddress()}">
					&emsp;
					<div id="input_sub_div"></div>
					<input type="checkbox" name="riyu" value="2">空室のみ</br>
					<input type="checkbox" name="riyu" value="7">時間貸し駐車場を表示する
					&emsp;
					<input type="button" id="addressbtn" value="検索" onclick="moveAddress()">
				</div>
				</br>
				<div id="search-div">
					<div id="map-div">
						<div id="map-canvas"></div>
					</div>
					<div id="parking-div">
						<div id="parking-canvas" style="height:500px; overflow-y:auto;"></div>
					</div>
					<div style="clear:both;"></div>
				</div>
			</form>
			</br>
			<form id="footer-form">
				<?php include('../resources/views/common/test_footer.blade.php'); ?>
			</form>
	</body>
</html>

<script type="text/javascript">

	var map;
	var geocoder;
	var marker_now;
	var marker_data = new Array();
	var currentInfoWindow;
	var distance;

	//**************************************************************
	//画面表示時の初期表示
	//**************************************************************
	function initialize() {

        console.log("初期表示");
        alert("初期表示");

		geocoder = new google.maps.Geocoder();
		
		// 最初の1文字 (?記号) を除いた文字列を取得する
        var query = window.location.search.substring( 1 );

        // クエリの区切り記号 (&) で文字列を配列に分割する
        var parameters = query.split( '&' );
        
        var result = new Array()
		
		for( var i = 0; i < parameters.length; i++ )
		{
            // パラメータ名とパラメータ値に分割する
			var element = parameters[ i ].split( '=' );

			var paramName = decodeURIComponent( element[ 0 ] );
			var paramValue = decodeURIComponent( element[ 1 ] );

			// パラメータ名をキーとして連想配列に追加する
			result[ paramName ] = paramValue;
        }
		
		//検索入力欄作成
		var vehicleType = new Array();
		vehicleType = getVehicleType();
		var len = vehicleType.length;

		//検索入力欄作成(車両タイプ)
		var htmlData = '<font>車両の種類\：</font><select name="vehicle_type">';
		
		for(var i=0; i < len; i++){
			htmlData += '<option value="' + vehicleType[i].vehicle_type + '">' + vehicleType[i].name + '</option>';
		}
		htmlData += '</select>';
		htmlData += '&emsp;';
		
		$('#input_sub_div').html("");
		$(htmlData).appendTo('#input_sub_div').trigger( "create" );
		
		//キーワードに代入
		document.getElementById('address').value = result['strAddress'];
		
		//マップ初期設定

        alert("viewmap");

		viewMap();
	}
	
	//**************************************************************
	//map作成
	//**************************************************************
	function viewMap(){
		var address = document.getElementById('address').value;

        console.log(address);

  		geocoder.geocode(
  			{'address': address},
  			function( selectRequest,selectStatus )
      		{
      			var latlng;
      			if (selectStatus == google.maps.GeocoderStatus.OK){
	      			latlng = selectRequest[0].geometry.location;
				}else{
					latlng = new google.maps.LatLng(35.677036, 139.735550);
				}
				
				//初期位置設定
				var latlng = selectRequest[0].geometry.location;
				var mapOptions = {
					zoom: 15,
					center: latlng,
					mapTypeId: google.maps.MapTypeId.ROADMAP,
					navigationControl: true,
					navigationControlOptions: {
		    			style: google.maps.NavigationControlStyle.ZOOM_PAN
		    		},
					disableDefaultUI: false
				}
				
				map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
				
				//初期位置にマーカーを設定
				marker_now = new google.maps.Marker({
					position: latlng,
					map: map, 
					title: '現在地',
				});
				
				//周辺の駐車場をマップに反映
				selectParking(selectRequest[0]);
			}
		);
	}
	
	//**************************************************************
	//住所検索(検索押下時)
	//**************************************************************
	function moveAddress() {
		var address = document.getElementById('address').value;
		geocoder.geocode({'address': address}, moveTo);
	}
	
	//**************************************************************
	//検索結果の住所へ移動
	//**************************************************************
	function moveTo(selectRequest,selectStatus) {
		if (selectStatus == google.maps.GeocoderStatus.OK){
			//検索前の現在地マーカーを削除
			if(marker_now){
				marker_now.setMap(null);
			}
			
			//検索前の周辺駐車場マーカーを削除
			var len = marker_data.length;
			alert(len);
			for(var i = 0;i < len; i++){
				$('#parking-canvas').html("");
				marker_data[i].setMap(null);
			}
			//マーカー位置を検索後の住所に設定
			marker_now = new google.maps.Marker({
				position: selectRequest[0].geometry.location,
				map: map, 
				title: '現在地'
			});
			
			//地図の表示位置を検索後の住所に設定
			map.setCenter(selectRequest[0].geometry.location);
			map.setZoom(15);
			
			//周辺の駐車場をマップに反映
			selectParking(selectRequest[0]);
		}else{
    		alert("該当する住所はありません。");
  		}
	}
	
	//**************************************************************
	//周辺の駐車場をマップに反映
	//@param:selectRequest 住所
	//**************************************************************
	function selectParking(selectRequest) {
		//**********************************************************
		//取得データ保持用
		//座標:lat・lng
		//駐車場名:name
		//住所：add
		//営業開始時間：start_time
		//営業終了時間：end_time
		//**********************************************************
		var parkingId = new Array();
		var lat = new Array();
		var lng = new Array();
		var name = new Array();
		var add = new Array();
		var start_time = new Array();
		var end_time = new Array();
		var appeal = new Array();
		
		//周辺の駐車場情報を取得
		var getJsonData = new Array();
		getJsonData = getParkingData(selectRequest.geometry.location.lng(),selectRequest.geometry.location.lat(),document.getElementById('selectScope').value);
		
		var len = getJsonData.length;
		
		for(var i=0; i < len; i++){
			parkingId[i] = getJsonData[i].parking_space_id;
			lat[i] = getJsonData[i].lat;
			lng[i] = getJsonData[i].lng;
			name[i] = getJsonData[i].name;
			add[i] = getJsonData[i].prefecture + getJsonData[i].city + getJsonData[i].address;
			start_time[i] = getJsonData[i].utilization_start_time;
			end_time[i] = getJsonData[i].utilization_end_time;
			
			//コメント情報を一時変数に格納
			var moment = new Array();
			moment = getAppealData(parkingId[i]);
			var mlen = moment.length;

			for(var j=0; j < mlen; j++){
				if(j == 0){
					if(typeof moment[j] === "undefined"){
						appeal[i] = "なし";
					}else{
						appeal[i] = moment[j].title_text;
					}
				}else{
					if(typeof moment[j] === "undefined"){
						appeal[i] = appeal[i] + "、" + "なし";
					}else{
						appeal[i] = appeal[i] + "、" + moment[j].title_text;
					}
				}
			}

		}
		
		//周辺にピンを立てる
		parkingPin(lat,lng,name,add,parkingId,start_time,end_time,appeal);
				
		//検索された駐車場情報を表示
		parkingView(name,add,parkingId,start_time,end_time,appeal);
		
//		$.ajax({
//			type: "GET",
//			scriptCharset: 'utf-8',
//			dataType: 'json',
//			url: "http://133.242.232.21/index.php/getParkingData",
//			cache:false,
//			data: "lat=" + selectRequest.geometry.location.lng() + "&lng=" + selectRequest.geometry.location.lat() + "&radius=" + document.getElementById('selectScope').value,
//			success: function(getData){
//				var getJsonData = new Array();
//				getJsonData = getData.results;
//				var len = getJsonData.length;
//				for(var i=0; i < len; i++){
//					
//					parkingId[i] = getJsonData[i].parking_space_id;
//					lat[i] = getJsonData[i].lat;
//					lng[i] = getJsonData[i].lng;
//					name[i] = getJsonData[i].name;
//					add[i] = getJsonData[i].prefecture + getJsonData[i].city + getJsonData[i].address;
//					start_time[i] = getJsonData[i].utilization_start_time;
//					end_time[i] = getJsonData[i].utilization_end_time;
//				}
//				
//				//周辺にピンを立てる
//				parkingPin(lat,lng,name,add,parkingId,start_time,end_time);
//				
//				//検索された駐車場情報を表示
//				parkingView(name,add,parkingId,start_time,end_time);
//			}
//		});
	}
	
	//**************************************************************
	//周辺にピンを立てる
	//@param:lat,lng 座標データ
	//@param:name 駐車場名
	//@param:address 住所
	//**************************************************************
	function parkingPin(lat,lng,name,add,parkingId,start_time,end_time,appeal) {
		var len = lat.length;
		distance = new Array();
		
		var icon = new google.maps.MarkerImage(
        	'../icon/index.png',
        	new google.maps.Size(80,80),
        	new google.maps.Point(0,0),
        	new google.maps.Point(0,80)
    	);
		
		for(var i=0;i < len; i++){
			var m_latlng = new google.maps.LatLng(lng[i],lat[i]);
			marker = new google.maps.Marker({
				position: m_latlng,
				map: map,
				icon: icon
			});
			
			marker_data[i] = marker;
			
			distance[i] = google.maps.geometry.spherical.computeDistanceBetween(marker_now.getPosition(), marker.getPosition()) / 1000;
			
			//駐車場情報を地図上に配置
			
			viewWindow(marker_data[i],m_latlng,name[i],add[i],parkingId[i],distance[i],start_time[i],end_time[i],appeal[i]);
			
			//alert(distance[i]);
		}
	}
	
	//**************************************************************
	//ピンクリック時に情報ウィンドウを表示
	//@param:marker ピンオブジェクト	
	//@param:latlng 座標データ
	//@param:name 駐車場名
	//@param:address 住所
	//**************************************************************
	function viewWindow(marker,latlng,name,add,parkingId,distance,start_time,end_time,appeal){
	
		//コンテンツ内のhtml
		var htmlData = '<div onClick="moveDetails(' + parkingId + ')" id="window-div">'
					 +  '<div id="details-img-div">'
					 +  '<img src="aaa" border="1" width="100" height="100" alt="No Image" />'
					 +  '</div>'
					 +  '<div id="details-comment-div">'
					 +  '<font size="1">駐車場名\：' + name + '</font>'
					 +  '</br>'
					 +  '<font size="1">住所\：' + add + '</font>'
					 +  '</br>'
					 +  '<font size="1">距離\：' + distance.toFixed(2) + 'Km</font>'
					 +  '</br>'
//					 +  '<font size="1">価格\：' +  + '円/日</font>'
//					 +  '</br>'
					 +  '<font size="1">時間\：' + start_time + '～' + end_time
					 +  '</br>'
					 +  '<font size="1">コメント\：' + appeal
					 +  '</br>'
					 +  '</div>'
					 +  '<div style="clear:both;"></div>'
					 +  '</div>'
					 
		var infoWindow = new google.maps.InfoWindow({
			content: htmlData,
			size: new google.maps.Size(350, 300)
		});
		
		//ピンクリック時
		google.maps.event.addListener(marker,'click',function(){
		
			//あらかじめウィンドウが表示されていたら閉じる
			if(currentInfoWindow){
				currentInfoWindow.close();
			}
		
			infoWindow.open(map,marker);
			
			currentInfoWindow = infoWindow;
		});
	}
	
	//**************************************************************
	//検索された駐車場情報を表示
	//@param:name 駐車場名
	//@param:address 住所
	//@param:parkingId 駐車場ID
	//**************************************************************
	function parkingView(name,add,parkingId,start_time,end_time,appeal){
		var len = name.length;
		
		var htmlData = '<div>';
		
		for(var i=0;i < len; i++){
			htmlData += '<div onClick="moveDetails(' + parkingId[i] + ')" id="details-div">'
					 +  '<div id="details-img-div">'
					 +  '<img src="aaa" border="1" width="100" height="100" alt="No Image" />'
					 +  '</div>'
					 +  '<div id="details-comment-div">'
					 +  '<font size="1">駐車場名\：' + name[i] + '</font>'
					 +  '</br>'
					 +  '<font size="1">住所\：' + add[i] + '</font>'
					 +  '</br>'
					 +  '<font size="1">距離\：' + distance[i].toFixed(2) + 'Km</font>'
					 +  '</br>'
//					 +  '<font size="1">価格\：' +  + '円/日</font>'
//					 +  '</br>'
					 +  '<font size="1">時間\：' + start_time[i] + '～' + end_time[i]
					 +  '</br>'
					 +  '<font size="1">コメント\：' + appeal[i]
					 +  '</br>'
					 +  '</div>'
					 +  '<div style="clear:both;"></div>'
					 +  '</div>'
		}
		htmlData += '</div>';
		$('#parking-canvas').html("");
		$(htmlData).appendTo('#parking-canvas').trigger( "create" );
	}
	
	//**************************************************************
	//駐車場詳細画面へ遷移
	//@param:parkingId 駐車場ID
	//**************************************************************
	function moveDetails(parkingId){
	
		var pram="parkingId=" + parkingId;

		window.open("http://133.242.232.21/index.php/details?"+pram);
	}

</script>