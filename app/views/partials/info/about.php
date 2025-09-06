<?php
$info_ctrl = new InfoController();
?>

<div class="container my-5">
	<h3>Configuración de la instancia actual del framework</h3>
	<hr />
	<div class="row">
		<div class="col">
			<table class="table table-striped table-hover table-bordered">
				<?php
				$info = $info_ctrl->get_info();
				foreach ($info as $key => $value) {
					echo '<tr>';
					echo '<td>' . $key . '</td>';
					echo '<td>' . $value . '</td>';
					echo '</tr>';
				}
				?>
			</table>
		</div>
	</div>
	<div>
		<?php
		if (DEVELOPMENT_MODE) {
		?>
			<small class="text-muted">Para editar este archivo, vaya a  :- <i>app/view/partials/info/about.php</i></small>
		<?php
		}
		?>
	</div>
</div>