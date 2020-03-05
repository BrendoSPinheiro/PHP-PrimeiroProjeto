<?php include('config.php'); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link href="<?php echo INCLUDE_PATH; ?>style/fontawesome.min.css" rel="stylesheet">
        <link href="<?php echo INCLUDE_PATH; ?>style/all.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700&display=swap" rel="stylesheet">
        <link href="<?php echo INCLUDE_PATH; ?>style/style.css" rel="stylesheet">
        <meta name="description" content="Descrição do meu web site" />
        <meta name="keywords" content="palavras-chave,do,meu,site" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="<?php echo INCLUDE_PATH; ?>favicon.ico" type="image/x-icon">
        <title>Primeiro Projeto</title>
    </head>
    <body>
        <?php
            if(isset($_POST['cadastrar'])){
                if($_POST['email'] != ''){
                    $email = $_POST['email'];
                    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                        $mail = new Email('smtp.gmail.com','','','');
                        $mail->addAdress($email,'');
                        $content = array('assunto'=>'Um novo email cadastrado','corpo'=>'Teste do disparo de email automático com PHPMailer');
                        $mail->formatMail($content);
                        $mail->sendMailer();
                    }else{
                        echo '<script>alert("Não é um email válido!")</script>';
                    }
                }else{
                    echo '<script>alert("Insira um email!")</script>';
                }
            }
        ?>

        <base base="<?php echo INCLUDE_PATH; ?>" />

        <?php
            $url = isset($_GET['url']) ? $_GET['url'] : 'home';

            switch ($url) {
                case 'sobre':
                    echo '<target target="sobre" />';
                    break;

                case 'servicos':
                    echo '<target target="servicos" />';
                    break;
            }
        ?>

        <?php //new Email(); ?>

        <header>
            <div class="center">
                <div class="logo left"><a href="/">Logomarca</a></div><!--logo-->
                <nav class="desktop right">
                    <ul>
                        <li><a href="<?php echo INCLUDE_PATH; ?>">Home</a></li>
                        <li><a href="<?php echo INCLUDE_PATH; ?>sobre">Sobre</a></li>
                        <li><a href="<?php echo INCLUDE_PATH; ?>servicos">Serviços</a></li>
                        <li><a realtime="contato" href="<?php echo INCLUDE_PATH; ?>contato">Contato</a></li>
                    </ul>
                </nav>
                <nav class="mobile right">
                    <div class="botao-menu-mobile">
                        <i class="fas fa-bars"></i>
                    </div><!--botao-menu-mobile-->
                    <ul>
                        <li><a href="<?php echo INCLUDE_PATH; ?>">Home</a></li>
                        <li><a href="<?php echo INCLUDE_PATH; ?>sobre">Sobre</a></li>
                        <li><a href="<?php echo INCLUDE_PATH; ?>servicos">Serviços</a></li>
                        <li><a realtime="contato" href="<?php echo INCLUDE_PATH; ?>contato">Contato</a></li>
                    </ul>
                </nav>
                <div class="clear"></div><!--clear-->
            </div><!--center-->
        </header>
        <div class="container-principal">
            <?php
                //Validação de páginas
                
                if(file_exists('pages/'.$url.'.php')){
                    include('pages/'.$url.'.php');
                }else{
                    //página n existe, da para fazer o que quiser
                    if($url != 'sobre' && $url != 'servicos'){
                        $page404 = true;
                        include('pages/404.php');
                    }else{
                        include('pages/home.php');
                    }
                    
                }
            ?>
        </div><!--container-principal-->

        <footer <?php if(isset($page404) && $page404 == true){echo 'class="fixed"';} ?>>
            <div class="center">
                <p>Brendo S. Pinheiro - Todos os direitos reservados</p>
            </div><!--center-->
        </footer>
        <script src="<?php echo INCLUDE_PATH; ?>js/jquery.min.js"></script><!--Jquery-->
        <script src='https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyDHPNQxozOzQSZ-djvWGOBUsHkBUoT_qH4'></script>
        <script src="<?php echo INCLUDE_PATH; ?>js/scripts.js"></script><!--scriptJs-->
        <script src="<?php echo INCLUDE_PATH; ?>js/constants.js"></script><!--constantsJs-->
        
        <?php
            if($url != 'contato'){
        ?>
        <script src="<?php echo INCLUDE_PATH; ?>js/slider.js"></script><!--slideScript-->
        <script src="<?php echo INCLUDE_PATH; ?>js/animationSkills.js"></script><!--animationSkills-->
        <?php } ?>
        
    </body>
</html>