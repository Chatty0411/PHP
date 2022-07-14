<?php
header('Access-Control-Allow-Origin: *');

require_once 'ECPay.Payment.Integration.php';
 
$obj = new \ECPay_AllInOne();
 
//服務參數
$obj->ServiceURL = "https://payment-stage.ecpay.com.tw/Cashier/AioCheckOut/V5";
$obj->MerchantID  = '2000132';
$obj->HashKey     = '5294y06JbISpM5x9';
$obj->HashIV      = 'v77hoKGq4kWxNNIS';
 
//
$obj->Send['MerchantTradeNo'] = $_POST['MerchantTradeNo'];
$obj->Send['MerchantTradeDate'] = $_POST['MerchantTradeDate'];
$obj->Send['PaymentType'] = $_POST['PaymentType'];
$obj->Send['TotalAmount'] = (int)$_POST['TotalAmount'];
$obj->Send['TradeDesc'] = $_POST['TradeDesc'];
$obj->Send['ReturnURL'] = "https://ble.com.tw/test/ECPay_ReturnURL.php";
$obj->Send['ClientBackURL'] ="http://localhost/PHP/phpEcpay//ECPay_ReturnURL.php";
$obj->Send['ChoosePayment'] = $_POST['ChoosePayment'];
// $obj->Send['CreditInstallment'] = $_POST['CreditInstallment'];
// $obj->Send['ChooseSubPayment'] = $_POST['ChooseSubPayment'];
// $obj->Send['ClientRedirectURL'] = $_POST['ClientRedirectURL'];
// $obj->Send['PaymentInfoURL'] = $_POST['PaymentInfoURL'];
//訂單的商品資料
array_push($obj->Send['Items'], array(
        'Name' => 'aaa',
        'Price' => 9487,
        'Currency' => "元",
        'Quantity' => (int)"1"
    )
);
 
//產生訂單(auto submit至ECPay)
// $obj->CheckOut();
$Response = $obj->CheckOut();
// $Response = (string)$obj->CheckOutString();
// $Response = $obj->CheckOutFeedback();
echo $Response;
 
// 自動將表單送出
// echo '<script>document.getElementById("__ecpayForm").submit();</script>';
?>