<!--<script src="<?php echo base_url();?>static/js/contact.js" type="text/javascript"></script>-->

<div>
  
  <br>
  <br>

  <div class="container">
      <div class="row">
        <div class="col-md-6 jumbotron">
          <small id="emailHelp" class="form-text text-muted"></small>
          <form class="" action="<?php echo base_url();?>index.php/welcome/contactUs" method="post">
            <div class="form-group">
              <input type="text" class="form-control" id="name" name="name" placeholder="Nombre..." maxlength="50" required>
            </div>
            <div class="form-group">
              <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Email..."  required>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" id="telephone" name="telephone" placeholder="Teléfono...     Ej: XXX-XXX-XXXX"  required>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" id="subject" name="subject" placeholder="Asunto..."  required>
            </div>
            <div class="form-group">
              <textarea rows="8" cols="80" class="form-control" maxlength="500" id="body" name="body" required></textarea>
              <small class="kecomer-text">Maximo 500 caracteres.</small>
            </div>
            <input type="submit" name="button" class="btn btn-primary" id="sendEmail" value="Enviar correo">
          </form>
        </div>
        <div class="col-md-6">
          <div class="jumbotron">
            <center>
              <img alt="" src="<?php echo base_url();?>static/img/logo.png" height="120px" width="150px">
            </center>
            <br><br>
            <p>Oriente 10 871 94300, Centro, Orizaba, Ver.</p>
            <p>comercial@jauservice.com</p>
            <p>+52 (272) 154 9510</p>

          </div>
        </div>
      </div>
  </div>

  <div class="container-fluid jumbotron">
		<div class="row">
			
			<div class="col-md-4 ">
				<img alt="" src="<?php echo base_url();?>static/img/home/solution.png" class="center" width="300" height="200">
				<h3 style="text-align: center;">Soluciones a tus problemas</h3>
			</div>
			<div class="col-md-4 ">
				<img alt="" src="<?php echo base_url();?>static/img/home/worker.png" class="center" width="300" height="200">
				<h3 style="text-align: center;">Personal capacitado cerca de ti</h3>
			</div>
			<div class="col-md-4">
				<img alt="" src="<?php echo base_url();?>static/img/home/location.png" width="300" height="200" class="center">
				<h3 style="text-align: center;">En donde sea que estés</h3>
			</div>
		</div>
	
	</div>
</div>
