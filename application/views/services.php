<section class="wrapper">
<br>
	<div class="container">
		<?php if($roles){
			?>
			<h5>Servicios disponibles en la ciudad de Orizba, Ver.</h5>
			<br>
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