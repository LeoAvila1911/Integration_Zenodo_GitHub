<?php

include_once 'Database.php';

class ModeloUsuarios{

	/*=============================================
	MOSTRAR USUARIOS
	=============================================*/

	static public function mdlMostrarUsuarios($tabla, $item, $valor){

		if($item != null){

			$stmt = Database::connect()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			$aux = $stmt -> fetch();

			Database::disconnect();

			return $aux;

		}else{

			$stmt = Database::connect()->prepare("SELECT * FROM $tabla");

			$stmt -> execute();

			$aux = $stmt -> fetchAll();

			Database::disconnect();

			return $aux;

		}
		
	}

	/*=============================================
	REGISTRO DE USUARIO
	=============================================*/

	static public function mdlIngresarUsuario($tabla, $datos){

		$stmt = Database::connect()->prepare("INSERT INTO $tabla(nombre, usuario, password, perfil, foto) VALUES (:nombre, :usuario, :password, :perfil, :foto)");

		$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
		$stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);
		$stmt->bindParam(":perfil", $datos["perfil"], PDO::PARAM_STR);
		$stmt->bindParam(":foto", $datos["foto"], PDO::PARAM_STR);

		$status = $stmt->execute();

		Database::disconnect();
		
		if($status){

			return "ok";	

		}else{

			return "error";
		
		}

	}

	/*=============================================
	EDITAR USUARIO
	=============================================*/

	static public function mdlEditarUsuario($tabla, $datos){
	
		$stmt = Database::connect()->prepare("UPDATE $tabla SET nombre = :nombre, password = :password, perfil = :perfil, foto = :foto WHERE usuario = :usuario");

		$stmt -> bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt -> bindParam(":password", $datos["password"], PDO::PARAM_STR);
		$stmt -> bindParam(":perfil", $datos["perfil"], PDO::PARAM_STR);
		$stmt -> bindParam(":foto", $datos["foto"], PDO::PARAM_STR);
		$stmt -> bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);

		$status = $stmt -> execute();
		
		Database::disconnect();

		if($status){

			return "ok";
		
		}else{

			return "error";	

		}

	}

	/*=============================================
	ACTUALIZAR USUARIO
	=============================================*/

	static public function mdlActualizarUsuario($tabla, $item1, $valor1, $item2, $valor2){

		$stmt = Database::connect()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE $item2 = :$item2");

		$stmt -> bindParam(":".$item1, $valor1, PDO::PARAM_STR);
		$stmt -> bindParam(":".$item2, $valor2, PDO::PARAM_STR);

		$status = $stmt->execute();

		Database::disconnect();
		
		if($status){

			return "ok";
		
		}else{

			return "error";	

		}

	}

	/*=============================================
	BORRAR USUARIO
	=============================================*/

	static public function mdlBorrarUsuario($tabla, $datos){

		$stmt = Database::connect()->prepare("DELETE FROM $tabla WHERE id = :id");

		$stmt -> bindParam(":id", $datos, PDO::PARAM_INT);

		$status = $stmt->execute();

		Database::disconnect();
		
		if($status){

			return "ok";
		
		}else{

			return "error";	

		}

	}

}