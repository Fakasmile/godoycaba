<div class="footer">
				<div>
					© <?=date('Y');?> GODOY <br>
					ASESORES <br>
					INMOBILIARIOS.
				</div>
				<div>
					TODOS <br>
					LOS DERECHOS <br>
					RESERVADOS.
				</div>
				<div>
					
				</div>
			</div>
		</main>

		<div class="appraisal" style="display: block;">
			<div class="header">
				<div class="title">TASACIONES</div>
				<div class="close" data-action="close"></div>
			</div>

			<form class="contact-form with-outline" action="/api/sendemail/appraisal/" method="post" novalidate="" data-contactform="">
				<div class="fields">
					<div>
						<div class="field">
							<input id="id_name" maxlength="512" name="name" placeholder="Nombre" type="text" required="">
						</div>
						<div class="field">
							<input id="id_email" maxlength="512" name="email" placeholder="Email" type="email" required="">
						</div>
						<div class="field">
							<input id="id_phone" maxlength="512" name="phone" placeholder="Teléfono" type="text" required="">
						</div>
						<div class="field">
							<input id="id_subject" maxlength="512" name="subject" placeholder="Asunto" type="text" required="">
						</div>
						<button type="submit" data-loading-text="Enviando..." tabindex="-1">
							Enviar
						</button>
					</div>
					<div>
						<div class="field">
							<textarea cols="40" id="id_message" name="message" placeholder="Mensaje" rows="10" required=""></textarea>
						</div>
					</div>
				</div>
				<div class="success-message">
					SU MENSAJE <br>
					HA SIDO ENVIADO, <br>
					NOS COMUNICAREMOS <br>
					CON USTED A LA BREVEDAD. <br>
					MUCHAS GRACIAS.
				</div>
				<input type="hidden" name="csrfmiddlewaretoken" value="DIAb1o3OPgvpKGekm4yxczV0c4MDAaBPqdbZmtphcxbaa7kczFUP0x5XlWY5MKfL">
			</form>
		</div>
		<script src="<?=$base;?>js/jquery-1.12.4.js"></script>
        <script src="<?=$base;?>js/jquery-ui.js"></script>
        <script src="<?=$base;?>js/bootstrap.min.js"></script>
        <script src="/js/index.large.js"></script>
		<?PHP
			foreach($jsFiles as $js) {
				echo '
        <script src="'.$js.'"></script>';
			}
		?>
		<?=$jsToExecute;?>
		
		
	<!-- Start of HubSpot Embed Code -->
<script type="text/javascript" id="hs-script-loader" async defer src="//js.hs-scripts.com/20199973.js"></script>
<!-- End of HubSpot Embed Code -->	
    </body>
</html>