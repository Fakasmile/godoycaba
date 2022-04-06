<?PHP
	error_reporting(E_ALL);
	ini_set('display_errors', '1');
	ini_set('memory_limit', '-1');
	
	function sxml_append(SimpleXMLElement $to, SimpleXMLElement $from) {
		$toDom = dom_import_simplexml($to);
		$fromDom = dom_import_simplexml($from);
		$toDom->appendChild($toDom->ownerDocument->importNode($fromDom, true));
	}
	
	$simpleXML = file_get_contents('https://feeds.adinco.net/6957/ar_adinco.xml');
	$newXML = "<?xml version='1.0' encoding='utf-8'?><ads></ads>";
	
	$adsc = new SimpleXMLElement($simpleXML);
	$ads = new SimpleXMLElement($newXML);
	$cant = 0;
	$ciudades = array();
	$regiones = array();
	$paises = array();
	$direcciones = array();
	foreach($adsc->ad as $ad) {
		if($ad->real_estate_info->real_estate_id=='6957') {
			$city = strtolower($ad->city);
			if(!in_array($city,$ciudades)) {
				$ciudades[] = $city;
			}
			$region = strtolower($ad->region);
			if(!in_array($region,$regiones)) {
				$regiones[] = $region;
			}
			$country = strtolower($ad->country);
			if(!in_array($country,$paises)) {
				$paises[] = $country;
			}
			sxml_append($ads, $ad);
		}
	}
	@unlink('info.xml');
	file_put_contents('info.xml',$ads->asXML());
	@unlink('ciudades.json');
	file_put_contents('ciudades.json',json_encode($ciudades));
	@unlink('regiones.json');
	file_put_contents('regiones.json',json_encode($regiones));
	@unlink('paises.json');
	file_put_contents('paises.json',json_encode($paises));
	
	echo "listo.";
