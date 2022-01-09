<?php
/**
 * @author    Bartolomé Sintes Marco - bartolome.sintes+mclibre@gmail.com
 * @license   https://www.gnu.org/licenses/agpl-3.0.txt AGPL 3 or later
 * @link      https://www.mclibre.org
 */

require_once "../../comunes/biblioteca.php";

session_name($cfg["sessionName"]);
session_start();

if (!isset($_SESSION["conectado"]) || $_SESSION["conectado"] < NIVEL_ADMINISTRADOR) {
    header("Location:../../index.php");
    exit;
}

$pdo = conectaDb();

cabecera("Usuarios - Modificar 2", MENU_USUARIOS, PROFUNDIDAD_2);

$id = recoge("id");

if ($id == "") {
    print "    <p class=\"aviso\">No se ha seleccionado ningún registro.</p>\n";
} else {
    $consulta = "SELECT COUNT(*) FROM $cfg[dbUsuariosTabla]
                 WHERE id=:id";
    $resultado = $pdo->prepare($consulta);
    $resultado->execute([":id" => $id]);

    if (!$resultado) {
        print "    <p class=\"aviso\">Error en la consulta.</p>\n";
    } elseif ($resultado->fetchColumn() == 0) {
        print "    <p class=\"aviso\">Registro no encontrado.</p>\n";
    } else {
        $consulta = "SELECT * FROM $cfg[dbUsuariosTabla]
                     WHERE id=:id";
        $resultado = $pdo->prepare($consulta);
        $resultado->execute([":id" => $id]);

        if (!$resultado) {
            print "    <p class=\"aviso\">Error al seleccionar el registro. SQLSTATE[{$pdo->errorCode()}]: {$pdo->errorInfo()[2]}</p>\n";
        } else {
            $valor = $resultado->fetch();
            if ($valor["usuario"] == $cfg["rootName"] && !$cfg["rootPasswordModificable"]) {
                print "    <p class=\"aviso\">Este usuario no se puede modificar.</p>\n";
            } else {
                print "    <form action=\"modificar-3.php\" method=\"$cfg[formMethod]\">\n";
                print "      <p>Modifique los campos que desee:</p>\n";
                print "\n";
                print "      <table>\n";
                print "        <tbody>\n";
                print "          <tr>\n";
                print "            <td>Usuario:</td>\n";
                print "            <td><input type=\"text\" name=\"usuario\" size=\"$cfg[dbUsuariosTamUsuario]\" maxlength=\"$cfg[dbUsuariosTamUsuario]\" value=\"$valor[usuario]\" autofocus></td>\n";
                print "          </tr>\n";
                print "          <tr>\n";
                print "            <td>Contraseña:</td>\n";
                print "            <td><input type=\"text\" name=\"password\" size=\"$cfg[dbUsuariosTamPassword]\" maxlength=\"$cfg[dbUsuariosTamPassword]\"></td>\n";
                print "          </tr>\n";
                print "          <tr>\n";
                print "            <td>Nivel:</td>\n";
                print "            <td>\n";
                print "              <select name=\"nivel\">\n";
                foreach ($cfg["usuariosNiveles"] as $indice => $valor) {
                    print "                <option value=\"$valor\">$indice</option>\n";
                }
                print "              </select>\n";
                print "            </td>\n";
                print "          </tr>\n";
                print "        </tbody>\n";
                print "      </table>\n";
                print "\n";
                print "      <p>\n";
                print "        <input type=\"hidden\" name=\"id\" value=\"$id\">\n";
                print "        <input type=\"submit\" value=\"Actualizar\">\n";
                print "        <input type=\"reset\" value=\"Reiniciar formulario\">\n";
                print "      </p>\n";
                print "    </form>\n";
            }
        }
    }
}

$pdo = null;

pie();
