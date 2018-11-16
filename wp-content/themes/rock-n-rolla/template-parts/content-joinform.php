<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<div class="entry-content">
		<?php
			the_content();
		?>
		<h3>Formulario registro</h3>
		<p>Campos con * son obligatorios los demas son opcionales</p>

		<form id="join-form" action="<?php echo esc_url( admin_url('admin-post.php') ); ?>"
			  method="post" class="form col-sm-12">

			<h3 class="text-center">Datos personales</h3>

			<div class="form-group">
				<label for="">Nombre representante * :</label>
				<input id="first-name" name="first_name" type="text" 
					   class="form-control" value="" required>
			</div>
			<div class="form-group">
				<label for="">Apellidos representante * :</label>
				<input id="last-name" name="last_name" type="text" 
					   class="form-control" value="" required>
			</div>
			<div class="form-group">
				<label for="">Teléfono representante :</label>
				<input id="telephone" name="telephone" type="tel" 
					   class="form-control" value="">
			</div>			
			<div class="form-group">
				<label for="">Celular representante *:</label>
				<input id="cellphone" name="cellphone" type="tel" 
					   class="form-control" value="">
			</div>
			<div class="form-group">
				<label for="">Correo electrónico representante *:</label>
				<input id="email" name="email" type="email" 
					   class="form-control" value="" required="">
			</div>

			<h3 class="text-center">Datos negocio</h3>

			<div class="form-group">
				<label for="">Nombre negocio* :</label>
				<input id="name_company" name="name_company" type="text" 
					   class="form-control" value="" required="">
			</div>

			<div class="form-group">
				<label for="">¿En donde esta ubicado el negocio? * :</label>
				<select name="location" id="location" class="form-control" required="">
					<option value="">-- Seleccione --</option>
					<option value="1">Pereira</option>
					<option value="2">Manizales</option>
					<option value="3">Quindio</option>
				</select>
			</div>

			<div class="form-group">
				<label for="">Dirección negocio * :</label>
				<input type="text" name="address" id="address"
				class="form-control" value="" required=""></input>
			</div>

			<div class="form-group">
				<label for="">Teléfono reservas :</label>
				<input type="tel" id="telephone_company" 
					   class="form-control"  name="telephone_company" value="">
			</div>
			<div class="form-group">
				<input type="hidden" name="action" value="join_form">
				<input type="submit" value="Enviar"></input>	
			</div>
			
		</form>
	</div>
</article><!-- #post-## -->