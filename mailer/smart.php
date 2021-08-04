<?php 

$name = $_POST['client-name'];
$phone = $_POST['client-phone'];
$email = $_POST['client-email'];

require_once('phpmailer/PHPMailerAutoload.php');
$mail = new PHPMailer;
$mail->CharSet = 'utf-8';

$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.mail.ru';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'mueno2020@mail.ru';                 // Наш логин
$mail->Password = 'aa2440425aa';   
//$mail->Username = 'gefest.vsk@bk.ru';                 // Наш логин
//$mail->Password = 'Stroika2233!';                           // Наш пароль от ящика
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                    // TCP port to connect to
 
$mail->setFrom('mueno2020@mail.ru', 'Заявка на сайте ГЕФЕСТ ВСК');   // От кого письмо 
$mail->addAddress('piskunov2000andrey@gmail.com');     // Add a recipient
//$mail->addAddress('info@gefestvsk.ru');     // Add a recipient
//$mail->addAddress('ellen@example.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Новая заявка на сайте';
$mail->Body    = '
	Пользователь оставил свои данные <br> 
	Имя: ' . $name . ' <br>
	Почта: ' . $email . ' <br>
	Телефон: ' . $phone . '';
$mail->AltBody = 'Альтернативный текст';


if(!$mail->send()) {
    return false;
} else {
    return true;
}

?>