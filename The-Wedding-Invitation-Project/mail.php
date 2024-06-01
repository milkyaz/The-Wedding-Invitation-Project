<?php
// Подключение библиотеки
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';
require 'phpmailer/Exception.php';

// Получение данных
$json = file_get_contents('php://input'); // Получение json строки
$data = json_decode($json, true); // Преобразование json

// Данные
$name = $data['name'];
$tel = $data['tel'];
$msg = $data['msg'];

// Контент письма
$title = 'Приглашение на свадьбу'; // Название письма
$body = '<p>Имя и Фамилия: <strong>' . $name . '</strong></p>' .
  '<p>Телефон: <strong>' . $tel . '</strong></p>' .
  '<p>Сообщение: <strong>' . $msg . '</strong></p>';

// Настройки PHPMailer
$mail = new PHPMailer\PHPMailer\PHPMailer();

try {
  $mail->isSMTP();
  $mail->CharSet = 'UTF-8';
  $mail->SMTPAuth   = true;

  // Настройки почты отправителя
  $mail->Host       = ''; // SMTP сервера вашей почты
  $mail->Username   = ''; // Логин на почте
  $mail->Password   = ''; // Пароль на почте
  $mail->SMTPSecure = '';
  $mail->Port       = ;

  $mail->setFrom('', 'Заявка с сайта'); // Адрес самой почты и имя отправителя

  // Получатель письма
  $mail->addAddress('');
  $mail->addAddress('');
  // Отправка сообщения
  $mail->isHTML(true);
  $mail->Subject = $title;
  $mail->Body = $body;

  $mail->send('d');

  // Сообщение об успешной отправке
  echo ('Сообщение отправлено успешно!');
} catch (Exception $e) {
  header('HTTP/1.1 400 Bad Request');
  echo ('Сообщение не было отправлено! Причина ошибки: {$mail->ErrorInfo}');
}
