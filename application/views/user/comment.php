<br />
<div class="container">
    <div class="jumbotron">
        <div class="row">
            <img alt="" class="rounded mx-auto" src="<?php echo base_url(); ?>users/<?php echo $provider_phone; ?>/profile/profile-picture.jpg" height="75" width="75">
            <br>
        </div>
        <br />
        <form action="<?php echo base_url(); ?>index.php/user/makeProviderComment" method="post">
            <p class="mx-auto"><?php echo $provider_name; ?> <?php echo $provider_surname; ?></p>
            <i class="">Comentario:</i>
            <input class="form-control" type="text" name="comment" value="<?php if(isset($provider_comment)){ echo $provider_comment; }?>" required>
            <input type="hidden" name="userphone" value="<?php echo $_SESSION['phone']; ?>" >
            <input type="hidden" name="provider_phone" value="<?php echo $provider_phone; ?>" >
            <br/>
            <p class="">Calificacón: <label id="start-text">4</label> de <label>5</label></p>
            <?php if(isset($provider_rank)){
                $rank = explode('. ', $provider_rank);
                for($i = 0; $i < $rank[0]; $i++){
                    ?>
                    <i class="star fas fa-star fa-2x color-blue" id="star-<?php echo $i; ?>"></i>
                <?php
                }
            }else{
                for($i = 0; $i < 4; $i++){
                ?>
                    <i class="star fas fa-star fa-2x mx-2 color-blue" id="star-<?php echo $i; ?>"></i>
                <?php
                }?>
                    <i class="star far fa-star fa-2x mx-2 color-blue" id="star-4"></i>
                <?php
            }?>
            <br>
            <input class="form-control" id="ranking" name="ranking" type="hidden" value="<?php if(isset($provider_rank)){ echo $provider_rank; }else{ echo "4";};?>" required>
            <br/>
            <button class="btn btn-primary w-100"><i class="far fa-edit"></i> Comentar</button>
            <br/>
            <br/>
        </form>
            <a href="<?php echo base_url(); ?>index.php/user"><button class="btn btn-secondary w-100"><i class="fas fa-undo"></i> Volver</button></a>
    </div>
</div>

<script src="<?php echo base_url();?>static/js/user/comment.js" type="text/javascript"></script>