		<footer class="site-footer">
			<div>
				© <?=date('Y');?> GODOY ASESORES INMOBILIARIOS.<br>
				TODOS LOS DERECHOS RESERVADOS.
			</div>
			<div class="address">
						<div>
							AV. DEL LIBERTADOR 14058.<br>
							MARTINEZ. SAN ISIDRO. BS. AS. ARGENTINA.<br><br>
							<a href="541147931900">Tel (011) 4793-1900</a><br>
							<a href="mailto:info@godoyasesores.com" target="_blank">INFO@GODOYASESORES.COM</a><br>
							
							<a href="https://www.facebook.com/inmobiliariagodoyasesores/" class="fa fa-facebook"></a>
							<a href="https://www.instagram.com/godoyasesores/" class="fa fa-instagram"></a>
						</div>
						</div>
			<div>
				<!-- <a href="http://animalstudio.com.ar" target="_blank">Design by Animal Studio</a> -->
			</div>
								<a class="fab fa-whatsapp" href="https://wa.me/541139001900" target="_blank"></a>
					
		</footer>

		<div class="appraisal">
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
				<input type="hidden" name="csrfmiddlewaretoken" value="JcsNkae8IWdOCVfGT7Bd0WulqLRif3ETwH3BFfAB5dTz2mly6IXvOUEizD3KrDiP">
			</form>
		</div>
		<script src="<?=$base;?>js/jquery-1.12.4.js"></script>
        <script src="<?=$base;?>js/jquery-ui.js"></script>
        <script src="<?=$base;?>js/bootstrap.min.js"></script>
        <script src="<?=$base;?>js/index.large.js"></script>
		<?PHP
			foreach($jsFiles as $js) {
				echo '
        <script src="'.$js.'"></script>';
			}
		?>
		<?=$jsToExecute;?>
    </body>
</html>
