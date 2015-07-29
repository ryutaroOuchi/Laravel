<?php

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

<form name="form1" action="./index.php" method="post">
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
