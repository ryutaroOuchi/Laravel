<style type="text/css">
	
	#header_form{
		width: auto;
		height: 170px;
	}
	
	#footer_div{  
    	border: 1px solid #000000;
    	height: 100%;
    	width: 100%;
	} 
	
	#footer_form{
		width: 100%;
		height: 50px;
	}
	
	#footer_div font{  
    	position: relative;
    	top: 40%;
    	margin-top: -0.5em;
	} 
	
	#details_form{
		width: 970px;
		margin: 0 auto;
	}
	
	#title_div font{
		text-align: left;
	}
	
	#title_div{
		text-align: center;
		border: 1px solid #000000;
		width: 100%;
		height: 8%;
		background-color: #DCDCDC;
	}
	
	#parking_detail_div{
		margin: 0;
		width: 100%;
	}
	
	#parking_img_div{
		float:left;
		width: 45%;
		margin-right: 10px;
	}
	
	#parking_detail_table{
		width: 54%;
	}
	
	#parking_detail_table th{
		width: 30%;
	}
	
	#vihicle_img_div{
		float:left;
		width: 45%;
		margin-right: 10px;
	}
	
	#reserved_div{
		text-align: center;
		margin: 0;
		width: 100%;
	}
	
	#reserved_table_div{
		width: 100%;
		margin-right: 10px;
	}
	
	#reserved_table{
		margin-left: auto;
		margin-right: auto;
	}
	
	#details_title_div{
		text-align: center;
		border: 1px solid #000000;
		width: 100%;
		height: 50px;
		background-color: #DCDCDC;
	}
	
	#vehicle_space_table{
		margin-left: auto;
		margin-right: auto;
	}
	
	#reservation_div{
		text-align: center;
	}
	
	#vehicle_space_details_table{
		margin-left: auto;
		margin-right: auto;
	}
	
	#spc_table{
		margin-left: auto;
		margin-right: auto;
		text-align: center;
    	width: 60%;
	}
	
	#day_font{
		margin-top: -0.5em;
	}
</style>

<html>
	<head>
		<meta charset="UTF-8" />
		<title>駐車場詳細画面</title>
		<!-- googleMAP API -->
		<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true"></script>
		<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?libraries=places&sensor=true_or_false"></script>
		<!-- jQuery UI + datepicker UI -->
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1/jquery-ui.min.js"></script>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1/i18n/jquery.ui.datepicker-ja.min.js"></script>
		<!-- jQuery UIのCSS -->
		<link type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/ui-lightness/jquery-ui.css" rel="stylesheet" />
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
		<form id="header_form">
			<?php include('../resources/views/common/common_header.blade.php'); ?>
		</form>
		</br>
		<form id="details_form">
			<div id="title_div">
				<font size="5">駐車場名</font>
			</div>
			</br>
			<div id="parking_detail_div">
				<!-- 駐車場画像 -->
				<div id="parking_img_div">
					<img src="aaa" border="1" width="100%" height="300px" alt="駐車場画像"/>
				</div>
				<!-- 駐車場情報 -->
				<table id="parking_detail_table" border="1">
					<tr>
						<th colspan="2"><font>駐車場基本情報</font></th>
					</tr>
					<tr>
						<th><font>駐車場タイプ</font></th>
						<td><div id="parking_type"></div></td>
					</tr>
					<tr>
						<th><font>最大台数</font></th>
						<td><div id="parking_max"></div></td>
					</tr>
					<tr>
						<th><font>駐車可能タイプ</font></th>
						<td><div id="car_type"></div><div style="clear:both;"></td>
					</tr>
					<tr>
						<th><font>コメント</font></th>
						<td><div id="parking_appeal"></div><div style="clear:both;"></td>
					</tr>
				</table>
				<div style="clear:both;"></div>
			</div>
			</br>
			<div id="vehicle_space_div">
				<!-- 車室イメージ -->
			 	<div id="vihicle_img_div">
					<img src="aaa" border="1" width="100%" height="300px" alt="車室画像"/>
			 	</div>
				<input type="button" id="recommend" value="お気に入り" onclick=""></br>
				<div style="clear:both;"></div>
			</div>
			</br>
			<div id="reserved_div">
				<div id="reserved_table_div">
					<table id="reserved_table" border="1">
						<tr>
							<td colspan="5"><font>車室タイプ</font></td>
						</tr>
						<tr>
							<th><font></font></th>
							<th><font>タイプ</font></th>
							<th><font>サイズ・特徴</font></th>
							<th><font>数</font></th>
							<th><font>空き</font></th>
						</tr>
						<tr>
							<td><div id="check_1"><input type="checkbox" name="reserved_check_1" value=""></div></td>
							<td><div id="type_1"></div></td>
							<td><div id="details_1"></div></td>
							<td><div id="vehicle_space_1"></div></td>
							<td><div id="free_vehicle_space_1"></div></td>
						</tr>
					</table>
				</div>
			</div>
			</br>
			<div id="details_title_div">
				<font size="5">選択車室詳細</font>
			</div>
			</br>
			<div id="vehicle_space_details_div">
				<table id="vehicle_space_table" border="1">
					<tr>
						<th><font>No</font></th>
						<th><font>タイプ</font></th>
						<th><font>サイズ・特徴</font></th>
						<th><font></font></th>
						<th><font>番号</font></th>
					</tr>
					<tr>
						<td><div id="no_1"></div></td>
						<td><div id="type_1"></div></td>
						<td><div id="details_1"></div></td>
						<td><div id="vehicle_space_1"></div></td>
						<td><div id="free_vehicle_space_1"></div></td>
					</tr>
				</table>
				</br>
				<table border="0" frame="box" id="vehicle_space_details_table">
					<tr>
						<td><div><font>最大予約期間：</font></div></td>
						<td><div id="accept_period"></div></td>
					</tr>
					<tr>
						<td><div><font>貸出時間：</font></div></td>
						<td><div id="utilization_time"></div></td>
					</tr>
				</table>
			</div>
			</br>
			<div id="reservation_div">
				
			</div>
			</br>
			<input type="button" id="recommend" value="予約する" onclick="moveReservation()"></br>
		</form>
		</br>
		<form id="footer_form">
			<div id="footer_div">
				<font>フッター </font>
			</div> 
		</form>
	</body>
</html>

<script type="text/javascript">

	var nowDay;
	var loopEnd;
	var parkingId;
	
	//**************************************************************
	//画面表示時の初期表示
	//**************************************************************
	function initialize() {
		
		// 最初の1文字 (?記号) を除いた文字列を取得する
		var query = window.location.search.substring( 1 );
		
		// パラメータ名とパラメータ値に分割する
		var element = query.split( '=' );
		
		var paramName = decodeURIComponent( element[ 0 ] );
		parkingId = decodeURIComponent( element[ 1 ] );
		
		var parkingname;
		var add;
		var utilization_start_time;
		var utilization_end_time;
		var parking_type;
		var accept_period;
		
		//駐車場IDから駐車場情報を取得
		$.ajax({
			type: "GET",
			scriptCharset: 'utf-8',
			dataType: 'json',
			url: "http://133.242.232.21/index.php/getParkingDetail",
			cache:false,
			data: "parkingId=" + parkingId ,
			success: function(getData){
				var getJsonData = new Array();
				getJsonData = getData.results;

				parkingId = getJsonData[0].parking_space_id;
				//駐車場名
				parkingname = getJsonData[0].parkingname;
				//住所
				add = getJsonData[0].prefecture + getJsonData[0].city + getJsonData[0].address;
				//営業開始時間
				utilization_start_time = getJsonData[0].utilization_start_time;
				//営業終了時間
				utilization_end_time = getJsonData[0].utilization_end_time;
				//駐車場タイプ
				parking_type = getJsonData[0].parking_type;
				//予約受付期間
				accept_period = getJsonData[0].accept_period;
				
				//駐車場情報を表示
				var parkingTitle = '<font size="5">' + parkingname + '</font>';
				
				$('#title_div').html("");
				$(parkingTitle).appendTo('#title_div').trigger( "create" );
				
				var utilizationTime = '<font>' + utilization_start_time + '～</font><font>' + utilization_end_time + '</font>';
				
				$('#utilization_time').html("");
				$(utilizationTime).appendTo('#utilization_time').trigger( "create" );
				
				var parkingType = '<font>' + parking_type + '</font>';
				
				$('#parking_type').html("");
				$(parkingType).appendTo('#parking_type').trigger( "create" );
				
				var acceptPeriod = '<font>' + accept_period + '日</font>';
				
				$('#accept_period').html("");
				$(acceptPeriod).appendTo('#accept_period').trigger( "create" );
				
				
				//駐車場IDから車室情報を取得
			}
		});
		//駐車場・車室情報をセット
		
		//予約カレンダー作製
		makeCalendar();
	}
	
	//**************************************************************
	//予約カレンダー作成
	//**************************************************************
	function makeCalendar() {
		var nowDate = new Date();
		nowDay = nowDate.getDay();
		var endDay = 31;
		loopEnd = endDay + nowDay;
		var loopCount = 0;
		
		//行が足りないときは追加する
		if(loopEnd > 35){
			var htmlData = calendarHtml(6);
						 
			$('#reservation_div').html("");
			$(htmlData).appendTo('#reservation_div').trigger( "create" );
			
			//超過日数を求める
			var exceedDate = 43;
			
			for(var i=loopEnd; i < exceedDate; i++){
				var htmlData = '<font>予約</font></br><font>不可</font>';
						 
				$('#day_' + i).html("");
				$(htmlData).appendTo('#day_' + i).trigger( "create" );
			}
		}else{
		
			var htmlData = calendarHtml(5);
						 
			$('#reservation_div').html("");
			$(htmlData).appendTo('#reservation_div').trigger( "create" );
		
			//超過日数を求める
			var exceedDate = 36;
			
			for(var i=loopEnd; i < exceedDate; i++){
				var htmlData = '<font>予約</font></br><font>不可</font>';
						 
				$('#day_' + i).html("");
				$(htmlData).appendTo('#day_' + i).trigger( "create" );
			}
		}
		
		//今日以前のセルは－
		for(var i=0; i < nowDay; i++){
			var htmlData = '<font>－</font>';
						 
			$('#day_' + i).html("");
			$(htmlData).appendTo('#day_' + i).trigger( "create" );
		}
		
		for(var i=nowDay; i < loopEnd; i++){
			//年、月、日を取得
			var tYear = nowDate.getFullYear();
			var tMonth = nowDate.getMonth();
			var tDate = nowDate.getDate();
			
			//翌日の日付データ取得
			var tDate = new Date(tYear,tMonth + 1,tDate + loopCount);
			
			var htmlData = '<div onClick="selectDay(' + i + ')"><font id="day_font">' + tDate.getMonth() + '/' + tDate.getDate() +'</font></br><Hr Width="100%" color="#808080"><font id="day_font">1000円</font></div>';
						 
			$('#day_' + i).html("");
			$(htmlData).appendTo('#day_' + i).trigger( "create" );
			
			if(i == 0 || i == 7 || i == 14 || i == 21 || i == 28 || i == 35){
				document.getElementById('day_' + i).style.color = "#FF0000";
			}else if(i == 6 || i == 13 || i == 20 || i == 27 || i == 34 || i == 41){
				document.getElementById('day_' + i).style.color = "#0000FF";
			}else{
				document.getElementById('day_' + i).style.color = "#000000";
			}
			document.getElementById('spc_table_day_' + i).setAttribute('date',tDate.getFullYear() + "/" +tDate.getMonth() + '/' + tDate.getDate());
			
			loopCount = loopCount + 1;
		}
	}
	
	//**************************************************************
	//予約カレンダー選択時チェック状態を変更
	//@param:i カレンダー選択セル番号
	//**************************************************************
	function selectDay(i) {
		var key_day = document.getElementById('spc_table_day_' + i).getAttribute('spcval');
		
		if(key_day === "0"){
			//alert(key_day);
			//選択フラグON
			document.getElementById('spc_table_day_' + i).setAttribute('spcval',1);
			
			//背景色とフォントカラー変更
			document.getElementById('day_' + i).style.backgroundColor  = "#008000";
			document.getElementById('day_' + i).style.color  = "#FFFFFF";
		}else{
			//alert(key_day);
			//選択フラグOFF
			document.getElementById('spc_table_day_' + i).setAttribute('spcval',0);
			
			//背景色とフォントカラー変更
			document.getElementById('day_' + i).style.backgroundColor  = "#FFFFFF";
			if(i == 0 || i == 7 || i == 14 || i == 21 || i == 28 || i == 35){
				document.getElementById('day_' + i).style.color = "#FF0000";
			}else if(i == 6 || i == 13 || i == 20 || i == 27 || i == 34 || i == 41){
				document.getElementById('day_' + i).style.color = "#0000FF";
			}else{
				document.getElementById('day_' + i).style.color = "#000000";
			}
		}
	}
	
	//**************************************************************
	//カレンダーHTML作成
	//@param row カレンダーの行数
	//return カレンダーテーブルのhtml
	//**************************************************************
	function  calendarHtml(row){
		var dayCount = 0;
		var strHtml = '<table id="spc_table" border="1" cellspacing="0">';
		strHtml += '<tr>';
		strHtml += '<th><font color="#ff0000" size="5" id="spc_table_th_sun">日</font></th>';
		strHtml += '<th><font size="5" id="spc_table_th">月</font></th>';
		strHtml += '<th><font size="5" id="spc_table_th">火</font</th>';
		strHtml += '<th><font size="5" id="spc_table_th">水</font</th>';
		strHtml += '<th><font size="5" id="spc_table_th">木</font</th>';
		strHtml += '<th><font size="5" id="spc_table_th">金</font</th>';
		strHtml += '<th><font color="#0000ff" size="5" id="spc_table_th_sat">土</font</th>';
		strHtml += '</tr>';
		
		for(var i = 0; i < row; i++){
			strHtml += '<tr id="day_tr">';
			for(var j = 0; j < 7;j++){
				strHtml += '<td id="spc_table_day_' + dayCount + '"date="" spcval="0"><div id="day_' + dayCount + '"></div></td>';
				dayCount = dayCount + 1;
			}
			strHtml += '</tr>';
		}
		strHtml += '</table>';
		
		return strHtml;
	}
	
	//**************************************************************
	//予約確認画面遷移
	//**************************************************************
	function moveReservation() {
		var selectDate = new Array();
		var dataCount = 0;
		
		//選択された日付取得
		for(var i=nowDay; i < loopEnd; i++){
		
			var key_day = document.getElementById('spc_table_day_' + i).getAttribute('spcval');
			
			if(key_day === "1"){
				selectDate[dataCount] = document.getElementById('spc_table_day_' + i).getAttribute('date');
				dataCount = dataCount + 1;
			}
		}
		
		if(dataCount == 0){
			alert("予約日を選択してください。");
		}else{
			//配列をJSON形式に変更
			var jsonDate = JSON.stringify(selectDate);
			
			var pram="jsonDate=" + jsonDate + "&parkingId=" + parkingId;
			
			location.href='http://133.242.232.21/index.php/reservation?' + pram;
		}
	}
</script>