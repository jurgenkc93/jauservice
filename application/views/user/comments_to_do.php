<?php if($comments){
    ?>
    <div class="container">
    <br>
    <br>
    <br>
        <?php if($comments){
            ?>
            <table class="table table-borderless">
                <thead>
                    <tr>
                        <th class="background-blue all-th-curved" colspan="4">Citas pendientes de calificar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($comments AS $comment){
                        ?>
                        <tr class="">
                            <td>
                                <img alt="" class="img-circle" src="<?php echo base_url();?>users/<?php echo $comment['phone']; ?>/profile/profile-picture.jpg" height="50" width="50">
                                <br />
                                <br />
                            </td>
                            <td>
                                <a class="font-weight-bold" href="<?php echo base_url();?>index.php/service/provider/<?php echo $comment['username'];?>"><?php echo $comment['name'] ?> <?php echo $comment['surname'] ?></a>
                            </td>
                            <td>
                                <label class="font-weight-bold"><?php $appointment_date = strtotime($comment['date']); echo date('d/m/Y', $appointment_date); ?> <?php $appointment_time = strtotime($comment['time']); echo date('H:i', $appointment_time); ?></label>
                            </td>
                            <td>
                                <a type="button" class="btn btn-primary float-right" href="<?php echo base_url();?>index.php/user/comment/<?php echo $comment['username'];?>"><i class="far fa-edit"></i> Hacer comentario</a>
                            </td>
                        </tr>
                        <tr class="border-botton">
                            <td colspan="4"><label class="font-weight-bold">Motivo</label>: <?php echo $comment['description'] ?></td>
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
    <div class="container">
        <h1>No hay citas aun</h1>
    </div>
    <?php
}
?>