<div id="container" class="container">
	<br>
	<div class=" form-group">
		<br>
		<p></p>
		<div class="row">
			<div class="col-md-3">
			</div>
			<div class="col-md-6">
			<img alt="" src="<?php echo base_url();?>static/img/logo.png" class="img-circle center" width="200">
				<h2>Actualice su contraseña</h2>
				<br>
				<form action="<?php echo base_url();?>index.php/welcome/changePassword" class="" method="POST">
					<div id="password-div">
                        <p>Contraseña*</p>
						<div class="input-group">
							<input type="password" class="form-control" name="password" id="password" size="20" maxlength="20" placeholder="Contraseña..."/>
							<span class="input-group-addon mx-2 my-3 far fa-eye fa-lg" id="eye-password">
							</span>
						</div>

                        <input type="hidden" name="user" value="<?php echo $user;?>" required>
						
						<p class="form-text text-danger" id="password-warning">La contraseña debe de ser de 6 digitos y tener como minimo una letra mayuscula y un numero. (Maximo 20 caracteres)</p>
						<br>
						<div id="repeat-div">
							<p>Repita su contraseña*</p>
							<div class="input-group">
								<input type="password" class="form-control" name="password-repeat" id="password-repeat" size="50" maxlength="50" placeholder="Contraseña..."/>
								<span class="input-group-addon mx-2 my-3 far fa-eye fa-lg" id="eye-password-repeat">
								</span>
							</div>
							<p class="form-text text-danger" id="password-repeat-warning">Las contraseñas no coinciden</p>
						</div>
					</div>
					<br>
					<div>
						<input class="btn btn-primary w-100 background-blue" id="submit-button" type="submit" name="Subir" id="sign" value="Actualizar" disabled/>
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

<script src="<?php echo base_url();?>static/js/user/password.js" type="text/javascript"></script>
