<div class="container my-5">
	<h3>Elija su idioma</h3>
	<hr />
	<div class="row">
		<div class="col">
			<?php
			// Obtiene los archivos de idioma disponibles
			$files = glob(LANGS_DIR . '*.ini');
			foreach ($files as $file) {
				$langname = pathinfo($file, PATHINFO_FILENAME);;
			?>
				<a class="btn btn-sm btn-primary" href="<?php print_link("info/change_language/$langname") ?>"><?php echo ucfirst($langname); ?></a>
			<?php
			}
			?>
		</div>
	</div>
</div>