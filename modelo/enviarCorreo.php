<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PhpMailer/Exception.php';
require 'PhpMailer/PHPMailer.php';
require 'PhpMailer/SMTP.php';

class enviarCorreo{

    private $retorno;
    private $mail;

    public function __construct(){
        
        $this->retorno = new stdClass();
        $this->mail = new PHPMailer(true);
    }

    public function enviarCorreo(stdClass $correo){

        try {
            //Server settings
            $this->mail->SMTPDebug = 0;                      // Enable verbose debug output
            $this->mail->isSMTP();                                            // Send using SMTP
            $this->mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
            $this->mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $this->mail->Username   = '';                     // SMTP username
            $this->mail->Password   = '';                               // SMTP password
            $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $this->mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
        
            //Recipients
            $this->mail->setFrom($correo->remitente);
            $this->mail->addAddress($correo->destinatario, utf8_decode($correo->nombreDestinatario));     // Add a recipient
        
            // Content
            $this->mail->isHTML(true);                                  // Set email format to HTML
            $this->mail->Subject = utf8_decode($correo->asunto);
            $this->mail->Body    = utf8_decode($correo->mensaje);
        
            $this->mail->send();

            $this->retorno->estado = true;
            $this->retorno->mensaje = 'Correo enviado con exito';
            $this->retorno->datos = null;
        

        } catch (Exception $e) {
            
            $this->retorno->estado = false;
            $this->retorno->mensaje = "Message could not be sent. Mailer Error: {$this->mail->ErrorInfo}";
            $this->retorno->datos = null;
            
        }

        return $this->retorno;

    }
}


