<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpMailer/src/Exception.php';
require 'phpMailer/src/PHPMailer.php';
require 'phpMailer/src/SMTP.php';

class ximiomailer
{
    private $error_mail;
    function __construct ()
    {
	}
	
	function validarEmail($email){
	   $mail_correcto = 0;
	   //compruebo unas cosas primeras
	   if ((strlen($email) >= 6) && (substr_count($email,"@") == 1) && (substr($email,0,1) != "@") && (substr($email,strlen($email)-1,1) != "@")){
		  if ((!strstr($email,"'")) && (!strstr($email,"\"")) && (!strstr($email,"\\")) && (!strstr($email,"\$")) && (!strstr($email," "))) {
			 //miro si tiene caracter .
			 if (substr_count($email,".")>= 1){
				//obtengo la terminacion del dominio
				$term_dom = substr(strrchr ($email, '.'),1);
				//compruebo que la terminación del dominio sea correcta
				if (strlen($term_dom)>1 && strlen($term_dom)<5 && (!strstr($term_dom,"@")) ){
				   //compruebo que lo de antes del dominio sea correcto
				   $antes_dom = substr($email,0,strlen($email) - strlen($term_dom) - 1);
				   $caracter_ult = substr($antes_dom,strlen($antes_dom)-1,1);
				   if ($caracter_ult != "@" && $caracter_ult != "."){
					  $mail_correcto = 1;
				   }
				}
			 }
		  }
	   }
	   if ($mail_correcto)
		  return 1;
	   else
		  return 0;
	}
	
	public function cleanInput($input) {
		$search = array(
		'@<script[^>]*?>.*?</script>@si',   // Strip out javascript
		'@<[\/\!]*?[^<>]*?>@si',            // Strip out HTML tags
		'@<style[^>]*?>.*?</style>@siU',    // Strip style tags properly
		'@<![\s\S]*?--[ \t\n\r]*>@'         // Strip multi-line comments
		);

		$output = preg_replace($search, '', $input);
		return $output;
	}
	
	

	public function replazarTexto($texto, $string, $replazo) {
		return str_replace($string,$replazo,$texto);
	}

	public function sanitize($input) {
		$output = $input;
		if (is_array($input)) {
			foreach($input as $var=>$val) {
				$output[$var] = $this->sanitize($val);
			}
		}
		else {
			if (get_magic_quotes_gpc()) {
				$input = stripslashes($input);
			}
			$input  = $this->cleanInput($input);
			$output = ($input);
		}
		return $output;
	}

	public function validarForm($args, $data) {
		$campos = explode(",", $args);
		$err = false;
		foreach($campos as $campo) {
			if($data[$campo]=="") {
				$err = true;
			}
			if($campo=="email") {
				if(!$this->validarEmail($data[$campo])) {
					$err = true;
				}
			}
		}

		return !$err;
	}
	
	public function enviar($datos, $to, $subject, $template,$from='no-responder@godoyasesores.com',$cuerpo='') {
			
		$_POST = $this->sanitize($datos);
		
		//~ error_reporting(E_ALL);
		//~ ini_set('display_errors', '1');
		if(!empty($to)) {
			if (!class_exists('PHPMailer')) {
				//~ include("phpMailer/class.phpmailer.php");
				//~ include("phpMailer/class.smtp.php"); // note, this is optional - gets called from main class if not already loaded
			}

			$fName = 'Godoy Asesores';
			if($cuerpo=='') {
				$file = file_get_contents($template, 'r');
				$message = $file;
				foreach($datos as $val=>$dato) {
					$message = $this->replazarTexto($message, '['.$val.']', ($dato));
				}
			} else {
				$message = $cuerpo;
			}
			$message = utf8_decode( $message);


			$mail = new PHPMailer();

			$mail->IsSMTP();
			$mail->SMTPAuth = true; // authentication enabled
			$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
			$mail->Host = "c2320231.ferozo.com";
			$mail->Port = 465; // or 587
			
			//~ $mail->SMTPDebug = 4;
			
			$mail->Username   = "no-responder@godoyasesores.com";  // GMAIL username
			$mail->Password   = "HLD3@gL4iA";			// GMAIL password
			$direcciones = explode(',', $to);
			foreach($direcciones as $dir) {
				$mail->AddAddress(trim($dir));
			}


			$mail->From	   = $from;
			$mail->FromName   = $fName;
			$mail->Subject	= $subject;
			$mail->MsgHTML($message);

			$mail->IsHTML(true); // send as HTML ESTO INDICA SI EL CUERPO DEBE SER INTERPRETADO COMO HTML o PLAIN TEXT
			
			if($mail->Send()) {
				return 'true';
			} else {
				$this->error_mail = $mail->ErrorInfo;
				return $mail->ErrorInfo;
			}
			
			
		} else {
			return 'false';
		}
	}
	
	public function getError() {
		return $this->error_mail;
	}

}
