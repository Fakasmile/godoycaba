<?PHP
	$query = (!empty($_GET['q']))?$_GET['q']:'home';
	
	$accesos = explode("/", $query);
	$base = '/';

	$cssFiles = array();
	$jsFiles = array();
	$jsToExecute = '';
	header('Content-Type: text/html; charset=utf-8');
	$site_description = 'Inmobiliaria, venta de bienes raices';
	$tituloPage = "GODOY Asesores Inmobiliarios";
	$footer = "templates/includes/footer.php";
	$mainclass = "white";
	$classHom = "";
	$classNos = "";
	$classSer = "";
	$classInm = "";
	$classBus = "";
	$classCon = "";
	$classSerpa = "";
	$classTas = "";

	switch ($accesos[0]) {
		case "tasaciones":
			$tituloPage = "Tasaciones/ GODOY Asesores Inmobiliarios";
			$file = "templates/tasaciones.php";
			 
			$footer = "templates/includes/footercont.php";
			break;
		
		case "serparte":
			$tituloPage = "Ser Parte/ GODOY Asesores Inmobiliarios";
			$file = "templates/serparte.php";
			$classSerpa = " active";
			break;
		case "servicios":
			$tituloPage = "Servicios / GODOY Asesores Inmobiliarios";
			$file = "templates/services.php";
			$mainclass = "white";
			$classSer = " active";
			break;
		case "inmuebles":
			$tituloPage = "Inmuebles / GODOY Asesores Inmobiliarios";
			$file = "templates/real_estate.php";
			$classInm = " active";
			break;
		case "buscador":
			$tituloPage = "Buscador / GODOY Asesores Inmobiliarios";
			$file = "templates/search.php";
			$footer = "templates/includes/footersearch.php";
			$classBus = " active";
			break;
		case "ficha":
				
			$simpleXML = file_get_contents('info.xml');
			$adsc = new SimpleXMLElement($simpleXML);
			$tipoprop = array();
			$prop = array();
			foreach($adsc->ad as $ad) {
				if($ad->id==$accesos[1]) {
					$prop = $ad;
				}
			}
			$tipoOp = ($prop->type=='For Sale')?'Venta':'Alquiler';

			$imgP = '';
			foreach($prop->pictures as $foto) {
				if(($foto->picture[0]['featured'])) {
					$imgP = $foto->picture->picture_url;
				}
			}
			$tituloPage = $prop->title." / GODOY Asesores Inmobiliarios";
			$file = "templates/ficha.php";
			$footer = "templates/includes/footersearch.php";
			$classBus = " active";
			break;
		case "contact":
			$tituloPage = "Contacto / GODOY Asesores Inmobiliarios";
			$file = "templates/contact.php";
			$footer = "templates/includes/footercont.php";
			$classCon = " active";
			break;
		default:
			$classHom = " active";
			$file = "templates/home.php";
	}
	include "templates/includes/header.php";
	
	include $file;
	
	include $footer;
?>