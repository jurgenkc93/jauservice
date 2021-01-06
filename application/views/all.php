<br>
<div class="container-fluid">
	<div class="row">
		<div class="center">
			<img alt="" class="center" src="<?php echo base_url();?>static/img/JauService.png" style="max-width:80%; min-width:50%;" height="70">
			<br>
			<h1 class="jauservice-text" style="text-align: center;">Soluciones para tu hogar y tu vida</h1>
			<br>
			<?php if($roles){
				?>
				<!--
				<h1 class="color-blue jauservice-text mx-5" style="">Bienvenido</h1>
				<img alt="" class="center" src="<?php echo base_url();?>static/img/logo.png" width="250" height="150">
				<br>
				<h1 class="color-blue jauservice-text" style="text-align: center;">Soluciones a tu hogar y tu vida, en la ciudad de Orizaba</h1>
				<br>
				-->
				<h4 class="mx-3">¿Que tipo de personal busca?</h4>
				<br>
				<table class="table">
					<tbody>
						<?php
						foreach($roles as $role){
						?>
						<tr id="<?php echo $role['keycode']; ?>" class="role button py-4 hover-pointer">
							<td><i class="<?php echo $role['image']; ?> fa-2x color-black" style="margin-left:50%;"></i></td>
							<td><h4 class="color-blue ml-5"><?php echo $role['name']; ?></h4></td>
						</tr>
						<?php
						}
						?>
					</tbody>
				</table>

				<?php
			}else{
				?>
				<h1>Algo salió mal, por favor vuelva a cargar la página</h1>
			<?php
			}
			?>
		</div>
	</div>
</div>


<script src="<?php echo base_url();?>static/js/index.js" type="text/javascript"></script>
<!--
<script src="<?php echo base_url();?>static/js/service.js" type="text/javascript"></script>
-->