<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>

<div class="container">
    <h3>Proveedores</h3>
    <br>
    <a href="<?php echo base_url();?>index.php/user" class="btn"><h4 class="fas fa-undo"> Volver</h4></a>
    <a href="<?php echo base_url();?>index.php/provider/create" class="btn"><h4 class="fas fa-plus-circle"> Agregar nuevo usuario</h4></a>

    <table class="table table-striped" id="table">
        <thead>
            <tr class="" id="">
                <th>Teléfono</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Status</th>
                <th>Fecha de ingreso</th>
                <th>Fecha de cobro</th>
                <th>Acciones</th>
            </tr>
        <thead>
        <tbody class="hideTr" id="table-body">
            <?php if(isset($providers)){
                foreach($providers AS $provider){
                    ?>
                    <tr>
                        <td><?php echo $provider['phone']; ?></td>
                        <td><?php echo $provider['name']; ?></td>
                        <td><?php echo $provider['surname']; ?></td>
                        <td><?php echo $provider['status']; ?></td>
                        <td><?php echo $provider['date_started']; ?></td>
                        <td><?php echo $provider['next_renew']; ?></td>
                        <td> <a href="<?php echo base_url(); ?>index.php/provider/provider/<?php echo $provider['phone'] ?>" class="text-black"> <i class="far fa-address-card mx-3 hover-pointer" title="Editar" id="' + row.phone + '"></i> </a> </td>
                    </tr>
                    <?php
                }
            }else{
                ?>
                <tr>
                    <td colspan="7"> <h5 class="text-center">Aun no hay datos que mostrar</h5> </td>
                </tr>
                <?php
            }
            ?>
        </tbody>

    </table>

</div>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css"/>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
<script src="<?php echo base_url();?>static/js/worker/providers.js" type="text/javascript"></script>
