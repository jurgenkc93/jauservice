
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE"/>

        <meta name="HandheldFriendly" content="True" />
        <!--
        <meta name="MobileOptimized" content="1024" />
        <meta name="viewport" content="width=1024" />
        <meta name="viewport" content="width=375">
        -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta id="meta-keywords" name="keywords" content=""/>
        <meta id="meta-description" name="description" content=""/>


        <link rel="icon" href="<?php echo base_url();?>static/img/favicon.ico" type="img/x-icon"/>    
        <title>JauService</title>
    </head>
	<!--
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    -->
        <link rel="stylesheet" href="<?php echo base_url();?>static/assets/bootstrap/css/bootstrap.css">
    
    <link rel="stylesheet" href="<?php echo base_url();?>static/css/master/master.css">
    
    <script src="<?php echo base_url();?>static/assets/js/jquery-3-4.js" type="text/javascript"></script>
    
<body>
    
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="<?php echo base_url();?>index.php/service/all">
            <img alt="" src="<?php echo base_url();?>static/img/logo.png" width="125" height="75">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link py-3 button" href="<?php echo base_url();?>index.php">Inicio</a>
            </li>
            <li class="nav-item">
                <a class="nav-link py-3 button" href="<?php echo base_url();?>index.php/welcome/contact">Contáctanos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link py-3 button" href="<?php echo base_url();?>index.php/welcome/who">¿Quienes somos?</a>
            </li>
            
            <?php if(isset($_SESSION['phone'])){
                ?>
                <li class="nav-item">
                    <a class="nav-link py-3" href="<?php echo base_url();?>index.php/user/dates">Mis Citas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link py-3" href="<?php echo base_url();?>index.php/user">Cuenta</a>
                </li>
                <?php if($_SESSION['rol'] == 2){
                    ?>
                    <li class="nav-item">
                        <a class="nav-link py-3" href="<?php echo base_url();?>index.php/worker">Proveedores</a>
                    </li>
                <?php }
                ?>
            <?php 
                }
                ?>
        </ul>

        <?php if(isset($_SESSION['phone'])){ ?>
            <input type="hidden" id="phone" value="<?php echo $_SESSION['phone'];?>"/>
            <a class="btn btn-light py-3" style="color:grey;" href="<?php echo base_url();?>index.php/welcome/logout">Cerrar Sesión</a>
            <!--
            <div class="nav-item dropdown px-5">
                <a class="nav-link dropdown-toggle far fa-user fa-lg" href="#" id="navbarDropdown" style="color: grey;" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Cuenta</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo base_url();?>index.php/welcome/logout">Cerrar Sesión</a>
                </div>
            </div>
            -->
            <?php } else {
                ?>
            <a class="nav-item nav-link py-3" style="color:grey;" href="<?php echo base_url();?>index.php/welcome/user"> Iniciar Sesión</a>
            <?php }
        ?>

    </nav>

