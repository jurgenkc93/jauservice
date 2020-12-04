<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>

<div class="container">
    <h3>Proveedores</h3>
    <br>
    <a href="<?php echo base_url();?>index.php/worker/create" class="btn"><h4 class="fas fa-plus-circle"> Agregar nuevo usuario</h4></a>
    <hr>

    <table class="table" id="table">
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
        </tbody>

    </table>

</div>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css"/>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
<script src="<?php echo base_url();?>static/js/worker/providers.js" type="text/javascript"></script>
