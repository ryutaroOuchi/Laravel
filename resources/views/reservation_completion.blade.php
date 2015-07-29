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
	
	#reserved_form{
		width: 970px;
		margin: 0 auto;
	}
	
	#title_div{
		width: 100%
	}
	
	#sub_title_div{
		width: 25%;
		float: left;
	}
	
	#address_div{
		width: 75%;
		float: left;
	}
	
	#description_div{
		width: 75%;
		float: left;
	}
	
	#vehicle_space_div{
		width: 75%;
		float: left;
	}
	
	#schedule_input_div{
		width: 75%;
		float: left;
	}
	
	#reserved_driver_div{
		width: 75%;
		float: left;
	}
	
	#settlement_div{
		width: 75%;
		float: left;
	}
	
	#precautions_area{
		resize: none;
	}
	
	#free_area{
		resize: none;
	}
	
	#othere_area{
		resize: none;
	}
	
</style>

<html>
	<head>
		<meta charset="UTF-8" />
		<title>予約確認画面</title>
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
		<form id="reserved_form">
			<div id="title_div">
				<font size="4">
					予約が確定しました。</br>
				</font>
			</div>
			</br>
			<div>
				<div id="title_div">
					<font size="4">駐車場情報</font>
				</div>
			</div>
			</br>
			<div>
				<div id="sub_title_div">
					<font>場所</font>
				</div>
				<div id="address_div">
					<font>住所</font></br>
					<font>駐車場名</font></br>
					<font>地図</font>
				</div>
				<div style="clear:both;"></div>
			</div>
			</br>
			<div>
				<div id="sub_title_div">
					<font>駐車場説明</font>
				</div>
				<div id="description_div">
					<font>説明</font>
				</div>
				<div style="clear:both;"></div>
			</div>
			</br>
			<div>
				<div id="sub_title_div">
					<font>車室</font>
				</div>
				<div id="vehicle_space_div">
					<font>車室名</font></br>
					<font>車室図</font>
				</div>
				<div style="clear:both;"></div>
			</div>
			</br>
			<div>
				<div id="sub_title_div">
					<font>ご利用日</font>
				</div>
				<div id="schedule_input_div"></div>
				<div style="clear:both;"></div>
			</div>
			</br>
			<div>
				<div id="sub_title_div">
					<font>決済情報</font>
				</div>
				<div id="settlement_div">
					<font>カード番号</font></br>
					<font>他のカードで決済</font>
				</div>
				<div style="clear:both;"></div>
			</div>
			</br>
			<div>
				<div id="sub_title_div"	>
					<font>予約者</font>
				</div>
				<div id="reserved_driver_div">
					<font>○△　□×様</font>
				</div>
				<div style="clear:both;"></div>
			</div>
			</br>
			<div>
				<div>
					<font>注意事項</font>
				</div>
				<div>
					<TEXTAREA id="precautions_area" cols="40" rows="3" wrap="hard"></TEXTAREA>
				</div>
			</div>
			</br>
			<div id="move_botton_div">
				<input type="button" id="returnPage" value="予約情報を印刷する" >
			</div>
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

	var parkingId;
	
	//**************************************************************
	//画面表示時の初期表示
	//**************************************************************
	function initialize() {
		
		// 最初の1文字 (?記号) を除いた文字列を取得する
		var query = window.location.search.substring( 1 );
		
		// クエリの区切り記号 (&) で文字列を配列に分割する
        var parameters = query.split( '&' );
		
		// パラメータ名とパラメータ値に分割する
		var element_1 = parameters[0].split( '=' );
		var element_2 = parameters[1].split( '=' );

		var param_1 = decodeURIComponent( element_1[ 1 ] );
		parkingId = decodeURIComponent( element_2[ 1 ] );
		
		//JSONデータを配列化
		var selectDate = JSON.parse(param_1);
		//配列の要素数取得
		var len = selectDate.length;
		
		var htmlData = new String();
		var htmlTime = new String();
		
		//時間のオプションタグ作成
		for(var j=0; j < 24; j++){
			htmlTime += '<option value="' + j + ':00">' + j + ':00</option>';
			htmlTime += '<option value="' + j + ':30">' + j + ':30</option>';
		}
		
		//ご利用時間の入力欄作成
		for(var i = 0; i < len; i++){
			htmlData += '<font>' + selectDate[i] + '</font></br><font>到着予定時間：</font><select name="selectTimeS_' + i + '">';
			htmlData += htmlTime;
			htmlData += '</select><font>～</font><font>退出予定時間：</font><select name="selectTimeE_' + i + '">';
			htmlData += htmlTime;
			htmlData +='</select></br></br>';
		}
		$('#schedule_input_div').html("");
		$(htmlData).appendTo('#schedule_input_div').trigger( "create" );
	}
	
	//**************************************************************
	//駐車場詳細画面へ戻る
	//**************************************************************
	function rePage(){
		var pram="parkingId=" + parkingId;

		location.href="http://133.242.232.21/index.php/details?" + pram;
	}
	
	//**************************************************************
	//確認画面へ遷移
	//**************************************************************
	function insertPage(){
		var pram="parkingId=" + parkingId;

		location.href="http://133.242.232.21/index.php/completion?" + pram;
	}

</script>