<div class="container">
	<h4>Cambiar dirección de email</h4>
	<hr />
	<div class="row">
		<div class="col">
			<form name="loginForm" action="<?php print_link('account/change_email?csrf_token=' . Csrf::$token); ?>" method="post">
				<?php $this::display_page_errors(); ?>
				<div class="row">
					<div class="col">
						<input placeholder="Ingrese su nueva dirección de email" value="<?php echo get_form_field_value('email'); ?>" name="email" required="required" class="form-control" type="text" />
					</div>
					<div class="col-auto">
						<button class="btn btn-success" type="submit">Enviar</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>