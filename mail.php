<?php 

require_once('phpmailer/PHPMailerAutoload.php');
$mail = new PHPMailer;
$mail->CharSet = 'utf-8';

$name_spare = $_POST['name_spare'];
$vin_number = $_POST['vin_number'];
$name_client = $_POST['name_client'];
$tel_number = $_POST['tel_number'];

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  																							// Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'tarassolyarevich@gmail.com'; // Ваш логин от почты с которой будут отправляться письма
$mail->Password = 'immilliarder'; // Ваш пароль от почты с которой будут отправляться письма
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587; // TCP port to connect to / этот порт может отличаться у других провайдеров

$mail->setFrom('tarassolyarevich@gmail.com'); // от кого будет уходить письмо?
$mail->addAddress('ktsoliarevich@gmail.com');     // Кому будет уходить письмо 
//$mail->addAddress('ellen@example.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Заявка для уточнення вартості запчастини';
$mail->Body    = '' .$name_client . ' залишив заявку. Цікавить запчастина - '.$name_spare. '<br>VIN номер кузова: ' 
.$vin_number. '<br>Номер телефону - ' .$tel_number. '';
$mail->AltBody = '';

if(!$mail->send()) {
    echo 'Error';
} else {
    header('location: index.html');
}
?>
