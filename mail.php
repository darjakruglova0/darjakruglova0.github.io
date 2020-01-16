




<?php
// Файлы phpmailer
require 'PHPmailer.php';
require 'SMTP.php';
// Переменные
$name = $_POST['name2'];
$number = $_POST['number2'];
$email = $_POST['message2'];
// Настройки
$mail = new PHPMailer;
$mail->isSMTP(); 
$mail->Host = 'smtp.yandex.ru'; 
$mail->SMTPAuth = true; 
$mail->Username = 'whitecleaning.by'; // Ваш логин в Яндексе. Именно логин, без @yandex.ru
$mail->Password = 'ZE0IS7UK50'; // Ваш пароль
$mail->SMTPSecure = 'ssl'; 
$mail->Port = 465;
$mail->setFrom('whitecleaning.by@yandex.ru'); // Ваш Email
$mail->addAddress('info@whitecleaning.by'); // Email получателя
$mail->addAddress('example@gmail.com'); // Еще один email, если нужно.
// Прикрепление файлов
 for ($ct = 0; $ct < count($_FILES['userfile']['tmp_name']); $ct++) {
 $uploadfile = tempnam(sys_get_temp_dir(), sha1($_FILES['userfile']['name'][$ct]));
 $filename = $_FILES['userfile']['name'][$ct];
 if (move_uploaded_file($_FILES['userfile']['tmp_name'][$ct], $uploadfile)) {
 $mail->addAttachment($uploadfile, $filename);
 } else {
 $msg .= 'Failed to move file to ' . $uploadfile;
 }
 } 
 
// Письмо
$mail->isHTML(true); 
$mail->Subject = "Заголовок"; // Заголовок письма
$mail->Body = "Имя $name2 . Телефон $number2 . Сообщение $message2"; // Текст письма
// Результат
if(!$mail->send()) {
 echo 'Message could not be sent.';
 echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
 echo 'ok';
}
?>