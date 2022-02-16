<?php
/**
 * @author    Bartolomé Sintes Marco - bartolome.sintes+mclibre@gmail.com
 * @license   https://www.gnu.org/licenses/agpl-3.0.txt AGPL 3 or later
 * @link      https://www.mclibre.org
 */

require_once "../comunes/biblioteca.php";
require_once "../comunes/demo.php";

session_name($cfg["sessionName"]);
session_start();

if (!isset($_SESSION["conectado"]) || $_SESSION["nivel"] < NIVEL_ADMINISTRADOR) {
    header("Location:../index.php");
    exit;
}

$borrar = recoge("borrar");
$demo   = recoge("demo");

if ($borrar != "Sí") {
    header("Location:index.php");
    exit;
}

$pdo = conectaDb();

cabecera("Administrador - Borrar todo 2", MENU_ADMINISTRADOR, PROFUNDIDAD_1);

borraTodo();

if ($demo == "Sí") {
    insertaDemo();
}

$pdo = null;

pie();
