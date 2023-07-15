<?php

include_once 'database.php';

class ModeloCategorias{

	/*=============================================
	CREAR CATEGORIA
	=============================================*/

	static public function mdlIngresarCategoria($tabla, $datos){

		$stmt = Database::connect()->prepare("INSERT INTO $tabla(categoria) VALUES (:categoria)");

		$stmt->bindParam(":categoria", $datos, PDO::PARAM_STR);

		$status = $stmt->execute();

		Database::disconnect();

		if($status){

			return "ok";

		}else{

			return "error";
		
		}

	}

	/*=============================================
	MOSTRAR CATEGORIAS
	=============================================*/

	static public function mdlMostrarCategorias($tabla, $item, $valor){

		if($item != null){

			$stmt = Database::connect()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			Database::disconnect();

			return $stmt -> fetch();

		}else{

			$stmt = Database::connect()->prepare("SELECT * FROM $tabla");

			$stmt -> execute();

			Database::disconnect();

			return $stmt -> fetchAll();

		}

	}

	/*=============================================
	EDITAR CATEGORIA
	=============================================*/

	static public function mdlEditarCategoria($tabla, $datos){

		$stmt = Database::connect()->prepare("UPDATE $tabla SET categoria = :categoria WHERE id = :id");

		$stmt -> bindParam(":categoria", $datos["categoria"], PDO::PARAM_STR);
		$stmt -> bindParam(":id", $datos["id"], PDO::PARAM_INT);

		$status = $stmt->execute();

		Database::disconnect();

		if($status){

			return "ok";

		}else{

			return "error";
		
		}

	}

	/*=============================================
	BORRAR CATEGORIA
	=============================================*/

	static public function mdlBorrarCategoria($tabla, $datos){

		$stmt = Database::connect()->prepare("DELETE FROM $tabla WHERE id = :id");

		$stmt -> bindParam(":id", $datos, PDO::PARAM_INT);

		$status = $stmt -> execute();

		Database::disconnect();

		if($status){

			return "ok";
		
		}else{

			return "error";	

		}

	}

}

