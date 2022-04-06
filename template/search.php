<?PHP
$selTipoPr = (!empty($_REQUEST['TipoPropiedades']))?$_REQUEST['TipoPropiedades']:'';
$selTipoOp = (!empty($_REQUEST['Operaciones']))?$_REQUEST['Operaciones']:'';
$selMoneda = (!empty($_REQUEST['Moneda']))?$_REQUEST['Moneda']:'';
$PrecioInferior = (!empty($_REQUEST['PrecioInferior']))?$_REQUEST['PrecioInferior']:'';
$PrecioSuperior = (!empty($_REQUEST['PrecioSuperior']))?$_REQUEST['PrecioSuperior']:'';
$selPaises = (!empty($_REQUEST['Paises']))?$_REQUEST['Paises']:'';
$selProvincias = (!empty($_REQUEST['Provincias']))?$_REQUEST['Provincias']:'';
$selPartidos = (!empty($_REQUEST['Partidos']))?$_REQUEST['Partidos']:'';
$selUbicacion = (!empty($_REQUEST['ubicacion']))?$_REQUEST['ubicacion']:'';

?>
    <main class="page search">
		<h1 class="for-seo">Buscador</h1>
		<div class="container">
			<form id="myForm" method="POST" action="<?=$base;?>buscador/">
				<div class="row propiedades">
					<div class="col-md-6">
						<div class="continput">
							<label for="TipoPropiedades">Tipo de Propiedad:</label>
							<select id="TipoPropiedades" name="TipoPropiedades" class="styledJURY">
								<option value="X">Indistinta</option>
								<?PHP
									$simpleXML = file_get_contents('info.xml');
									$adsc = new SimpleXMLElement($simpleXML);
									$tipoprop = array();
									foreach($adsc->ad as $ad) {
										if(!in_array(strtolower($ad->property_type),$tipoprop)) {
											$tipoprop[] = strtolower($ad->property_type);
											$selected = ($selTipoPr==$ad->property_type)?' selected="selected"':'';
											echo '<option'.$selected.' value="'.$ad->property_type.'">'.$ad->property_type.'</option>';
										}
									}
								?>
							</select>							
						</div>
						<div class="continput">
							<label for="Operaciones">Operación:</label>
							<select id="Operaciones" name="Operaciones">
								<option value="X">Indistinta</option>
								<option <?=($selTipoOp=='For Sale')?'selected="selected"':'';?> value="For Sale">Venta</option>
								<option <?=($selTipoOp=='For Rent')?'selected="selected"':'';?> value="For Rent">Alquiler</option>
							</select>							
						</div>
						<div class="continput">
							<div class="cont50 comolabel">Moneda:</div>
							<div class="cont50">
								<label class="label3" for="pesos"><input <?=($selMoneda=='ARS')?'checked="checked"':'';?> id="pesos" type="radio" class="radios2" name="Moneda" value="ARS"> $ </label>
								<label class="label3" for="dolares"><input <?=($selMoneda=='USD')?'checked="checked"':'';?> id="dolares" type="radio" class="radios2" name="Moneda" value="USD"> u$s </label>
							</div>
						</div>
						<div class="continput">
							<label for="PrecioInferior">Rango de Precio:</label>
							<input id="PrecioInferior" name="PrecioInferior" type="number" class="input25" step="100" value="<?=$PrecioInferior?>">
							<span class="midinp">hasta</span>
							<input id="PrecioSuperior" name="PrecioSuperior" type="number" class="input25" step="100" value="<?=$PrecioSuperior?>">							
						</div>					
					</div>
					<div class="col-md-6">
						<div class="continput">
							<label for="Paises">País:</label>
							<select name="Paises" id="Paises">
								<option <?=($selTipoPr=='Argentina')?'selected="selected"':'';?> value="Argentina">Argentina</option>
								<option <?=($selTipoPr=='Uruguay')?'selected="selected"':'';?> value="Uruguay">Uruguay</option>
							</select>							
						</div>
						<div class="continput">
							<label for="Provincias">Provincia/Partido:</label>
							<select id="Provincias" name="Provincias">
								<option value="X">Indistinta</option>
								<?PHP
									$tipoprop = array();
									foreach($adsc->ad as $ad) {
										if(!in_array(strtolower($ad->region),$tipoprop) && !empty($ad->region)) {
											$tipoprop[] = strtolower($ad->region);
											$selected = ($selProvincias==$ad->region)?' selected="selected"':'';
											echo '<option'.$selected.' value="'.$ad->region.'">'.$ad->region.'</option>';
										}
									}
								?>
							</select>							
						</div>
						<div class="continput">
							<label for="Partidos">Ciudad:</label>
							<select id="Partidos" name="Partidos">
								<option value="X">Indistinta</option>
								<?PHP
									$tipoprop = array();
									foreach($adsc->ad as $ad) {
										if(!in_array(strtolower($ad->city),$tipoprop)) {
											$tipoprop[] = strtolower($ad->city);
											$selected = ($selPartidos==$ad->city)?' selected="selected"':'';
											echo '<option'.$selected.' value="'.$ad->city.'">'.$ad->city.'</option>';
										}
									}
								?>
							</select>							
						</div>					
					</div>	
					<div class="col-md-12 text-center">
						<input type="submit" class="btnBuscar2" value="Buscar" >	
					</div>
				</div>
			</form>
			<div class="resultados">
				<?PHP
					$avisosPel = array();
					foreach($adsc->ad as $ad) {
						$conds = array(true, true, true, true, true, true, true, true);
						if(!empty($_REQUEST['TipoPropiedades'])) {
							if($_REQUEST['TipoPropiedades']==$ad->property_type || $_REQUEST['TipoPropiedades']=='X') {
								$conds[0] = true;
							} else {
								$conds[0] = false;
							}
						}
						if(!empty($_REQUEST['Operaciones'])) {
							if($_REQUEST['Operaciones']==$ad->type || $_REQUEST['Operaciones']=='X') {
								$conds[1] = true;
							} else {
								$conds[1] = false;
							}
						}
						if(!empty($_REQUEST['Moneda'])) {
							if($_REQUEST['Moneda']==$ad->price[0]['currency']) {
								$conds[2] = true;
							} else {
								$conds[2] = false;
							}
						}
						if(!empty($_REQUEST['PrecioInferior']) || !empty($_REQUEST['PrecioSuperior'])) {
							$minimo = (!empty($_REQUEST['PrecioInferior']))?intval($_REQUEST['PrecioInferior']):0;
							$maximo = (!empty($_REQUEST['PrecioSuperior']))?intval($_REQUEST['PrecioSuperior']):999999999999999999999999999999999999;
							if($ad->price>=$minimo && $ad->price<=$maximo) {
								$conds[3] = true;
							} else {
								$conds[3] = false;
							}
						}
						if(!empty($_REQUEST['Partidos'])) {
							if($_REQUEST['Partidos']==$ad->city || $_REQUEST['Partidos']=='X') {
								$conds[4] = true;
							} else {
								$conds[4] = false;
							}
						}
						// if(!empty($_REQUEST['ubicacion'])) {
							// if($_REQUEST['ubicacion']==strtolower($ad->address_name) || $_REQUEST['ubicacion']=='X') {
								// $conds[7] = true;
							// } else {
								// $conds[7] = false;
							// }
						// }
					 
						if(!empty($_REQUEST['Provincias'])) {
							if($_REQUEST['Provincias']==$ad->region || $_REQUEST['Provincias']=='X') {
								$conds[5] = true;
							} else {
								$conds[5] = false;
							}
						}
						if(!empty($_REQUEST['Paises'])) {
							if($_REQUEST['Paises']==$ad->country || $_REQUEST['Paises']=='X' || ($_REQUEST['Paises']=='Argentina' && $ad->country=='Tigre')) {
								$conds[6] = true;
							} else {
								$conds[6] = false;
							}
						}
						if($conds[0] && $conds[1] && $conds[2] && $conds[3] && $conds[4] && $conds[5] && $conds[6] && $conds[7]) {
							$avisosPel[] = $ad;
						}
					}
					
					$page = ! empty( $_GET['page'] ) ? (int) $_GET['page'] : 1;
					$total = count( $avisosPel ); //total items in array    
					$limit = 15; //per page    
					$totalPages = ceil( $total/ $limit ); //calculate total pages
					$page = max($page, 1); //get 1 page when $_GET['page'] <= 0
					$page = min($page, $totalPages); //get last page when $_GET['page'] > $totalPages
					$offset = ($page - 1) * $limit;
					if( $offset < 0 ) $offset = 0;

					$avisos = array_slice( $avisosPel, $offset, $limit );
					
					foreach($avisos as $ad) {
						$desc = $ad->content;
						if( strlen( $ad->content) > 200) {
							$desc = explode( "\n", wordwrap( $ad->content, 200));
							$desc = $desc[0] . '...';
						}
						$imgP = '';
						foreach($ad->pictures as $foto) {
							if(($foto->picture[0]['featured'])) {
								$imgP = $foto->picture->picture_url;
							}
						}
						
				?>
				<div class="row boxProp">
					<div class="col-xs-2">
						<div class="bloqueImg" style="background-image: url(<?=$imgP;?>);"></div>
					</div>
					<div class="col-xs-7">
						<div class="tituloProp">
							<a href="<?=$base;?>ficha/<?=$ad->id;?>/"><?=$ad->title;?></a>
						</div>
						<div class="descProp">
							<?=$desc;?>
						</div>
					</div>
					<div class="col-xs-3">
						<!-- <div class="precioPorp"><?=$ad->price[0]['currency'];?> <?=$ad->price;?></div> -->
						<div class="precioPorp"><a href="<?=$base;?>ficha/<?=$ad->id;?>/"> <?=$ad->price[0]['currency'];?> <?=$ad->price;?></a></div>
					</div>
				</div>
				<?PHP
					}

					function paginar($actual, $total, $por_pagina, $enlace) {
						$texto = '';
						$total_paginas = ceil($total/$por_pagina);
						$anterior = $actual - 1;
						$posterior = $actual + 1;
						if($total>$por_pagina) {
							$texto = '<ul class="pagination">';
							if ($actual>1)
								$texto .= '<li><a href="'.$enlace.$anterior.'">&laquo;</a></li>';
							else
								$texto .= '<li class="disabled"><a href="" onclick="event.preventDefault();">&laquo;</a></li>';
							for ($i=1; $i<$actual; $i++)
								$texto .= '<li><a href="'.$enlace.$i.'">'.$i.'</a></li>';
							$texto .= '<li class="active"><a href="" onclick="event.preventDefault();">'.$actual.'</a></li>';
							for ($i=$actual+1; $i<=$total_paginas; $i++)
								$texto .= '<li><a href="'.$enlace.$i.'">'.$i.'</a></li>';
							if ($actual<$total_paginas)
								$texto .= '<li><a href="'.$enlace.$posterior.'">&raquo;</a></li>';
							else
								$texto .= '<li class="disabled"><a href="" onclick="event.preventDefault();">&raquo;</a></li>';
							$texto .= '</ul>';
						}
						return $texto;
					}
					$vasrs = http_build_query($_POST);
					$link = $base.'buscador/?'.$vasrs.'&page=';
					
					if( $totalPages != 0 ) {
						echo '<div class="row"><div class="col-md-12"><div class="pagconte">'.paginar($page, $total, $limit, $link).'</div></div></div>';
					}                   
				?>
			</div>
        </div>
	</main>
