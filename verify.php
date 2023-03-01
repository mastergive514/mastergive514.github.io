<?php
 
$captcha = isset($_POST['g-recaptcha-response']) ? $_POST['g-recaptcha-response'] : null;
 
if(!is_null($captcha)){
	$res = json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LfGlcQkAAAAAGEPaurCxkpeNG3q_COVEuG6Ei2A&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']));
	if($res->success === true){
		//CAPTCHA validado!!!
		echo 'Tudo certo =)';
	}
	else{
		echo 'Erro ao validar o captcha!!!';
	}
}
else{
	echo 'Captcha não preenchido!';
}
