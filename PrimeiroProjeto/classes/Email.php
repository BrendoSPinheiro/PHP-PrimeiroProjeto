<?php
    class Email{
        
        private $mailer;

        public function __construct($host,$username,$password,$name){
            $this->mailer = new PHPMailer(true);

            $this->mailer->isSMTP();                           // Send using SMTP
            $this->mailer->Host       = $host;                 // Set the SMTP server to send through
            $this->mailer->SMTPAuth   = true;                  // Enable SMTP authentication
            $this->mailer->Username   = $username;             // SMTP username
            $this->mailer->Password   = $password;             // SMTP password
            $this->mailer->SMTPSecure = 'tls';                 // Enable TLS encryption;
            $this->mailer->Port       = 587;                   // TCP port to connect to
            $this->mailer->setFrom($username,$name);
            $this->mailer->isHTML(true);                       // Set email format to HTML   
            $this->mailer->CharSet    = 'UTF-8';
        }
        public function addAdress($email,$name){
            $this->mailer->addAddress($email, $name);
        }

        public function formatMail($content){
            $this->mailer->Subject = $content['assunto'];
            $this->mailer->Body    = $content['corpo'];
            $this->mailer->AltBody = strip_tags($content['corpo']); //retira todas as tags html
        }

        public function sendMailer(){
            try {
                $this->mailer->send();
                echo '<script>alert("A mensagem foi enviada com sucesso!")</script>';
            } catch (Exception $e) {
                echo '<script>alert("Ocorreu um erro no envio da mensagem.")</script>';
            }
        }
    }
?>