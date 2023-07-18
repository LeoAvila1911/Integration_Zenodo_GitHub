<?php

/**
 * Clase utilitaria que maneja la conexion/desconexion a la base de datos
 * mediante las funciones PDO (PHP Data Objects).
 * Utiliza el patron de diseno singleton para el manejo de la conexion.
 * @author dleon
 */
class Database
{

    //Propiedades estaticas con la informacion de la conexion (DSN):

    //    private static $dbName = 'u911849556_gestion';
    //    private static $dbHost = 'localhost';
    //    private static $dbUsername = 'u911849556_gestion';
    //    private static $dbUserPassword = 'OJNGH|GR';

    private static $dbName = 'u911849556_inventario';
    private static $dbHost = '92.249.44.207';
    private static $dbUsername = 'u911849556_inventario';
    private static $dbUserPassword = 't!3Jw4G1f1J2';

    //Propiedad para control de la conexion:
    private static $conexion = null;

    /**
     * No se permite instanciar esta clase, se utilizan sus elementos
     * de tipo estatico.
     */
    public function __construct()
    {
        exit('No se permite instanciar esta clase.');
    }

    /**
     * Metodo estatico que crea una conexion a la base de datos.
     * @return type
     */
    public static function connect()
    {
        // Una sola conexion para toda la aplicacion (singleton):
        if (null == self::$conexion) {
            try {
                self::$conexion = new PDO("mysql:host=" . self::$dbHost . ";" . "dbname=" . self::$dbName, self::$dbUsername, self::$dbUserPassword);
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }
        return self::$conexion;
    }

    /**
     * Metodo estatico para desconexion de la bdd.
     */
    public static function disconnect($funcion)
    {
        error_log("contador de desconexiones ". $funcion);

        self::$conexion = null;
    }
}
