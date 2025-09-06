<?php

/**
 * Clase para el manejo del correo electrónico.
 * @version 1.0.2
 * @author  Fernando Merlo <ctrbts.dev@gmail.com>
 */

use PHPMailer\PHPMailer\PHPMailer;

class Mailer
{
    protected $smtp_username = SMTP_USERNAME;
    protected $smtp_password = SMTP_PASSWORD;
    protected $smtp_host     = SMTP_HOST;
    protected $smtp_port     = SMTP_PORT;
    protected $smtp_secure   = PHPMailer::ENCRYPTION_SMTPS;
    protected $sender_email  = DEFAULT_EMAIL;
    protected $sender_name   = DEFAULT_EMAIL_ACCOUNT_NAME;

    public function __construct()
    {
        if (empty($this->smtp_port)) {
            $this->smtp_port = 465;  // 465 para SSL, 587 para TLS
        }
    }

    /**
     * Método para enviar correo electrónico.
     * Puede enviar a varios destinatarios desde "$receipient_emails".
     *
     * @param string $receipient_emails, $subject, $msg, $attachment
     */
    public function send_mail($receipient_emails, $subject, $msg, $attachment = null)
    {
        //Creamos una instancia; pasamos `true` para manejo de exceptions
        $mail = new PHPMailer(true);

        if (USE_SMTP == true) {
            $mail->isSMTP(); // Configura el servidor de correo SMTP
            $mail->SMTPDebug  = 0;                     // Deshabilitamos el debug
            $mail->Host       = $this->smtp_host;      // Establece el servidor SMTP principal
            $mail->SMTPAuth   = true;                  // Habilita autenticación SMTP
            $mail->Username   = $this->smtp_username;  // Ususario de correo
            $mail->Password   = $this->smtp_password;  // Contraseña de correo
            $mail->SMTPSecure = $this->smtp_secure;    // Habilitar encriptación tls o ssl
            $mail->Port       = $this->smtp_port;      // Puerto TCP para conectarse
            $mail->CharSet    = 'UTF-8';               // Codificación de caracteres
         }

        // Agregamos al despachante
        $mail->From     = $this->sender_email;
        $mail->FromName = $this->sender_name;

        // Agregar destinatarios
        if (is_array($receipient_emails)) {
            foreach ($receipient_emails as $email) {
                $mail->addAddress($email);
            }
        } else {
            $mail->addAddress($receipient_emails);
        }

        // Agregamos adjuntos
        if ($attachment != null) {
            $mail->addAttachment($attachment); // ('/tmp/image.jpg', 'new.jpg');
        }

        // Establece el formato del correo a HTML
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = $msg;
        $mail->AltBody = strip_tags($msg);

        if ($mail->send()) {
            return true;
        } else {
            return $mail->ErrorInfo;
        }
    }
}
