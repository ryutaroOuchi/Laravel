$(function(){
	//alert("呼び出し確認");
});

//リクエストタイプ
const REQUEST_TYPE = "GET";

//文字コード設定
const STR_TYPE = 'utf-8';

//データ種別
const DATA_TYPE = 'json';

//車両タイプの取得先URL
const VEHICLE_TYPE_URL = "http://133.242.232.21/index.php/getVehicleType";

//駐車場情報の取得先URL(位置情報から取得)
const PARKING_DATA_LNGLAT_URL = "http://133.242.232.21/index.php/getParkingData";

//アピール情報の取得先URL
const APPEAL_DATA_URL = "http://133.242.232.21/index.php/getAppealData";

	//**************************************************************
	//車両タイプの一覧取得
	//@retunr:getJsonData 車両タイプの配列
	//**************************************************************
	function getVehicleType(){
	
		var getJsonData = new Array();
	
		$.ajax({
			type: REQUEST_TYPE,
			scriptCharset: STR_TYPE,
			dataType: DATA_TYPE,
			async: false,
			url: VEHICLE_TYPE_URL,
			cache:false,
			success: function(getData){
				
				getJsonData = getData.results;

			}
		});
		return getJsonData;
	}
	
	//**************************************************************
	//駐車場情報取得(位置情報から取得)
	//@param:lat 緯度
	//@param:lng 経度
	//@param:radius 検索範囲
	//@retunr:getJsonData 駐車場情報の配列
	//**************************************************************
	function getParkingData(lng,lat,radius){
	
		var getJsonData = new Array();
	
		$.ajax({
			type: REQUEST_TYPE,
			scriptCharset: STR_TYPE,
			dataType: DATA_TYPE,
			async: false,
			url: PARKING_DATA_LNGLAT_URL,
			cache:false,
			data: "lng=" + lng + "&lat=" + lat + "&radius=" + radius,
			success: function(getData){
				getJsonData = getData.results;
			}
		});
		return getJsonData;
	}
	
	//**************************************************************
	//駐車場情報取得(駐車場IDから取得)未完成
	//@param:lat 緯度
	//@param:lng 経度
	//@param:radius 検索範囲
	//@retunr:getJsonData 駐車場情報の配列
	//**************************************************************
	function getParkingData(lng,lat,radius){
	
		var getJsonData = new Array();
	
		$.ajax({
			type: REQUEST_TYPE,
			scriptCharset: STR_TYPE,
			dataType: DATA_TYPE,
			async: false,
			url: PARKING_DATA_LNGLAT_URL,
			cache:false,
			data: "lng=" + lng + "&lat=" + lat + "&radius=" + radius,
			success: function(getData){
				getJsonData = getData.results;
			}
		});
		return getJsonData;
	}
	
	//**************************************************************
	//アピール文取得
	//@param:parkingId 駐車場ID
	//@return アピール情報
	//**************************************************************
	function getAppealData(parkingId){
	
		var getJsonData = new Array();
	
		$.ajax({
			type: REQUEST_TYPE,
			scriptCharset: STR_TYPE,
			dataType: DATA_TYPE,
			async: false,
			url: APPEAL_DATA_URL,
			cache:false,
			data: "parkingId=" + parkingId,
			success: function(getData){
				getJsonData = getData.results;
			}
		});
		//console.log(getJsonData);
		return getJsonData;
	}
