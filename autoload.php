<?php

session_start();

function __autoload($classe)
{
	$classe = str_replace("\\", "/", $classe);
	if( file_exists("$classe.class.php") ) {
		include("$classe.class.php");
	} else {
		echo "Classe nao encontrada";
	}
}