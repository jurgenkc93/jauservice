<?php if($dates_as_user){
    ?>
    <div class="container">
    <br>
    <br>
    <br>
        

        <?php if($dates_as_user){
            ?>
            <table class="table table-borderless">
                <thead>
                        <tr>
                            <th class="background-blue all-th-curved" colspan="2">Citas proximas</th>
                        </tr>
                </thead>
                <tbody>
                    <?php foreach($dates_as_user AS $date){
                        ?>
                        <tr class="">
                            <td>
                                <label class="font-weight-bold"><?php $appointment_date = strtotime($date['date']); echo date('d/m/Y', $appointment_date); ?> <?php $appointment_time = strtotime($date['time']); echo date('H:i', $appointment_time); ?></label>
                                <br />
                                <a class="font-weight-bold" href="<?php echo base_url();?>index.php/service/provider/<?php echo $date['username'];?>"><?php echo $date['name'] ?> <?php echo $date['surname'] ?></a>
                            </td>
                            <td>
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
        }
        ?>
    </div>
    <?php 
}else{
    ?>
    <h1>No hay citas aun</h1>
    <?php
}
?>