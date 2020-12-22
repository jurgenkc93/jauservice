<style>
  
  .container-user{
    border: 3px;
    border-radius: 20px;
    background-color: rgba(102, 153, 255, 0.6);
    border-color: rgba(102, 153, 255, 1);
  }
  .container{
      text-align:center;
  }
  
</style>

<div class="container">

    <img alt="" class="center rounded" src="<?php echo base_url();?>static/img/logo.png" width="250" height="150">
    <img alt="" class="center rounded w-100" src="<?php echo base_url();?>static/img/home/pleca.png" height="100">
    <?php if($category){
        ?>
        <i class="<?php echo $category['image']; ?> fa-2x"></i>
        <h1 class=""><?php echo $category['name']; ?></h1>
        <br>
        <div class="row">
        <?php if($providers){
            ?>
            <?php foreach($providers as $provider){
            ?>
                <div class="col-md-6 hover-pointer center row" id="<?php echo $provider['username']; ?>" onclick="findProvider(this.id)">
                    <table class="table table-borderless jumbotron">
                        <tbody>
                            <tr>
                                <td rowspan="2"><img alt="" class="center rounded" src="<?php echo base_url();?>users/<?php echo $provider['phone']; ?>/profile/profile-picture.jpg" height="200"></th>
                                <td><h5 class=""><?php echo $provider['name']; ?> <?php echo $provider['surname']; ?></h5></td>
                                <td><i class="fas fa-star" style="color: yellow;"></i><i class="fas fa-star" style="color: yellow;"></i><i class="fas fa-star" style="color: yellow;"></i><i class="fas fa-star " style="color: yellow;"></i><i class="far fa-star " style="color: yellow;"></i></td>
                            </tr>
                            <tr>
                                <td colspan="2"><p class="times-font"><?php echo $provider['description']; ?></p></td>
                            </tr>
                        </tbody>
                    </table>
                </div>


            <?php
            }
            ?>
        <?php
        }
        ?>
        </div>
    <?php
    }else{
        ?>
        <h1>Parece que algo ha salido mal, por favor vuelva a <a href="<?php echo base_url();?>index.php/service/all">buscar una categoría</a></h1>
    <?php
    }
    ?>
</div>


<script src="<?php echo base_url();?>static/js/service.js" type="text/javascript"></script>