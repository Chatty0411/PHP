<?php
header('Access-Control-Allow-Origin: http://localhost:3000');

if (!isset($_POST['sendmail'])) echo -1;
$sendmail = $_POST['sendmail'];

// 驗證碼產生
$s = "";
for ($i = 1; $i <= 4; $i ++){
   $e = floor(rand(1,9));
   $s = $s . $e;
}
$chkNumber = $s;


// The message
$message = "驗證碼是\r\n". $chkNumber;

// In case any of our lines are larger than 70 characters, we should use wordwrap()
$message = wordwrap($message, 70, "\r\n");

// Send
mail($sendmail, 'My Subject', $message);
// mail('drama3fu@gmail.com', 'My Subject', $message);

echo $chkNumber;
?>