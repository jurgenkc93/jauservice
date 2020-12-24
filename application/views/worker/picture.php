<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>

<style>
.borderless-form-control{
	.border: 0;
}
</style>
<br>
<br>
<div class="container card">
    <?php echo form_open_multipart('provider/uploadProviderPicture');?>
        <div class="form-group">
            <br>
            <label for="exampleFormControlFile1">Suba una foto</label>
            <br>
            <input type="file"  id="picture" name="picture" size="20" onchange="readURL(this);" >
            <input type="hidden" name="phone" value="<?php echo $phone; ?>" >
            <br>
            <img alt="" id="profpic" src="<?php echo base_url();?>/users/<?php echo $phone; ?>/profile/profile-picture.jpg" height="350" width="350" class="center rounded">
                    
        </div>
        
        <div>
            <input class="btn btn-primary w-100" type="submit" name="Subir" id="sign" value="Subir foto"/>
            <br>
            <br>
            <a class="btn btn-secondary w-100" href="<?php echo base_url(); ?>index.php/provider/provider/<?php echo $phone; ?>" name="Subir" id="sign"> <i class="fas fa-arrow-circle-left"></i> Volver al perfil</a>
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