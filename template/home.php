
    <main class="page home">
        <div class="page-intro">
			<div class="contenidoHome">
				<div class="tituloHome">INMUEBLES EN VENTA<br>Y ALQUILER</div>
				<div class="fomrsearchHome">
					<form action="<?=$base;?>buscador/" method="POST">
						<select class="selector1Home" id="Partidos" name="Partidos">
							<option value="X">Ciudad</option>
							<?PHP
								$simpleXML2 = file_get_contents('info.xml');
								$adsc2 = new SimpleXMLElement($simpleXML2); 
								$tipoprop2 = array();
									foreach($adsc2->ad as $ad2) {
										if(!in_array(strtolower($ad2->city),$tipoprop2)) {
											$tipoprop2[] = strtolower($ad2->city);
											// $selected2 = ($selPartidos2==$ad2->city)?' selected="selected"':'';
											echo '<option  value="'.$ad2->city.'">'.$ad2->city.'</option>';
										}
									}
								
								

							?>
						</select>
						<select class="selector1Home" id="TipoPropiedades" name="TipoPropiedades">
							<option value="X">Indistinto</option>
							<?PHP
								$simpleXML = file_get_contents('info.xml');
								$adsc = new SimpleXMLElement($simpleXML);
								$tipoprop = array();
								foreach($adsc->ad as $ad) {
									if(!in_array(strtolower($ad->property_type),$tipoprop)) {
										$tipoprop[] = strtolower($ad->property_type);
										echo '<option value="'.$ad->property_type.'">'.$ad->property_type.'</option>';
									}
								}
							?>
						</select>
						<select class="selector2Home" id="Operaciones" name="Operaciones">
							<option value="For Rent">Alquiler</option>
							<option value="For Sale">Venta</option>
							<option value="For Rent">Alquiler</option>
						</select>
				 <!-- <input type="text" style="text-transform:capitalize;" class="inputSerarchHome" name="ubicacion" id="ubicacion" placeholder="Ubicación ej: Belgrano, Capital Federal"> -->
						<input type="submit" class="btnBuscar" name="btnBuscar" id="btnBuscar" value="Buscar">
					</form>
				</div>
				<div class="subtitHome">SOLICITE TASACIÓN</div>
				<div class="infoHome">Tel (011) 4793-1900</div>
			</div>
            <div class="slideshow">
                <div class="image image-01"></div>
                <div class="image image-02"></div>
                <div class="image image-03"></div>
                <div class="image image-04"></div>
            </div>
            <div class="arrow-down"></div>
        </div>
        <div class="page-content">
            <div class="text">
                <p class="mobile-no-brs">
                    Somos una empresa de servicios <br>
                    especializada en el asesoramiento <br>
                    para la compra y venta de propiedades <br>
                    residenciales, comerciales e industriales. <br>
                    Además, llevamos a cabo asesoramiento <br>
                    para desarrollos inmobiliarios.
                </p>
                <div class="tree"></div>
            </div>
