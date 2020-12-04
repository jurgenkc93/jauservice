<br>
<div class="container">
	<?php if($roles){
		?>
		<img alt="" class="center" src="<?php echo base_url();?>static/img/logo.png" width="250" height="150">
		<h5>Jauservice lleva tu servicio a:</h5>
		<h5><?php echo $_SESSION['address']; ?></h5>
		<table class="table">
			<tbody>
				<?php
				foreach($roles as $role){
				?>
				<tr id="<?php echo $role['keycode']; ?>" onclick="findCategory(this.id)">
					<th scope="row"><i class="<?php echo $role['image']; ?> fa-2x color-blue"></i></th>
					<td><h5><?php echo $role['name']; ?></h5></td>
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

<style>
tr:hover{
	cursor: pointer;
}
</style>

<script src="<?php echo base_url();?>static/js/service.js" type="text/javascript"></script>