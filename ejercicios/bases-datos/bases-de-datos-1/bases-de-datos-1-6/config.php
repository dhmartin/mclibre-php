<?php
/**
 * @author    Bartolomé Sintes Marco - bartolome.sintes+mclibre@gmail.com
 * @license   http://www.gnu.org/licenses/agpl.txt AGPL 3 or later
 * @link      https://www.mclibre.org
 */

// OPCIONES DISPONIBLES PARA EL ADMINISTRADOR DE LA APLICACIÓN

// Base de datos utilizada por la aplicación

$cfg["dbMotor"] = SQLITE;                                     // Valores posibles: MYSQL o SQLITE

// Configuración para SQLite

$cfg["sqliteDatabase"] = "/home/barto/mclibre/tmp/mclibre/mclibre-base-datos-1-6.sqlite";  // Ubicación de la base de datos

// Configuración para MySQL

$cfg["mysqlHost"]     = "mysql:host=localhost";               // Nombre de host
$cfg["mysqlUser"]     = "mclibre_base_datos_1_6";             // Nombre de usuario
$cfg["mysqlPassword"] = "";                                   // Contraseña de usuario
$cfg["mysqlDatabase"] = "mclibre_base_datos_1_6";             // Nombre de la base de datos
