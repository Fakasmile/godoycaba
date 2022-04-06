<!--
<pre>
<?PHP //print_r($prop); ?>


</pre>
-->
<?php
$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
?>
    <main class="page search">
		<h1 class="for-seo">Buscador</h1>
		<div class="container">
			<div class="resultados">
			<a href="#" onclick="history.back();">← Regresar</a>
			
			<div class="redes">
			<p>Compartilo con tus contactos</p>
			<a href="https://www.facebook.com/sharer.php?u=<?php echo $actual_link ?>" class="fa fa-facebook-f"></a>
			<a href="mailto:?subject=Mira esta propiedad'.<?php echo $actual_link ?>.'"  class="fa fa-envelope"></a>
			<a href="https://api.whatsapp.com/send?text=<?php echo $actual_link ?>" class="fa fa-whatsapp whatsapp-icon"></a>
			<h3>CTA</h3>
			</div>	
			<h2 class="tipoVenta"><?=$prop->property_type;?> | <?=$tipoOp;?></h2>
				<h1 class="tipoProp"><?=$prop->title;?></h1>
				<div>
					<!-- Nav tabs -->
					<ul class="nav nav-tabs" role="tablist">
						<li role="presentation" class="active"><a href="#ficha" aria-controls="ficha" role="tab" data-toggle="tab">Ficha</a></li>
						<li role="presentation"><a href="#fotos" aria-controls="fotos" role="tab" data-toggle="tab">Fotos</a></li>
						<li role="presentation"<?=($prop->video!=null)?' class="inactive" data-toggle="tab"':'';?>><a href="#video" aria-controls="video" role="tab">Video</a></li>
						<li role="presentation"><a href="#mapa" aria-controls="mapa" role="tab" data-toggle="tab">Mapa</a></li>
					</ul>

					<!-- Tab panes -->
					<div class="tab-content">
						<div role="tabpanel" class="tab-pane active" id="ficha">
							<div class="row">
								<div class="col-md-6">
									<div id="imagen-video" class="imagen-home">
										<img src="<?=$imgP;?>" id="imagen_ficha" alt="" title="">
									</div>
									<div class="descripIMG">
										<div class="image_data">Código de Ficha: <span class="datosimple"><?=$prop->id;?></span></div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="row bloquefichagris">
										<div class="col-md-6 fondo_fichas_datos">
											<div class="image_data">Precio: <span class="titulodestacado"><?=$prop->price[0]['currency'];?> <?=$prop->price;?></span></div>
											<div class="image_data">Tipo de Propiedad: <span class="datosimple"><?=$prop->property_type;?></span></div>
										</div>
										<div class="col-md-6 fondo_fichas_datos">
											<div class="image_data">Operación: <span class="datosimple"><?=$tipoOp;?></span></div>
											<div class="image_data">Ubicación: <span class="datosimple"><?=$prop->city;?>, <?=$prop->region;?> | <?=$prop->address;?></span></div>
										</div>
									</div>
									<div class="row bloquefichagris">
										<?PHP if($prop->property_type=="Terreno") {?>
										<div class="col-md-6 fondo_fichas_datos">
											<div class="clearfix">
												<div id="id1" class="image_data">Longitud Frente: <span class="datosimple"><?=$prop->field_width;?></span></div>
											</div>
											<div class="clearfix">
												<div id="id2" class="image_data">Longitud Fondo: <span class="datosimple"><?=$prop->field_length;?></span></div>
											</div>
										</div>
										<div class="col-md-6 fondo_fichas_datos">
											<div class="clearfix">
												<div id="id3" class="image_data">FOT: <span class="datosimple"><?=$prop->fot;?></span></div>
											</div>
										</div>
										<?PHP } elseif($prop->property_type=="Campo") {?>
										<div class="col-md-6 fondo_fichas_datos">
											<div class="clearfix">
												<div id="id1" class="image_data">Tipo Campo: <span class="datosimple"><?=$prop->country_type;?></span></div>
											</div>
											<div class="clearfix">
												<div id="id2" class="image_data">Estado: <span class="datosimple"><?=$prop->condition;?></span></div>
											</div>
										</div>
										<div class="col-md-6 fondo_fichas_datos">
											<div class="clearfix">
												<div id="id3" class="image_data">Distancia Pavimento: <span class="datosimple"><?=$prop->distance_pavement;?></span></div>
											</div>
										</div>
										<?PHP } elseif($prop->property_type=="Casa") {?>
										<div class="col-md-6 fondo_fichas_datos">
											<div class="clearfix">
												<div id="id1" class="image_data">Antiguedad: <span class="datosimple"><?=$prop->old;?></span></div>
											</div>
											<div class="clearfix">
												<div id="id2" class="image_data">Baños: <span class="datosimple"><?=$prop->bathrooms;?></span></div>
											</div>
											<div class="clearfix">
												<div id="id2" class="image_data">Dormitorios: <span class="datosimple"><?=$prop->rooms;?></span></div>
											</div>
										</div>
										<div class="col-md-6 fondo_fichas_datos">
											<div class="clearfix">
												<div id="id3" class="image_data">Sup. Terreno: <span class="datosimple"><?=$prop->plot_area;?></span></div>
											</div>
											<div class="clearfix">
												<div id="id3" class="image_data">Ambientes: <span class="datosimple"><?=count($prop->ambients);?></span></div>
											</div>
											<div class="clearfix">
												<div id="id3" class="image_data">Estado: <span class="datosimple"><?=$prop->condition;?></span></div>
											</div>
										</div>
										<?PHP } elseif($prop->property_type=="Departamento") {?>
										<div class="col-md-6 fondo_fichas_datos">
											<div class="clearfix">
												<div id="id1" class="image_data">Antiguedad: <span class="datosimple"><?=$prop->old;?></span></div>
											</div>
											<div class="clearfix">
												<div id="id3" class="image_data">Apto Profesional: <span class="datosimple"><?=$prop->apto_professional;?></span></div>
											</div>
										</div>
										<div class="col-md-6 fondo_fichas_datos">
											<div class="clearfix">
												<div id="id2" class="image_data">Baños: <span class="datosimple"><?=$prop->bathrooms;?></span></div>
											</div>
											<div class="clearfix">
												<div id="id2" class="image_data">Dormitorios: <span class="datosimple"><?=$prop->rooms;?></span></div>
											</div>
											<div class="clearfix">
												<div id="id3" class="image_data">Estado: <span class="datosimple"><?=$prop->condition;?></span></div>
											</div>
										</div>
										<?PHP } elseif($prop->property_type=="Isla") {?>
										<div class="col-md-6 fondo_fichas_datos">
											<div class="clearfix">
												<div id="id1" class="image_data">Tipo Campo: <span class="datosimple"><?=$prop->country_type;?></span></div>
											</div>
											<div class="clearfix">
												<div id="id2" class="image_data">Estado: <span class="datosimple"><?=$prop->condition;?></span></div>
											</div>
										</div>
										<div class="col-md-6 fondo_fichas_datos">
											<div class="clearfix">
												<div id="id3" class="image_data">Distancia Pavimento: <span class="datosimple"><?=$prop->distance_pavement;?></span></div>
											</div>
										</div>
										<?PHP } elseif($prop->property_type=="Quinta") {?>
										<div class="col-md-6 fondo_fichas_datos">
											<div class="clearfix">
												<div id="id1" class="image_data">Tipo Campo: <span class="datosimple"><?=$prop->country_type;?></span></div>
											</div>
											<div class="clearfix">
												<div id="id2" class="image_data">Estado: <span class="datosimple"><?=$prop->condition;?></span></div>
											</div>
										</div>
										<div class="col-md-6 fondo_fichas_datos">
											<div class="clearfix">
												<div id="id3" class="image_data">Distancia Pavimento: <span class="datosimple"><?=$prop->distance_pavement;?></span></div>
											</div>
										</div>
										<?PHP } elseif($prop->property_type=="Tipo casa PH") {?>
										<div class="col-md-6 fondo_fichas_datos">
											<div class="clearfix">
												<div id="id1" class="image_data">Antiguedad: <span class="datosimple"><?=$prop->old;?></span></div>
											</div>
											<div class="clearfix">
												<div id="id2" class="image_data">Baños: <span class="datosimple"><?=$prop->bathrooms;?></span></div>
											</div>
											<div class="clearfix">
												<div id="id2" class="image_data">Dormitorios: <span class="datosimple"><?=$prop->rooms;?></span></div>
											</div>
										</div>
										<div class="col-md-6 fondo_fichas_datos">
											<div class="clearfix">
												<div id="id3" class="image_data">Plantas: <span class="datosimple"><?=$prop->flats;?></span></div>
											</div>
											<div class="clearfix">
												<div id="id3" class="image_data">Ambientes: <span class="datosimple"><?=count($prop->ambients);?></span></div>
											</div>
											<div class="clearfix">
												<div id="id3" class="image_data">Estado: <span class="datosimple"><?=$prop->condition;?></span></div>
											</div>
										</div>
										<?PHP } elseif($prop->property_type=="Cochera") {?>
										<div class="col-md-6 fondo_fichas_datos">
											<div class="clearfix">
												<div id="id1" class="image_data">Cobertura: <span class="datosimple"><?=($prop->open_garages>0)?'Descubierta':'Cubierta';?></span></div>
											</div>
											<div class="clearfix">
												<div id="id2" class="image_data">Tipo Coche: <span class="datosimple"><?=$prop->garage_vehicle_size;?></span></div>
											</div>
											<div class="clearfix">
												<div id="id2" class="image_data">Tipo Cochera: <span class="datosimple"><?=$prop->garage_type;?></span></div>
											</div>
										</div>
										<div class="col-md-6 fondo_fichas_datos">
											<div class="clearfix">
												<div id="id3" class="image_data">Tipo Acceso: <span class="datosimple"><?=$prop->garage_access;?></span></div>
											</div>
										</div>
										<?PHP } elseif($prop->property_type=="Fondo de comercio") {?>
										<?PHP } elseif($prop->property_type=="Galpón") {?>
										<div class="col-md-6 fondo_fichas_datos">
											<div class="clearfix">
												<div id="id1" class="image_data">Longitud Frente: <span class="datosimple"><?=$prop->length;?></span></div>
											</div>
											<div class="clearfix">
												<div id="id2" class="image_data">Longitud Fondo: <span class="datosimple"><?=$prop->length;?></span></div>
											</div>
											<div class="clearfix">
												<div id="id2" class="image_data">Altura Techo: <span class="datosimple"><?=$prop->high_ceiling;?></span></div>
											</div>
										</div>
										<div class="col-md-6 fondo_fichas_datos">
											<div class="clearfix">
												<div id="id3" class="image_data">FOT: <span class="datosimple"><?=$prop->fot;?></span></div>
											</div>
										</div>
										<?PHP } elseif($prop->property_type=="Local") {?>
										<div class="col-md-6 fondo_fichas_datos">
											<div class="clearfix">
												<div id="id3" class="image_data">Estado: <span class="datosimple"><?=$prop->condition;?></span></div>
											</div>
											<div class="clearfix">
												<div id="id3" class="image_data">Plantas: <span class="datosimple"><?=$prop->flats;?></span></div>
											</div>
											<div class="clearfix">
												<div id="id3" class="image_data">Cocheras: <span class="datosimple"><?=(($prop->open_garages!=null)?count($prop->open_garages):0)+(($prop->covered_garages!=null)?count($prop->covered_garages):0);?></span></div>
											</div>
										</div>
										<?PHP } elseif($prop->property_type=="Oficina") {?>
										<div class="col-md-6 fondo_fichas_datos">
											<div class="clearfix">
												<div id="id3" class="image_data">Antiguedad: <span class="datosimple"><?=$prop->old;?></span></div>
											</div>
											<div class="clearfix">
												<div id="id3" class="image_data">Ambientes: <span class="datosimple"><?=count($prop->ambients);?></span></div>
											</div>
										</div>
										<div class="col-md-6 fondo_fichas_datos">
											<div class="clearfix">
												<div id="id3" class="image_data">Cocheras: <span class="datosimple"><?=(($prop->open_garages!=null)?count($prop->open_garages):0)+(($prop->covered_garages!=null)?count($prop->covered_garages):0);?></span></div>
											</div>
										</div>
										<?PHP } elseif($prop->property_type=="Edificio") {?>
										<?PHP } elseif($prop->property_type=="Hotel") {?>
										<?PHP } elseif($prop->property_type=="Negocio Especial") {?>
										<?PHP }?>
									</div>
								</div>
							</div>
							<div class="row fichafondoparr">
								<div class="col-md-12">
									<div id="ficha_Header3" class="titulodestacado">Servicios</div>
									<div id="ficha_contenido3" class="row">
										<?PHP
											foreach($prop->services->service as $serv) {
										?>
										<div class="col-md-4 datosimple"><?=$serv;?></div>
										<?PHP
											}
										?>
									</div>
								</div>
								<div class="col-md-12">
									<div id="ficha_Header1" class="titulodestacado">Instalaciones</div>
									<div id="ficha_contenido1" class="row">
										<?PHP
											foreach($prop->other_data->other as $propinfo) {
										?>
										<div class="col-md-4 datosimple"><?=$propinfo;?></div>
										<?PHP
											}
										?>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div id="importantINFOdiv" class="importantINFO">
										<p><?=$prop->content;?>
										</p>
									</div>
								</div>
							</div>
						</div>
						<div role="tabpanel" class="tab-pane" id="fotos">
							<div class="row">
								<?PHP
									foreach($prop->pictures->picture as $k=>$foto) {
								?>
								<div class="col-md-6 fotos">
									<img src="<?=$foto->picture_url;?>" id="foto<?=$k;?>" alt="" title="">
								</div>
								<?PHP
									}
								?>
							</div>
						</div>
						<div role="tabpanel" class="tab-pane" id="video">
							<?PHP
								if($prop->video!=null) {
							?>
							<iframe width="100%" height="315" src="<?=$prop->video;?>" frameborder="0" allow="accelerometer; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
							<?PHP
								}
							?>
						</div>
						<div role="tabpanel" class="tab-pane" id="mapa">
							<div class="mapa">
								<div id="map_canvas"></div>
															
								<script>
								  var map;
								  var myLatlng = {lat: <?=$prop->latitude;?>, lng: <?=$prop->longitude;?>};
								  var marker;
								  function initMap() {
									map = new google.maps.Map(document.getElementById('map_canvas'), {
									  center: myLatlng,
									  zoom: 15
									});
									 marker = new google.maps.Marker({
									  position: myLatlng,
									  map: map,
									  title: 'Casa en venta'
									});
								  }
								</script>
								<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAxZ8eRh-497KEVJzpygWiyZSXHqo2O0lM&callback=initMap"
								async defer></script>
							</div>
						</div>
					</div>

				</div>
			</div>
        </div>
	</main>
