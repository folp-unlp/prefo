<div class="container my-5">
	<h3>Contacto</h3>
	<hr />
	<div>
		<div class="row">
			<div class="col-sm-5">
				<div class="panel-body panel">
					<?php $this::display_page_errors(); ?>
					<form method="post" action="<?php print_link("info/contact"); ?>">
						<div class="form-group">
							<input type="text" class="form-control" required id="name" name="name" placeholder="Ingrese su nombre *">
						</div>

						<div class="form-group">
							<input type="email" class="form-control" required id="email" name="email" placeholder="Ingrese su email *">
						</div>

						<div class="form-group">
							<textarea class="form-control" id="msg" name="msg" rows="4" required placeholder="Deje un mensaje *"></textarea>
						</div>
						<button type="submit" class="btn btn-primary">Enviar mensaje</button>
					</form>
				</div>
				<hr />
				<p>
					<b class="chead">Email</b><br />
					<a href="#" class="editContent">soporte@folp.unlp.edu.ar</a>
				</p>
			</div>

			<div class="col-sm-7">
				<div class="panel panel-body">
				<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3271.8751714278023!2d-57.9420944!3d-34.909582!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95a2e63f1b0d6179%3A0x4f82d1e271444675!2sFacultad%20de%20Odontologia%2C%20UNLP.!5e0!3m2!1ses-419!2sar!4v1657819161281!5m2!1ses-419!2sar" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
				</div>
			</div>
		</div>
	</div>
	<?php
	if (DEVELOPMENT_MODE) {
	?>
		<small class="text-muted">To edit this file, browse to :- <i>app/view/partials/info/contact.php</i></small>
	<?php
	}
	?>

</div>