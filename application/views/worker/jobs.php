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
    <?php echo form_open_multipart('provider/uploadProviderJob');?>
        <div class="form-group">
            <br>
            <label for="exampleFormControlFile1">Suba una foto de trabajos realizados</label>
            <br>
            <input type="file"  id="picture" name="picture" size="20" onchange="readURL(this);" >
            <input type="hidden" name="phone" value="<?php echo $phone; ?>" >
            <br>
            <img alt="" id="profpic" src="" height="350" width="350" class="center rounded">
                    
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

<div class="container">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <?php for($i = 0; $i < count($images); $i++){
                ?>
                <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $i; ?>" class="<?php if($i == 0 ){ echo "actice"; } ?>"></li>
                <?php
            }
            ?>
        </ol>
        <div class="carousel-inner">
            <?php $i = 0; 
                foreach($images AS $image){
                ?>
                    <div class="carousel-item <?php if($i == 0){echo "active";} ?>">
                        <img class="d-block w-100" src="<?php echo base_url();?>users/<?php echo $phone;?>/jobs/<?php echo $image;?>">
                    </div>
                <?php
                $i++;
            } 
            ?>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
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