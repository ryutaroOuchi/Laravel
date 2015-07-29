<style type="text/css">
	
	#header-form{
		width: auto;
		height: 20%;
	}

	#footer-form{
		width: auto;
		height: 50px;
	}
	
	#top-form{
		width: 100%;
	}
	
	#top_all_form{
		width: 80%;
		margin: 0 auto;
	}
	
	#top-img-div{  
    	border: 1px solid #000000;
    	height: 100px;
    	width: 100%;
	}
	
	#input_div{
		text-align: center;
		width: 100%;
		margin: 0 auto;
	}
	
	#manual-div{  
    	border: 1px solid #000000;
    	height: 100px;
    	width: 100%;
	}
	
	#history-div{  
    	border: 1px solid #000000;
    	height: 100px;
    	width: 100%;
	}
	
	#new-div{  
    	border: 1px solid #000000;
    	height: 100px;
    	width: 100%;
	}
	
	#favorite-div{  
    	border: 1px solid #000000;
    	height: 100px;
    	width: 100%;
	}
	
	#announce-div{  
    	border: 1px solid #000000;
    	height: 100px;
    	width: 100%;
	}
	
	#user-div{
    	border: 1px solid #000000;
    	height: 100px;
    	width: 47%;
    	float:left;
    	margin-right:10px;
	}
	
	#owner-div{  
    	border: 1px solid #000000;
    	height: 100px;
    	width: 47%;
    	float:left;
    	margin-left:10px;
	}
	
	#userowner-div{  
    	margin: 0px;
		height: 100px;
		width: 100%;
	}
	
	#top-form font{
		position: relative;
    	top: 40%;
    	margin-top: -0.5em;
	}
	
</style>

<html>
	<head>
		<meta charset="UTF-8" />
		<title>TOP画面</title>
		<!-- jQuery UI + datepicker UI -->
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
		</script>
	</head>
	<body>
		<form id="header-form">
			<?php include('../resources/views/common/test_header.blade.php'); ?>
		</form>
		<form id="top_all_form">	
			<form id="top-form" name="top-form" method="get">
				<div id="top-img-div">
					<font>イメージ画像もしくはイラスト</font>
				</div>
				</br>
				<div id="input_div">
					<font>予約したい場所を検索</font>
					</br>
					<input type="text" name="strAddress" id="strAddress" size="20" value="溜池山王" onkeydown="if(event.keyCode == 13){moveAddress()}">
					<input type="button" id="addressbtn" value="検索" onclick="moveAddress()">
					</br>
					<input type="radio" id="Type" name="vehicleType" value="0" checked>車
					<input type="radio" id="Type" name="vehicleType" value="1" >バイク
				</div>
				</br>
				<div id="manual-div">
					<font>tomeretaの使い方</font>
				</div>
				</br>
				<div id="history-div">
					<font>過去に見た駐車場</font>
				</div>
				</br>
				<div id="new-div">
					<font>新着情報</font>
				</div>
				</br>
				<div id="favorite-div">
					<font>人気のある駐車場</font>
				</div>
				</br>
				<div id="announce-div">
					<font>お知らせ</font>
				</div>
				</br>
				<div id="userowner-div">
					<div id="user-div">
						<font>利用者様の声</font>
					</div>
					<div id="owner-div">
						<font>オーナー様の声</font>
					</div>
					<div style="clear:both;"></div>
				</div>
				</br>
			</form>
		</form>
		<form id="footer-form">
			<?php include('../resources/views/common/test_footer.blade.php'); ?>
		</form>
	</body>
</html>

<script type="text/javascript">

	
	function moveAddress() {
		
		var strAddress;
		var vehicleType;
		
		if (document.getElementById('strAddress').value!=""){
            strAddress = document.getElementById('strAddress').value;
        }else{
        	strAddress = "赤坂見附";
        }
        
        var radioList = document.getElementsByName("vehicleType");
        
        for(var i=0; i < radioList.length;i++){
        	if (radioList[i].checked) {
				vehicleType = radioList[i].value;
				break;
			}
        }
        
        var pram="strAddress=" + strAddress + "&vehicleType=" + vehicleType;

		location.href="http://133.242.232.21/index.php/search?"+pram;
	}
</script>