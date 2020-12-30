
<br>
<div class="container-fluid">

	<div class="row">
		<div class="col-md-5">
			<h1 class="color-blue jauservice-text mx-5" style="">Bienvenido</h1>
			<img alt="" class="center" src="<?php echo base_url();?>static/img/logo.png" width="250" height="150">
			<br>
			<h1 class="jauservice-text" style="text-align: center;">Soluciones para tu hogar y tu vida</h1>
			<br>
		</div>
		<div class="col-md-7">
			<?php if($roles){
				?>
				<!--
				<h1 class="color-blue jauservice-text mx-5" style="">Bienvenido</h1>
				<img alt="" class="center" src="<?php echo base_url();?>static/img/logo.png" width="250" height="150">
				<br>
				<h1 class="color-blue jauservice-text" style="text-align: center;">Soluciones a tu hogar y tu vida, en la ciudad de Orizaba</h1>
				<br>
				-->
				<h5>¿Que tipo de personal busca?</h5>
				<br>
				<table class="table">
					<tbody>
						<?php
						foreach($roles as $role){
						?>
						<tr id="<?php echo $role['keycode']; ?>" class="role button py-3">
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

<br>

<div class="container-fluid">
	<div class="row">
		<div class="col-xs-12 col-md-4">
			<h5 class="mx-5 hover-pointer go-services">Encuentra personal para resolver los problemas de casa</h5>
			<div class="background-white rounded mx-5 border border-primary hover-pointer go-services">
				<img alt="" class="center" src="<?php echo base_url();?>static/img/home/solution.png" height="200">
			</div>
			<p class="mx-5">En JauService encontraras personal capacitado para las tareas domesticas que requieran conocimientos mas específicos</p>
			<br>
		</div>
		<div class="col-xs-12 col-md-4">
			<h5 class="mx-5 hover-pointer provide-services">Brinda tus servicios</h5>
			<div class="background-blue rounded mx-5 hover-pointer provide-services">
				<img alt="" class="center" src="<?php echo base_url();?>static/img/home/worker.png" height="200">
			</div>
			<p class="mx-5">Si tienes conocimientos en algun area y quieres incrementar tus clientes. <a href="<?php echo base_url(); ?>index.php/welcome/contact">Aquí podrás hacerlo</a></p>
			<br>
		</div>
		<div class="col-xs-12 col-md-4">
			<h5 class="mx-5 text-center trusted-people">Personal de confianza</h5>
			<div class="background-white rounded mx-5">
				<img title="https://www.freepik.es/fotos/negocios" class="center trusted-people" src="<?php echo base_url();?>static/img/home/handshake.jpg" height="200">
			</div>
			<p class="mx-5">Para brindar seguridad al usuario final, nos aseguramos de que quienes estan anunciados sean quienes dicen ser</p>
			<br>
		</div>
	</div>
</div>
<!--
<div class="container">
	<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
		<ol class="carousel-indicators">
			<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
			<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
			<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
		</ol>
		<div class="carousel-inner">
			<div class="carousel-item active">
				<br>
				<h1 class="color-blue jauservice-text mx-5" style="">Bienvenido</h1>
				<img alt="" class="center" src="<?php echo base_url();?>static/img/logo.png" width="250" height="150">
				<br>
				<h1 class="color-blue jauservice-text" style="text-align: center;">Soluciones para tu hogar y tu vida</h1>
				<br>
			</div>
			<div class="carousel-item">
				<br>
				<img alt="" class="center" src="<?php echo base_url();?>static/img/jauservice.png" width="250" height="40">
				<br>
				<img alt="" class="center" src="<?php echo base_url();?>static/img/home/location.png" width="250" height="150">
				<br>
				<h1 class="color-blue jauservice-text" style="text-align: center;">En la ciudad de Orizaba</h1>
				<br>
			</div>
			<div class="carousel-item">
				<br>
				<h1 class="color-blue jauservice-text mx-5" style="">Bienvenido</h1>
				<img alt="" class="center" src="<?php echo base_url();?>static/img/logo.png" width="250" height="150">
				<br>
				<h1 class="color-blue jauservice-text" style="text-align: center;">Soluciones para tu hogar, en la ciudad de Orizaba</h1>
				<br>
			</div>  
		</div>
		<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>
</div>

		-->


<style>
tr:hover{
	cursor: pointer;
}

</style>

<script src="<?php echo base_url();?>static/js/index.js" type="text/javascript"></script>