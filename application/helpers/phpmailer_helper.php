<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function phpmailer_send($to_mail, $from_name, $from_mail, $subject, $body)
{
  require 'PHPMailer/src/Exception.php';
  require 'PHPMailer/src/PHPMailer.php';
  require 'PHPMailer/src/SMTP.php';
  $mail = new PHPMailer(true);

  try {
    //Gmail 認証情報
    // $host = 'smtp.gmail.com';
    // $username = 'kinstagram111@gmail.com'; // example@gmail.com
    // $password = 'cYyHtQgo';
    // $password = 'ojtvxrefdpebsukx';
    $host = 'localhost';


    //メール設定
    $mail->SMTPDebug = 0; //デバッグ用
    $mail->isSMTP();
    // $mail->SMTPAuth = true;
    $mail->Host = $host;
    // $mail->Username = $username;
    // $mail->Password = $password;
    // $mail->SMTPSecure = 'tls';
    // $mail->Port = 587;
    $mail->Port = 25;
    $mail->CharSet = "utf-8";
    $mail->Encoding = "base64";
    $mail->setFrom($from_mail, $from_name);
    $mail->addAddress($to_mail, 'sadasdas');
    $mail->Subject = $subject;
    $mail->Body    = $body;

    //メール送信
    $result = $mail->send();
    if ($result) {
      return true;
    } else {
      return false;
    }
  } catch (Exception $e) {
    return false;
  }
}
