<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">

<br>
<div class="container">

    <br>
    <?php if($provider){
        ?>

        <div class="row">
            <h3 class="center color-blue-text"><?php echo $provider['name']; ?> <?php echo $provider['surname']; ?></h3>
        </div>
        <br>
        <div class="row">
            <div class="col-md-6">
                <a href="<?php echo base_url();?>/users/<?php echo $provider['phone'];?>/profile/<?php echo $provider['image']; ?>">
                    <img alt="" class="center rounded" src="<?php echo base_url();?>/users/<?php echo $provider['phone'];?>/profile/<?php echo $provider['image']; ?>" height="250" width="250">
                </a>
            </div>
            <div class="col-md-6 jumbotron my-3">
                <h5 class="times-font color-blue-text">Acerda de mi:</h5>
                <p><?php echo $provider['description']; ?></p>
                <?php if($provider['category']){
                    foreach($provider['category'] AS $category){
                        if($category['status'] == 1){
                            ?>
                            <label class="<?php echo $category['image']; ?> color-blue"><?php echo $category['name']; ?> </label>
                            <?php
                        }
                    }
                }?>
            </div>
        </div>
        <br>
        <button id="<?php echo $provider['username']; ?>" class="btn btn-dark w-100 request-appointment"><i class="far fa-calendar-alt"></i>  Agendar cita</button>
        <?php if(isset($_SESSION['phone'])){
            ?>
        <?php 
            }
            ?>
        <br>
        <br>

        <h3 class="center">Experiencia:</h3>
        <br>
        <?php if($provider['category']){
            foreach($provider['category'] AS $category){
                if($category['status'] == 1){
                    ?>
                        <div class="jumbotron">
                            <div class="container">
                                <div class="row">
                                    <table>
                                        <tr>
                                            <th class="w-100 color-blue-text"><h5><?php echo $category['name']; ?></h5></th>
                                            <th class="w-100 color-blue-text"><h3 class="<?php echo $category['image']; ?>"></h3></th>
                                        </tr>
                                        <tr>
                                            <td colspan="2"><p class="text-justify"><?php echo $category['description']; ?></p></td>
                                        </tr>
                                    </table>
                                    <br>
                                </div>
                            </div>
                        </div>
                    <?
                }else{
                    ?>
                    <?php

                }
            }
        }
        ?>
        <?php if($images){
            ?>
            <div class="container center">
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
                                    <img class="d-block mx-auto w-100" style="height: 500px;" src="<?php echo base_url();?>users/<?php echo $provider['phone'];?>/jobs/<?php echo $image;?>">
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
            <?php
        }else{
            ?>
        <?php
        }
    }
    ?>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
<script src="<?php echo base_url();?>static/js/provider.js" type="text/javascript"></script>