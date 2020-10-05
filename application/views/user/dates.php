<?php if($dates_as_user && $pending_dates_as_user){
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
                            <th class="bg-info all-th-curved" colspan="2">Citas Pendientes</th>
                        </tr>
                </thead>
                <tbody>
                    <?php foreach($pending_dates_as_user AS $date){
                        ?>
                        <tr class="">
                            <td><?php echo $date['id_user'] ?></td>
                            <td><?php echo $date['date'] ?></td>
                        </tr>
                        <tr class="border-botton">
                            <td colspan="2"><?php echo $date['description'] ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        <?php
        }
        ?>
        <br>
        <br>

        <?php if($dates_as_user){
            ?>
            <table class="table table-borderless">
                <thead>
                        <tr>
                            <th class="bg-success all-th-curved" colspan="2">Citas proximas</th>
                        </tr>
                </thead>
                <tbody>
                    <?php foreach($dates_as_user AS $date){
                        ?>
                        <tr class="">
                            <td><?php echo $date['id_user'] ?></td>
                            <td><?php echo $date['date'] ?></td>
                        </tr>
                        <tr class="border-botton">
                            <td colspan="2"><?php echo $date['description'] ?></td>
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