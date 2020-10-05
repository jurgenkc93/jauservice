<link rel="stylesheet" href="<?php echo base_url();?>static/css/switch.css">
<script src="<?php echo base_url();?>static/js/account.js" type="text/javascript"></script>

<br>
<br>


<div class="container">
    <div class="row">
        <div class="col-md-12 jumbotron">
            <h3>Bienvenido <?php echo $_SESSION['name']; ?></h3>
            <br>
            <br>
            <?php if($_SESSION['rol'] == 4){
                ?>
                <a href="<?php echo base_url(); ?>index.php/user/provider" class="btn btn-info w-100">
                    <i class="fas fa-user-tag"></i> Editar mi perfil
                </a>
                <br>
                <br>
                <a href="<?php echo base_url(); ?>index.php/restaurants/categories" class="btn btn-dark w-100">
                    <i class="fas fa-boxes"></i> Categorias
                </a>
                <br>
                <br>
            <?php
            } 
            if($_SESSION['rol'] == 3){
                ?>
                <a href="<?php echo base_url(); ?>index.php/user/dates" class="btn btn-primary w-100">
                    <i class="far fa-calendar-alt"></i> Citas
                </a>
                <br>
                <br>
                <a href="<?php echo base_url(); ?>index.php/user/personal" class="btn btn-info w-100">
                    <i class="fas fa-user-tag"></i> Cambiar información de personal
                </a>
                <br>
                <br>
                <?php
            }
            ?>
            <a href="<?php echo base_url(); ?>index.php/user/dates" class="btn btn-primary w-100">
                <i class="far fa-calendar-alt"></i> Citas
            </a>
            <br>
            <br>
            <br>
            <br>
            <!--
            <a href="<?php echo base_url(); ?>index.php/" class="btn btn-danger w-100">
                <i class="fas fa-key"></i> Cambiar contraseña
            </a>
            -->
            <br>
        </div>
    </div>
</div>

<br>
<br>
<br>
<br>
