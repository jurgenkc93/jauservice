<br />
<div class="container">
    <div class="jumbotron">
            <div class="row">
                <div class="col-md-6">
                    <label class="font-weight-bold">Proveedor:</label> <label><?php echo $date['provider_name'] ?> <?php echo $date['provider_surname']; ?></label>
                </div>
                <div class="col-md-6">
                    <label class="font-weight-bold">Usuario:</label> <label><?php echo $date['user_name']; ?> <?php echo $date['user_surname']; ?></label>
                </div>
            </div>
            <br />
            <form action="<?php echo base_url(); ?>index.php/user/date2app/<?php echo $date['id'];?>" method="post">
                <div class="row">
                    <div class="col-md-6">
                        <i class="">Horario 24 horas</i>
                        <input class="form-control" type="time" name="time" value="<?php if($date['time'] != null || isset($date['time'])){ echo $date['time']; }?>" required><input type="hidden" name="phone" value="<?php echo $_SESSION['phone']; ?>" >
                    </div>
                    <div class="col-md-6">
                        <i class="">Fecha</i>
                        <input class="form-control" min="<?php echo date('Y-m-d', time());?>" name="date" type="date" value="<?php if($date['date'] != null || isset($date['date'])){ echo $date['date']; }?>" required>
                    </div>
                </div>
                <br />
                <button class="btn btn-success w-100"><i class="far fa-edit"></i> Agendar</button>
                <br />
                <br />
                <a href="<?php echo base_url(); ?>index.php/user/dates"><button class="btn btn-secondary w-100"><i class="fas fa-undo"></i> Volver</button></a>
            </form>
    </div>
</div>
