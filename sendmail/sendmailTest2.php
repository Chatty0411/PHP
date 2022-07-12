<?php
$to      = 'drama3fu@gmail.com';
$subject = 'the subject';
$message = 'hello';
$headers = 'From: drama3fu@gmail.com' . "\r\n" .
    'Reply-To: drama3fu@gmail.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);
?>