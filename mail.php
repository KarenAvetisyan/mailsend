<?php
$to = "kareniweb1995@gmail.com";
$from = "info@https://mailsend-black.vercel.app/";
$subject = "Новая заявка " . $_SERVER['HTTP_REFERER'];

$name = $_POST['name'];

$tel = $_POST['tel'];



$message = "Клиент:\r\n\r\n";

if (!empty($name)) {
    $message .= "Name: " . $name . "\r\n";
}

if (!empty($tel)) {
    $message .= "Номер Телефона: " . $tel . "\r\n";
}


$boundary = md5(date('r', time()));
$headers = "MIME-Version: 1.0\r\n";
$headers .= "From: " . $from . "\r\n";
$headers .= "Reply-To: " . $from . "\r\n";
$headers .= "Content-Type: multipart/mixed; boundary=\"$boundary\"\r\n";

$body = "--$boundary\r\n";
$body .= "Content-Type: text/plain; charset=\"utf-8\"\r\n";
$body .= "Content-Transfer-Encoding: 7bit\r\n";
$body .= "\r\n" . $message . "\r\n";

$body .= "--$boundary--";

if (mail($to, $subject, $body, $headers)) {
    echo $name . ', Ваше сообщение отправлено, спасибо!';
} else {
    echo 'Ошибка при отправке письма.';
}
?>
