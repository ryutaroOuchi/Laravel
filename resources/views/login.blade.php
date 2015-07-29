<style type="text/css">
	
	#header-form{
		width: auto;
		height: 170px;
	}
	
	#footer-div{  
    	border: 1px solid #000000;
    	height: 100%;
    	width: 100%;
	} 
	
	#footer-form{
		width: auto;
		height: 50px;
	}
	
	#footer-div font{  
    	position: relative;
    	top: 40%;
    	margin-top: -0.5em;
	}
	
	#login-form{
		width: auto;
	}
	
	#login-div{
		border: 0px solid #000000;
		margin-left:auto;
		margin-right:auto;
		width: 20%;
	}
	
	#login-div a{
		text-decoration: none;
	}

	#login-title{
		text-align:left;
		font-size:xx-large;
		margin-left:10;
	}

	#login-sub-title{
		text-align:left;
		font-size:large;
		margin-left:10;
	}
	
	#login-button{
		text-align:left;
		font-size: large;
		margin-left:140;
		margin-right:auto;
	}
	
	#address{
		margin-left:10;
		width:200px;
	}
	
	#pass{
		margin-left:10;
		width:200px;
	}
	
</style>

<html>
	<head>
		<meta charset="UTF-8" />
		<title>TOP画面</title>
		<!-- jQuery UI -->
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
		</script>
	</head>
	<body>
		<form id="header-form">
			<?php include('../resources/views/common/common_header.blade.php'); ?>
		</form>
		</br>
		<form id="login-form">
			<div id="login-div">
				<font id="login-title">ログイン</font>
				</br>
				</br>
				<font id="login-sub-title">メールアドレス</font>
				</br>
				<input type="text" id="address" value="" onkeydown="if(event.keyCode == 13){loginStart()}">
				</br>
				<font id="login-sub-title">パスワード</font>
				</br>
				<input type="password" id="pass" value="" onkeydown="if(event.keyCode == 13){loginStart()}">
				</br>
				</br>
				<button type="button" id="login-button" name="login_start" value="login_start" onclick="loginStart()">
					<font size="3">ログイン</font>
				</button> 
				</br>
				</br>
				<a href="" id="forget-pass">パスワードを忘れた方</a>
				</br>
				<a href="" id="not-member">会員登録がお済みでない方</a>
			</div>
		</form>
		<form id="footer-form">
			<div id="footer-div">
				<font>フッター</font>
			</div>
		</form>
	</body>
</html>

<script type="text/javascript">
	
	//**************************************************************
	//ログイン処理
	//**************************************************************
	function loginStart(){
	
		//入力されたアドレス、パスワード取得
		var inputId = document.getElementById('address').value;
		var inputPass = document.getElementById('pass').value;
		
		//入力チェック
		if(!inputId && !inputPass)
		{
			alert("メールアドレスとパスワードが入力されていません。");
		}
		else if(!inputId || !inputPass)
		{
			alert("メールアドレスまたはパスワードが入力されていません。");
		}
		else
		{
			var checkId;
			var checkPass;
			var user_name;
			var role_type;
			
			//ログイン情報取得
			$.ajax({
				type: "GET",
				scriptCharset: 'utf-8',
				dataType: 'json',
				url: "http://133.242.232.21/index.php/getLoginData",
				cache:false,
				success: function(getData){
					var getJsonData = new Array();
					getJsonData = getData.results;
					var len = getJsonData.length;
					//入力データと取得データが一致するか確認
					for(var i=0; i < len; i++){
						if(inputId === getJsonData[i].mail_address)
						{
							checkId = getJsonData[i].mail_address;
							if(inputPass === getJsonData[i].password)
							{
								checkPass = getJsonData[i].password;
								user_name = getJsonData[i].last_name + getJsonData[i].first_name;
								role_type = getJsonData[i].role_type;
							}
						}
					}
					if(!checkId || !checkPass)
					{
						alert("メールアドレスまたはパスワードが間違っています。");
					}else{
						alert(user_name + "さん、ようこそ");
					}
				}
			});
		}
	}
</script>