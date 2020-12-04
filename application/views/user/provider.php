<link rel="stylesheet" href="<?php echo base_url();?>static/assets/chosen/chosen.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">



<section class="wrapper">
<br>
    <div class="container">
    
        <br>
        <?php if($provider){
            ?>

            <div class="row">
                <h3 class="center"><?php echo $provider['name']; ?> <?php echo $provider['surname']; ?></h3>
            </div>

            <br>
            
            <div class="row">
                <div class="col-md-6">
                    <img alt="" class="center rounded" src="<?php echo base_url();?>static/img/users/<?php echo $provider['phone']; ?>.jpg" height="250" width="250">
                </div>
                <div class="col-md-6 jumbotron my-3">
                    <h5 class="times-font">Acerda de mi:</h5>
                    <textarea class="form-control" type="text" id="description"><?php echo $provider['description']; ?></textarea>
                    <p id="count-description"></p>
                    <button class="btn btn-primary w-100" id="about"><i class="fas fa-plus-circle"></i> Cambiar</button>
                </div>
            </div>

            <a href="<?php echo base_url();?>index.php/service/provider/<?php echo $provider['username']; ?>" id="request-appointment" class="btn btn-dark w-100"><i class="far fa-calendar-alt"></i>  Ver mi perfil</a>
            
            <br>
            <!--
            <div class="jumbotron">
                <h3><i class="fas fa-plus"></i>   Agregar nueva categoría</h3>
                <hr>
                <br>
                <h4>Seleccione una categoría/experiencia</h4>
                <div class="row">
                    <select id="select-category" class="chosen w-100">
                        <?php if (isset($categories)){
                            foreach ($categories as $category) {?>
                            <option value="<?php echo($category['id']); ?>" class="<?php echo($category['image']); ?> fa-2x"> 
                                <label class="fa-2x"><?php echo($category['name']); ?></label>
                            </option>
                        <?php
                            }
                        }
                        ?>
                    </select>
                    <textarea rows="5" class="form-control w-100 new-category-descripton" id="new-category-descripton" type="text"><?php echo $category['description']; ?></textarea>
                    <p id="count-new-category-descripton"></p>
                    <button class="btn btn-primary w-100 mt-3" id="add-category"><i class="fas fa-plus-circle"></i> Agregar</button>
                </div>
            </div>
            -->
            
            
            <br>
            <br>
            <br>
            <h3 class="mx-5 my-3">Categorías/Experiencia:</h3>
            <?php if($provider['category']){
                foreach($provider['category'] AS $category){
                    ?>
                    <div class="jumbotron">
                        <div class="row" id="<?php echo $category['id']; ?>">
                            <div class="col-md-6">
                                <h5><?php echo $category['name']; ?></h5>
                            </div>
                            <div class="col-md-6">
                                <h3 class="<?php echo $category['image']; ?>"></h3>
                            </div>
                            <?php if($category['status'] == 0){
                                ?>
                                <h5 class="text-muted">Esta categoría se encuentra desactivada</h5>
                                <textarea rows="5" class="form-control w-100 category-descripton" id="category-descripton-<?php echo $category['id'];?>" type="text"><?php echo $category['description']; ?></textarea>
                                <p id="count-category-descripton-<?php echo $category['id'];?>"></p>
                                <button class="btn btn-primary w-100 edit-category-descripton" id="<?php echo $category['id']; ?>"><i class="far fa-edit"></i> Editar</button>
                                <button class="btn btn-secondary w-100 activate-category" id="<?php echo $category['id']; ?>"><i class="fas fa-power-off"></i> Activar categoría</button>
                            <?php }elseif($category['status'] == 1){
                                ?>
                                <h5 class="color-blue">Activa</h5>
                                <textarea rows="5" class="form-control w-100 category-descripton" id="category-descripton-<?php echo $category['id'];?>" type="text"><?php echo $category['description']; ?></textarea>
                                <p id="count-category-descripton-<?php echo $category['id'];?>"></p>
                                <br>
                                <button class="btn btn-primary w-100 edit-category-descripton" id="<?php echo $category['id']; ?>"><i class="far fa-edit"></i> Editar</button>
                                <button class="btn btn-danger w-100 deactivate-category" id="<?php echo $category['id']; ?>"><i class="fas fa-minus-circle"></i> Dar de baja esta categoría (Ocultar)</button>
                                <?php
                            }elseif($category['status'] == 2){
                                ?>
                                <p class="text-justify"><?php echo $category['description']; ?></p>
                                <h5 class="text-muted center">Esta categoría se encuentra en revision</h5>
                                <!--
                                <button class="btn btn-secondary w-100 activate-category" id="<?php echo $category['id']; ?>"><i class="fas fa-power-off"></i> Activar categoría</button>
                                <button class="btn btn-danger w-100 deactivate-category" id="<?php echo $category['id']; ?>"><i class="fas fa-minus-circle"></i> Dar de baja esta categoría (Ocultar)</button>
                                -->
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                    <?php
                }
                ?>
                <?php
            }
            ?>
            <?php if($provider){
                ?>
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="..." alt="First slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="..." alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="..." alt="Third slide">
                        </div>  
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
                <?php
            }else{
                ?>
                <h1>Parece que algo ha salido mal, por favor vuelva a <a href="<?php echo base_url();?>index.php/service/all">buscar una categoría</a></h1>
            <?php
            }
        }
        ?>
    </div>
</section>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
<script src="<?php echo base_url();?>static/assets/chosen/chosen.jquery.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>static/js/user/provider.js" type="text/javascript"></script>