<?php
$Nome		= $_POST["nome"];	// Pega o valor do campo Nome
$Fone		= $_POST["telefone"];	// Pega o valor do campo Telefone
$Email		= $_POST["email"];	// Pega o valor do campo Email
$Mensagem	= 'Agora voce agora faz parte do nosso time da FATEC Araras e esta inscrito para receber todas as novidades';	// Pega os valores do campo Mensagem

// Variável que junta os valores acima e monta o corpo do email

$Vai 		= "Obrigado $Nome\n\n$Mensagem\n";

require_once("phpmailer/class.phpmailer.php");

define('GUSER', '------------');	// <-- Insira aqui o seu GMail
define('GPWD', '-----------');		// <-- Insira aqui a senha do seu GMail

function smtpmailer($para, $de, $de_nome, $assunto, $corpo) { 
	global $error;
    $mail = new PHPMailer();
    $mail->charSet = "UTF-8";
	$mail->IsSMTP();		// Ativar SMTP
	$mail->SMTPDebug = 0;		// Debugar: 1 = erros e mensagens, 2 = mensagens apenas
	$mail->SMTPAuth = true;		// Autenticação ativada
	$mail->SMTPSecure = 'tls';	// SSL REQUERIDO pelo GMail
	$mail->Host = 'smtp.gmail.com';	// SMTP utilizado
	$mail->Port = 587;  		// A porta 587 deverá estar aberta em seu servidor
	$mail->Username = GUSER;
	$mail->Password = GPWD;
	$mail->SetFrom($de, $de_nome);
	$mail->Subject = $assunto;
	$mail->Body = $corpo;
	$mail->AddAddress($para);
	if(!$mail->Send()) {
		$error = 'Mail error: '.$mail->ErrorInfo; 
		return false;
	} else {
		$error = 'Mensagem enviada!';
		return true;
	}
}

// Insira abaixo o email que irá receber a mensagem, o email que irá enviar (o mesmo da variável GUSER), 
//o nome do email que envia a mensagem, o Assunto da mensagem e por último a variável com o corpo do email.

 if (smtpmailer(''.$Email.'', 'fatecararas@gmail.com', 'Direção', 'Fatec Araras', $Vai)) {

	Header("location:index.php"); // Redireciona para uma página de obrigado.

}
if (!empty($error)) echo $error;
?>