<?php
/**
 * @author Escriba aquí su nombre
 */

require_once "../../comunes/biblioteca.php";

session_name($cfg["sessionName"]);
session_start();

if (!isset($_SESSION["conectado"])) {
    header("Location:../../index.php");
    exit;
}

$pdo = conectaDb();

cabecera("Personas - Buscar 2", MENU_PERSONAS, PROFUNDIDAD_2);

$nombre    = recoge("nombre");
$apellidos = recoge("apellidos");
$telefono  = recoge("telefono");
$correo    = recoge("correo");
$ordena    = recogeValores("ordena", $cfg["dbPersonasColumnasOrden"], "nombre ASC");

$consulta = "SELECT COUNT(*) FROM $cfg[dbPersonasTabla]
             WHERE nombre LIKE :nombre
             AND apellidos LIKE :apellidos
             AND telefono LIKE :telefono
             AND correo LIKE :correo";
$resultado = $pdo->prepare($consulta);
$resultado->execute([":nombre" => "%$nombre%", ":apellidos" => "%$apellidos%", ":telefono" => "%$telefono%", ":correo" => "%$correo%"]);

if (!$resultado) {
    print "    <p class=\"aviso\">Error en la consulta. SQLSTATE[{$pdo->errorCode()}]: {$pdo->errorInfo()[2]}</p>\n";
} elseif ($resultado->fetchColumn() == 0) {
    print "    <p class=\"aviso\">No se han encontrado registros.</p>\n";
} else {
    $consulta = "SELECT * FROM $cfg[dbPersonasTabla]
                 WHERE nombre LIKE :nombre
                 AND apellidos LIKE :apellidos
                 AND telefono LIKE :telefono
                 AND correo LIKE :correo
                 ORDER BY $ordena";
    $resultado = $pdo->prepare($consulta);
    $resultado->execute([":nombre" => "%$nombre%", ":apellidos" => "%$apellidos%", ":telefono" => "%$telefono%", ":correo" => "%$correo%"]);

    if (!$resultado) {
        print "    <p class=\"aviso\">Error al seleccionar los registros. SQLSTATE[{$pdo->errorCode()}]: {$pdo->errorInfo()[2]}</p>\n";
    } else {
        print "    <form action=\"$_SERVER[PHP_SELF]\" method=\"$cfg[formMethod]\">\n";
        print "      <p>\n";
        print "        <input type=\"hidden\" name=\"nombre\" value=\"$nombre\">\n";
        print "        <input type=\"hidden\" name=\"apellidos\" value=\"$apellidos\">\n";
        print "      </p>\n";
        print "\n";
        print "      <p>Registros encontrados:</p>\n";
        print "\n";
        print "      <table class=\"conborde franjas\">\n";
        print "        <thead>\n";
        print "          <tr>\n";
        print "            <th>\n";
        print "              <button name=\"ordena\" value=\"nombre ASC\" class=\"boton-invisible\">\n";
        print "                <img src=\"../../img/abajo.svg\" alt=\"A-Z\" title=\"A-Z\" width=\"15\" height=\"12\">\n";
        print "              </button>\n";
        print "              Nombre\n";
        print "              <button name=\"ordena\" value=\"nombre DESC\" class=\"boton-invisible\">\n";
        print "                <img src=\"../../img/arriba.svg\" alt=\"Z-A\" title=\"Z-A\" width=\"15\" height=\"12\">\n";
        print "              </button>\n";
        print "            </th>\n";
        print "            <th>\n";
        print "              <button name=\"ordena\" value=\"apellidos ASC\" class=\"boton-invisible\">\n";
        print "                <img src=\"../../img/abajo.svg\" alt=\"A-Z\" title=\"A-Z\" width=\"15\" height=\"12\">\n";
        print "              </button>\n";
        print "              Apellidos\n";
        print "              <button name=\"ordena\" value=\"apellidos DESC\" class=\"boton-invisible\">\n";
        print "                <img src=\"../../img/arriba.svg\" alt=\"Z-A\" title=\"Z-A\" width=\"15\" height=\"12\">\n";
        print "              </button>\n";
        print "            </th>\n";
        print "            <th>\n";
        print "              <button name=\"ordena\" value=\"telefono ASC\" class=\"boton-invisible\">\n";
        print "                <img src=\"../../img/abajo.svg\" alt=\"A-Z\" title=\"A-Z\" width=\"15\" height=\"12\">\n";
        print "              </button>\n";
        print "              Teléfono\n";
        print "              <button name=\"ordena\" value=\"telefono DESC\" class=\"boton-invisible\">\n";
        print "                <img src=\"../../img/arriba.svg\" alt=\"Z-A\" title=\"Z-A\" width=\"15\" height=\"12\">\n";
        print "              </button>\n";
        print "            </th>\n";
        print "            <th>\n";
        print "              <button name=\"ordena\" value=\"correo ASC\" class=\"boton-invisible\">\n";
        print "                <img src=\"../../img/abajo.svg\" alt=\"A-Z\" title=\"A-Z\" width=\"15\" height=\"12\">\n";
        print "              </button>\n";
        print "              Correo\n";
        print "              <button name=\"ordena\" value=\"correo DESC\" class=\"boton-invisible\">\n";
        print "                <img src=\"../../img/arriba.svg\" alt=\"Z-A\" title=\"Z-A\" width=\"15\" height=\"12\">\n";
        print "              </button>\n";
        print "            </th>\n";
        print "          </tr>\n";
        print "        </thead>\n";
        print "        <tbody>\n";
        foreach ($resultado as $valor) {
            print "          <tr>\n";
            print "            <td>$valor[nombre]</td>\n";
            print "            <td>$valor[apellidos]</td>\n";
            print "            <td>$valor[telefono]</td>\n";
            print "            <td>$valor[correo]</td>\n";
            print "          </tr>\n";
        }
        print "        </tbody>\n";
        print "      </table>\n";
        print "    </form>\n";
    }
}

$pdo = null;

pie();