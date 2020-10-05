<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>

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
				<p class="form-text text-muted" id="phone-warning">Parece que ya tienes cuenta <a href="<?php echo base_url();?>index.php/welcome/user">Iniciar Sesión</a></p>
				<form action="<?php echo base_url();?>index.php/welcome/login" class="" method="POST">
					<div class="form-group" id="phone-div">
						<label for="exampleInputPhone1">Teléfono a 10 digitos</label>
						<input type="text" class="form-control" id="phone" placeholder="272 123 4567" max="10">
						<small class="form-text text-muted"></small>
						<p class="form-text text-danger" id="phone-warning-match">El teléfono no coincide</p>
                    </div>
                    
					<div class="form-group">
						<label>Nombre(s)*</label>
						<input type="text" name="name" id="name" class="form-control" placeholder="Harry James">
						<p class="form-text text-danger" id="name-warning">Nombre obligatorio</p>
                    </div>
                    
					<div class="form-group">
						<label>Apellido(s)*</label>
						<input type="text" name="surname" id="surname" class="form-control" placeholder="Potter">
						<p class="form-text text-danger" id="surname-warning">Apellidos obligatorio</p>
					</div>
                    
					<div id="password-div">
                        <p>Contraseña*</p>
						<div class="input-group">
							<input type="password" class="form-control " name="password" id="password" size="20" maxlength="20" placeholder="Contraseña..."/>
							<span class="input-group-addon mx-2 my-3 far fa-eye fa-lg" id="eye-password">
							</span>
						</div>
						<p class="form-text text-danger" id="password-warning">La contraseña debe de ser de 6 digitos y tener como minimo una letra mayuscula y un numero. (Maximo 20 caracteres)</p>
						<br>
                        <p>Repita su contraseña*</p>
						<div class="input-group">
							<input type="password" class="form-control" name="password-repeat" id="password-repeat" size="50" maxlength="50" placeholder="Contraseña..."/>
							<span class="input-group-addon mx-2 my-3 far fa-eye fa-lg" id="eye-password-repeat">
							</span>
						</div>
						<p class="form-text text-danger" id="password-repeat-warning">Las contraseñas no coinciden</p>
						<br>
					</div>

					<div class="form-check">
						<input class="form-check-input" type="checkbox" name="exampleRadios" id="terms-check">
						<label class="form-check-label">
							He leido y acepto los 
						</label>
						<a href="<?php echo base_url();?>index.php/welcome/privacy" id="terms-go" class="color-blue">Terminos y condiciones</a>
						<p class="form-text text-danger" id="terms-warning">Por favor revisa y acepta nuestro contrato</p>
					</div>
					<br>


					<div>
						<input class="btn btn-primary w-100 background-blue" type="button" name="Subir" id="sign" value="Crear cuenta"/>
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

<script src="<?php echo base_url();?>static/js/signup.js" type="text/javascript"></script>
