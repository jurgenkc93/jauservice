<br>
<div class="container">
    <a href="#" class="btn btn-primary w-100"><i class="fas fa-plus-circle"></i> Agregar una cita</a>
</div>
<br>
<?php if($pending_dates_as_provider || $dates){
    ?>
    <div class="container">

        <?php if($pending_dates_as_provider){
            ?>
            <br>
            <br>
            <table class="table table-borderless">
                <thead>
                        <tr>
                        <th class="bg-warning all-th-curved" colspan="2"><h5 class="font-weight-bold">Citas pendientes de confirmación</h5></th>
                        </tr>
                </thead>
                <tbody>
                    <?php foreach($pending_dates_as_provider AS $date){
                        ?>
                        <tr>
                            <td><label class="font-weight-bold"><?php echo $date['name'] ?> <?php echo $date['surname'] ?></label></td>
                            <td>
                                <a href="<?php echo base_url();?>index.php/user/date/<?php echo $date['id'];?>" class="btn btn-secondary float-right"><i class="far fa-edit"></i> Agendar</a>
                                <button type="button" class="btn btn-danger float-right"><i class="far fa-times-circle"></i> Cancelar</button>
                            </td>
                        </tr>
                        <tr class="border-botton">
                            <td colspan="2"><label class="font-weight-bold">Motivo</label>: <?php echo $date['description'] ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        <?php
        } ?>

        <?php if($dates){
            ?>
            <br>
            <br>
            <div class="all-th-curved ">

                <div class="background-blue all-th-curved py-1">
                    <h3 class="mx-3 font-weight-bold">Citas proximas</h3>
                </div>

                <?php foreach($dates AS $day){
                    ?>
                    <table class="table table-borderless my-0 py-1">
                        <thead clss="">
                            <tr class="bg-success hover-pointer">
                                <th><h5 class="font-weight-bold center"><?php echo $day['date']; ?></h5></th>
                                <th><h5 class="font-weight-bold float-right"><i class="fas fa-chevron-circle-down color-white"></i></h5></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($day['dates'] AS $date){
                                ?>
                                <tr class="bg-info">
                                    <td colspan="2" class="bg-info color-white text-center font-weight-bold" style="height: 0; margin:0; padding:0;"><?php echo $date['time']; ?></td>
                                </tr>
                                <?php if(isset($date['user_surname'])){
                                    ?>
                                    <tr>
                                        <td>
                                            <label class="font-weight-bold"><?php echo $date['user_name']; ?> <?php echo $date['user_surname']; ?></label>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-danger float-right"><i class="far fa-times-circle"></i> Cancelar</button>
                                        </td>
                                    </tr>
                                    <?php
                                }elseif(isset($date['username'])){
                                    ?>
                                    <tr>
                                        <td>
                                            <a href="<?php echo base_url(); ?>index.php/service/provider/<?php echo $date['username']; ?>" class="font-weight-bold"><?php echo $date['provider_name']; ?> <?php echo $date['provider_surname']; ?></a>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-danger float-right"><i class="far fa-times-circle"></i> Cancelar</button>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>
                                <tr class="border-botton">
                                    <td colspan="2"><label class="font-weight-bold">Motivo</label>: <?php echo $date['description'] ?></td>
                                </tr>
                                <?php
                            } ?>
                        </tbody>
                    </table>
                    <div class="border-table-dates-botton">
                    </div>
                <?php 
                } ?>
            </div>
            <?php
        } ?>
    </div>

    <?php 
}else{
    ?>
    <div class="container">
        <h1>No hay citas aun</h1>
    </div>
    <?php
} ?>

<script src="<?php echo base_url();?>static/js/user/dates.js" type="text/javascript"></script>
