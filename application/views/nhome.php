<section class="wrapper">
<br>
	<div class="container">
		<?php if($roles){
			?>
            <br>
			<img alt="" class="center" src="<?php echo base_url();?>static/img/logo.png" width="250" height="150">
            <br>
            <h1 class="color-blue jauservice-text" style="text-align: center;">Bienvenido a Jauservice, soluciones a tu hogar y tu vida</h1>
            <br>
            <br>
			<h5>Servicios disponibles:</h5>
			<br>
			<table class="table">
				<tbody>
					<?php
					foreach($roles as $role){
					?>
					<tr id="<?php echo $role['keycode']; ?>" onclick="findCategory(this.id)">
						<td><i class="<?php echo $role['image']; ?> fa-2x color-black" style="margin-left:50%;"></i></td>
						<td><h5 class="color-blue ml-5"><?php echo $role['name']; ?></h5></td>
					</tr>
					<?php
					}
					?>
				</tbody>
			</table>
			<?php
		}else{
			?>
			<h1>Actualmente solo disponible en la ciudad de Orizaba</h1>
		<?php
		}
		?>
	</div>
</section>
<style>
tr:hover{
	cursor: pointer;
}
</style>



<script src="<?php echo base_url();?>static/js/service.js" type="text/javascript"></script>