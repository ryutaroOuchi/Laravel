$(function(){
	alert("呼び出し確認");
});

	//**************************************************************
	//車両タイプの一覧取得
	//@retunr:getJsonData 車両タイプの配列
	//**************************************************************
	function getVehicleType(){
		$.ajax({
			type: "GET",
			scriptCharset: 'utf-8',
			dataType: 'json',
			url: "http://133.242.232.21/index.php/getVehicleType",
			cache:false,
			success: function(getData){
				var getJsonData = new Array();
				getJsonData = getData.results;
				
				return getJsonData;
			}
		});
	}
