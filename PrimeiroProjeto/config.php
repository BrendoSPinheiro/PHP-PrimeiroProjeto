<?php

    $autoload = function($class){
        if($class == 'Email'){
            require_once('classes/phpmailer/PHPMailerAutoload.php');
        }
        include('classes/'.$class.'.php');
    };

    spl_autoload_register($autoload);

    define('INCLUDE_PATH','http://localhost/PHP-PrimeiroProjeto/PrimeiroProjeto/');
    define('HOST','smtp.gmail.com');
    define('EMAIL_REMETENTE','brendo.spinheiro@gmail.com');
    define('REMETENTE','Brendo');
?>