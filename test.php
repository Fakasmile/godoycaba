<?PHP
	$url = "http://ar.maixon.com/export/ar_maixon.xml";
	$timeout = 120;

	$curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, $url);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, $timeout);

	$response = curl_exec($curl);
	file_put_contents(__DIR__ . "/ar_maixon.xml", $response);
