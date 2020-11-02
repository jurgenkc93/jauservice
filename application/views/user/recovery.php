<style>
.borderless-form-control{
	.border: 0;
}
</style>

<div id="container" class="container">
	<br>
	<div class=" form-group">
		<br>
		<p></p>
		<div class="row">
			<div class="col-md-3">
			</div>
			<div class="col-md-6">
				<br>
				<form action="<?php echo base_url();?>index.php/welcome/password" class="" method="POST">
					<div class="form-group">
						<h5>Ingrese el numero que le hemos proporcionado</h5>
						<input type="hidden" name="user" placeholder="######" value="<?php echo $user;?>" autocomplete="off" required>
						<input type="text" class="form-control" name="number" placeholder="######" max="6" minlength="6" maxlength="6" required>
                        <br>
						<input class="btn btn-primary w-100 background-blue" type="submit" name="Subir" id="sign" value="Recuperar mi contraseña"/>
                    </div>
					<br>
				</form>
			</div>
			<div class="col-md-3">
			</div>
		</div>
		<br>
		<br>
	</div>
</div>