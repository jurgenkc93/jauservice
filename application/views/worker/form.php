<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>

<style>
.borderless-form-control{
	.border: 0;
}
</style>

<div class="container jumbotron">
    <a class="btn btn-secondary w-100" href="<?php echo base_url(); ?>index.php/user/" name="Subir" id="sign"> <i class="fas fa-arrow-circle-left"></i> Volver a opciones de cuena</a>
    <br>
    <?php echo form_open_multipart('provider/createProvider');?>
    <!--<form action="<?php echo base_url();?>index.php/worker/createProvider" class="" method="POST">-->

        <div class="form-group">
            <label for="exampleFormControlFile1">Suba una foto</label>
            <br>
            <input type="file"  id="picture" name="picture" size="20" onchange="readURL(this);" >
            <br>
            <img alt="" id="profpic"  class="center rounded" src="#">
                    
        </div>

        <div class="form-group" id="phone-div">
            <label for="exampleInputPhone1">Teléfono a 10 digitos</label>
            <input type="text" class="form-control" name="phone" id="phone" placeholder="272 123 4567" max="10" >
        </div>
        
        <div class="form-group">
            <label>Nombre de usuario*</label>
            <input type="text" name="username" id="name" class="form-control" placeholder="username..." >
        </div>

        <div class="form-group">
            <label>Nombre(s)*</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Harry James" >
        </div>
        
        <div class="form-group">
            <label>Apellido(s)*</label>
            <input type="text" name="surname" id="surname" class="form-control" placeholder="Potter" >
        </div>
        
        <div id="password-div">
            <p>Contraseña*</p>
            <div class="input-group">
                <input type="password" class="form-control " name="password" id="password" size="20" maxlength="20" placeholder="Contraseña..." >
                <input type="hidden" name="user-phone" id="user-phone" class="form-control" value="<?php echo $_SESSION['phone']; ?>" required>
                <span class="input-group-addon mx-2 my-3 far fa-eye fa-lg" id="eye-password">
                </span>
            </div>
            <br>
        </div>
        <div>
            <input class="btn btn-primary w-100 background-blue" type="submit" name="Subir" id="sign" value="Crear cuenta"/>
        </div>
        <br>
    </form>
</div>
<script>
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#profpic')
                .attr('src', e.target.result)
                .width(250)
                .height(250);
        };

        reader.readAsDataURL(input.files[0]);
    }
}
</script>