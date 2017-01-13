<?php

//Connexion à la base de donnée site_cv
$pdoCV = new PDO('mysql:host=localhost;dbname=site_cv', 'root', '', array(
	PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
	PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
))

;
?>
