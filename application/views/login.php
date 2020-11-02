<div id="container" class="container">
	<br>
	<div class=" form-group">
		<br>
		<p></p>
		<div class="row">
			<div class="col-md-3">
			</div>
			<div class="col-md-6">
				<h2>Bienvenido</h2>

                <img alt="" src="<?php echo base_url();?>static/img/logo.png" class="img-circle center" width="200">

				<form action="<?php echo base_url();?>index.php/welcome/login" class="" method="POST">
					<br>

					<div class="form-group" id="phone-div">
						<label>Número telefónico</label>
						<input type="text" name="phone" class="form-control" id="phone" placeholder="272 123 4567">
						<small class="form-text text-muted" id="phone-warning">El teléfono no coincide o no está registrado :(</small>
					</div>

					<div id="password-div">
						<p>Contraseña</p>
						<input type="password" class="form-control" name="password" id="password" size="50" maxlength="50" placeholder="Contraseña..."/>
					</div>
					<br>

					<div>
						<button type="button" class="btn btn-primary background-blue w-100 w-100" id="find-phone">Siguiente</button>
						<input class="btn btn-primary background-blue w-100 w-100" type="submit" name="Subir" id="login" value="Iniciar Sesión"/>
					</div>
					<br>
					<a href="<?php echo base_url();?>index.php/welcome/forgot" class="color-blue">¿Olvidaste tu contraseña?</a>
					<br>
					<br>
					¿Eres Nuevo? 
					<a href="<?php echo base_url();?>index.php/welcome/newuser"> <button type="button" class="btn btn-success w-100" id="find-phone">Crear cuenta</button> </a>
				</form>
			</div>
			<div class="col-md-3">
			</div>
		</div>
		<br>
		<br>
	</div>
</div>


<script src="<?php echo base_url();?>static/js/login.js" type="text/javascript"></script>

