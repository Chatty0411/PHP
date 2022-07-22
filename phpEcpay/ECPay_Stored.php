<?php
header('Access-Control-Allow-Origin: *');

require_once 'ECPay.Payment.Integration.php';

$obj = new \ECPay_AllInOne();

 
//服務參數
// $obj->ServiceURL  = $_POST['ServiceURL'];

// 針對個別店家要在前端有值傳過來(每個店家資料庫欄位)才支援(目前皆為測試帳號)
$obj->MerchantID  = '2000132';
$obj->HashKey     = '5294y06JbISpM5x9';
$obj->HashIV      = 'v77hoKGq4kWxNNIS';

//
$obj->Send['MerchantTradeNo'] = $_POST['MerchantTradeNo'];
$obj->Send['MerchantTradeDate'] = $_POST['MerchantTradeDate'];
$obj->Send['PaymentType'] = $_POST['PaymentType'];
$obj->Send['TotalAmount'] = (int)$_POST['TotalAmount'];
$obj->Send['TradeDesc'] = $_POST['TradeDesc'];
$obj->Send['ChoosePayment'] = $_POST['ChoosePayment'];
//$obj->Send['CreditInstallment'] = $_POST['CreditInstallment'];

$obj->ServiceURL = "https://payment-stage.ecpay.com.tw/Cashier/AioCheckOut/V5";
$obj->Send['ReturnURL'] = "https://ble.com.tw/test/ECPay_ReturnURL.php";
// $obj->Send['OrderResultURL'] = "https://ble.com.tw/test/ECPay_OrderResultURL.php";
 
//傳到後端處理修改SQL資料再HEADER到前端
$obj->Send['ClientBackURL'] = "http://localhost:3000/"; //ECPay顯示交易結果頁.裡面帶出返回商店按鈕
 
 
$obj->Send['CustomField1']      = date('Y/m/d H:i:s');  	//額外的欄位
$obj->Send['CustomField2']      = "";  				  	//額外的欄位
 
//訂單的商品資料
array_push($obj->Send['Items'], array(
        'Name' => '儲值',
        'Price' => (int)$_POST['TotalAmount'],
        'Currency' => "元",
        'Quantity' => (int)"1"
    )
);
 
//產生訂單(auto submit至ECPay)
$obj->CheckOut();
// $Response = (string)$obj->CheckOutString();
// echo $Response;
 
// 自動將表單送出
// echo '<script>document.getElementById("__ecpayForm").submit();</script>';