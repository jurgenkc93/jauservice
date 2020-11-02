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
				<img alt="" class="center" src="<?php echo base_url();?>static/img/logo_web.png" height="150px">
				<h2>Bienvenido</h2>
				<br>
				<form action="<?php echo base_url();?>index.php/welcome/recovery" class="" method="POST">
					<div class="form-group" id="phone-div">
						<label for="exampleInputPhone1">Teléfono a 10 digitos</label>
						<input type="text" class="form-control" name="phone" placeholder="272 123 4567" max="10" minlength="10" maxlength="10" required>
						<small class="form-text text-muted"></small>
                    </div>


					<div>
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