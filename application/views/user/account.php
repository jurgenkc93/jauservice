<br>
<br>
<div class="container">
    <div class="row">
        <div class="col-md-12 jumbotron">
            <h3>Bienvenido <?php echo $_SESSION['name']; ?> <?php echo $_SESSION['surname']; ?></h3>
            <br>
            <br>
            <?php if($_SESSION['rol'] == 4){
                ?>
                <a href="<?php echo base_url(); ?>index.php/user/provider" class="btn btn-info w-100">
                    <i class="fas fa-user-tag"></i> Editar mi perfil
                </a>
                <br>
                <br>
            <?php
            } 
            if($_SESSION['rol'] == 1 || $_SESSION['rol'] == 2){
                ?>
                <a href="<?php echo base_url(); ?>index.php/provider/create" class="btn btn-primary w-100">
                    <i class="fas fa-user-plus"></i> Agregar proveedor
                </a>
                <br>
                <br>
                <a href="<?php echo base_url(); ?>index.php/provider/convert" class="btn btn-success w-100">
                    <i class="fas fa-house-user"></i> Convertir usuario existente a proveedor
                </a>
                <br>
                <br>
                <a href="<?php echo base_url(); ?>index.php/provider/list" class="btn btn-secondary w-100">
                    <i class="fas fa-users"></i> Mis proveedores
                </a>
                <br>
                <br>
                <!--
                <a href="<?php echo base_url(); ?>index.php/user/personal" class="btn btn-info w-100">
                    <i class="fas fa-user-tag"></i> Cambiar información de personal
                </a>
                <br>
                -->
                <?php
            }
            ?>
            <a href="<?php echo base_url(); ?>index.php/user/dates" class="btn btn-primary w-100">
                <i class="far fa-calendar-alt"></i> Citas
            </a>
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
