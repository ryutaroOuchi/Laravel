<?php
session_start();

$error_message = "";

if ( isset($_POST["login"]) ) {
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>tomereta 駐車場は予約する時代へ</title>
<meta http-equiv="Content-Style-Type" content="text/css">
<!-- jQuery UI + datepicker UI -->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1/jquery-ui.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1/i18n/jquery.ui.datepicker-ja.min.js"></script>
<!-- jQuery UIのCSS -->
<link type="text/css" href="../css/test_header.css" rel="stylesheet" media="all">
<link type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/ui-lightness/jquery-ui.css" rel="stylesheet" />
<style type="text/css">
body {
/*
  background-image:url(img/container-bg.png);
  background-position:top center;
  background-repeat:repeat-x;
  background-color:#FFFFFF;
  margin:0px;
  padding:0px;
  border-top:4px solid #604f86;
*/
}

* {
  font-family:"ヒラギノ角ゴ Pro W3", "Hiragino Kaku Gothic Pro", "メイリオ", "Meiryo", verdana, Osaka, Sans-Serif;
  /* font-size:11pt; */
  color: black;
  line-height:1.4em;
}

#company_header {
  padding: 5px 5px 10px 50px;
}

#title {
  clear: both;
  background-image:url(img/container-bg.png);
  background-position:top center;
  background-repeat:repeat-x;
  background-color:#FFFFFF;
  margin 0px;
  padding: 0px;
  border-top:4px solid #604f86;
}
#title_text {
	text-align: left;
	margin: 15px 0px 0px 20px;
	font-size: 1.8em;
	color: #0000CD;
}
#input_area {
	float: left;
	text-align: center;
	margin: 20px 0px 20px 30px;
}
#illust_area {
	float: left;
	text-align: center;
	margin: 0px 0px 20px 0px;
}
#submit_area {
	clear: both;
	text-align: center;
	margin: 20px 0px 20px 0px;
}
#submit_left {
	float: left;
	margin: 20px 0px 20px 40px;
}
#submit_center {
	float: left;
	margin: 20px 0px 20px 400px;
}
#submit_right {
	float: left;
	margin: 20px 0px 20px 50px;
}
table {
	background-color: #ffffff;
	border:#dcdddd 3px double;
	border-collapse: collapse;
	font-size: 11px;
	color:#333333;
	margin: 0 auto;
} 
table th {
	border: #dcdddd 1px solid;
	background-color: #efefef;
	text-align: right;
	padding: 10px;
	vertical-align: middle;
	font-size: 1.2em;
	width: 100px;
} 
table td {
	background-color: #fff;
	text-align: left;
	padding: 10px;
	vertical-align: middle;
	font-size: 1.2em;
}

select {
	background-color: #fff;
	text-align: left;
	padding: 2px;
	vertical-align: middle;
	font-size: 1.2em;
	width: 150px;
}

#description {
	width: 600px;
	margin: 80px 0px 20px 0px;
}

#btn_clear {
	text-align: right;
	padding: 0px 60px 0px 0px;
}

.btn_wrapper{
	padding: 5px;
	text-align: center;
}

input.input_text {
	width: 100px;
	height: 25px;
	font-size: 1.4em;
	text-align: right;
}

td.input_tanni {
	width: 40px;
	height: 25px;
	font-size: 1.4em;
	text-align: left;
}

.btn_wrapper input {
	background: #EEE;
	border: 3px solid #DDD;
	color: #111;
	width: 100px;
	padding: 10px 0;
}

input.submit_button {
	background: #EEE;
	border: 3px solid #DDD;
	color: #111;
	width: 100px;
	padding: 10px 0;
}

table.noborder,
table.noborder td {
		border-style: none !important;
}

#picslide {
	text-align: center;
	height: 400px;
	width: 1000px;
}

#footer {
	width: 1000px;
	clear: both;
/*
  background-image:url(img/footer_back.png);
  background-position:top center;
  background-repeat:repeat-x;
  background-color:#FFFFFF;
  margin 0px;
  padding: 0px;
	background-color: #FF0000;
*/
/*
	border: #dcdddd 1px solid;
	background-color: #FF0000;
*/
	position:  relative;
	padding: 12px 10px;
	zoom: 1;
}

/* 
 * Footer CSS
 */
#footer ul#footer_navi {
	margin: 0 191px 3px 0;
	zoom: 1;
}
#footer ul#footer_navi:after { /* for Modern Browser */
	content: "."; display: block; clear: both; height: 0; visibility: hidden; font-size: 0;
}

#footer ul#footer_navi li {
	float: left;
	display: inline;
	margin: 0 0 4px 10px;
	padding: 0 0 0 6px;
/*	border-left: 1px solid #000000; */
/*	font-size: 92.4%; */
	font-size: 75%;
	line-height: 1.167;
	white-space: nowrap;
}

#footer ul#footer_navi li.first {
	margin-left: 0;
	padding-left: 0;
	border-left: none;
	width: 200px;
	text-align: left;
}

#footer ul#footer_navi li a {
	color: #000000;
	text-decoration: underline;
}

#footer ul#footer_navi li a:hover {
	text-decoration: none;
}

/* 2.CorpName
========================================== */
#footer address#corp_name {
	position: absolute;
	top: 13px;
	left: 940px;
	width: 126px;
}


/* 3.Copyright
========================================== */
#footer address#copyright {
	font-size: 70%;
	line-height: 1.335;
	text-align: center
	margin: 20px 0px 0px 0px;
}

</style>
</head>
<body>
<div id="header">
<div id="header_left">
	<p id="description">駐車場は予約する時代へ</p>
	<div id="title_logo"><a href="#"><img src="../logo/tomereta_logo.png" width="100" alt="tomeretalogo" /></a></div>
</div>
<div id="header_right">
	<ul id="headerNavi">
		<li class="item01"><a href="http://133.242.232.21/index.php/top">駐車場を借りる</a></li>
		<li class="item02"><a href="#">駐車場を貸す</a></li>
		<li class="item03"><a href="#">tomeretaとは</a></li>
	</ul>
<?php if (isset($_SESSION["uid"]) && $_SESSION["uid"]!="") { ?>
	<?php if ($_SESSION["status"]=="driver") { ?>
		<ul id="headerNavi2">
			<li class="item01"><a href="./home.php">ホーム</a></li>
			<li class="item02"><a href="./resevation.php">予約状況</a></li>
			<li class="item03"><a href="./message.php">メッセージ</a></li>
			<li class="item04"><a href="account.php">アカウント情報登録</a></li>
			<li class="item05"><a href="favorite.php">お気に入り</a></li>
			<li class="item06"><a href="logout.php">ログアウト</a></li>
		</ul>
	<?php } else { ?>
		<ul id="headerNavi2">
			<li class="item01"><a href="./home.php">ホーム</a></li>
			<li class="item02"><a href="favorite.php">駐車場登録</a></li>
			<li class="item03"><a href="./resevation.php">予約状況</a></li>
			<li class="item04"><a href="./message.php">メッセージ</a></li>
			<li class="item05"><a href="account.php">アカウント情報登録</a></li>
			<li class="item06"><a href="logout.php">ログアウト</a></li>
		</ul>
	<?php }?>
<?php } else { ?>
	<ul id="headerNavi3">
		<li class="item01"><a href="./regist.php">新規登録</a></li>
		<li class="item02"><a href="./login.php">ログイン</a></li>
	</ul>
<?php }?>
</div>
<!-- /#header --></div>
<div id="title">
<!--
	<div id="title_text">tomereta　 駐車場は予約する時代へ</div>
-->
</div>
<form name="form1" action="./index.php" method="post">
<div id="input_area">
<div id="picslide">
写真スライド
</div>
<hr size="1" color="#dcdcdc" style="margin: 20px 0px 10px 0px;">
	<div id="footer">
		<ul id="footer_navi">
			<li class="first"><a href="#">tomeretaについて</a></li>
			<li><a href="#">運営会社</a></li>
		</ul>
		<ul id="footer_navi">
			<li class="first"><a href="#">ご利用ガイド</a></li>
			<li><a href="#">特定商取引法</a></li>
		</ul>
		<ul id="footer_navi">
			<li class="first"><a href="#">お出かけする方</a></li>
			<li><a href="#">個人情報保護方針</a></li>
		</ul>
		<ul id="footer_navi">
			<li class="first"><a href="#">駐車場をお持ちの方</a></li>
			<li><a href="#">お問い合わせ</a></li>
		</ul>
		<ul id="footer_navi">
			<li class="first"><a href="#">Ｑ＆Ａ</a></li>
		</ul>
		<ul id="footer_navi">
			<li class="first"><a href="#">利用規約</a></li>
		</ul>
		<ul id="footer_navi">
			<li class="first"><a href="#">登録規約</a></li>
		</ul>
		<address id="copyright">Copyright (C) Sharing Service Co. Ltd. All Rights Reserved.</address>
	<!-- /#footer --></div>
</body>
</html>
<script type="text/javascript">
$(function(){
	$(document).on('click', '#ow', function() {
	});
});
</script>
