<?php
	error_reporting(0);
	ini_set('display_errors', '0');
	include "../classMailer.php";
	
	$resF = array();
	$resF['res'] = false;
	$resF['message'] = 'Action not found.';
	
	$accion = (!empty($_REQUEST['accion']))?$_REQUEST['accion']:null;
	
	switch($accion) {
		case "sendMessageE":
			if(!empty($_REQUEST['email'])) {
				$mensaje = '<br>
				Nueva consulta:<br>
				<b>Name:</b> '.$_REQUEST['name'].'<br>
				<b>Phone:</b> '.$_REQUEST['phone'].'<br>
				<b>Email:</b> '.$_REQUEST['email'].'<br>
				<b>Asunto:</b> '.$_REQUEST['subject'].'<br>
				<b>Mensaje:</b> '.$_REQUEST['message'].'<br>
				';
				$resu = false;
				
				$mailer = new ximiomailer();
				$datos = array('mensaje'=>$mensaje);
				
				$resu = $mailer->enviar($datos, 'info@godoyasesores.com', 'Nueva consulta desde godoyasesores.com', 'emails/enviaMail.html');
				
				if ($resu) {
					$resF['res'] = true;
					$resF['message'] = 'Thanks for your message.';
				} else {
					$resF['message'] = 'Cant send message.';
				}
			} else {
				$resF['message'] = 'Some fields are empty..';
			}
			break;
		default:
			$resF['res'] = false;
			$resF['message'] = 'Action not found.';
	}
	echo json_encode(utf8ize($resF));

	function utf8ize($d) {
		if (is_array($d)) {
			foreach ($d as $k => $v) {
				$d[$k] = utf8ize($v);
			}
		} else if (is_string ($d)) {
			return utf8_encode($d);
		}
		return $d;
	}

