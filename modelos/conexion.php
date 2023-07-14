<?php

class Conexion{

	static public function conectar(){

		$link = new PDO("mysql:host=92.249.44.207;dbname=u911849556_inven", "u911849556_inven", "L@LKiE11N|s9");
		
		$link->exec("set names utf8");

		return $link;

	}

}