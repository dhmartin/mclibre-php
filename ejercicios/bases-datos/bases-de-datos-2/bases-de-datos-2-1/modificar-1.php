<?php
/**
 * @author    Bartolomé Sintes Marco - bartolome.sintes+mclibre@gmail.com
 * @license   https://www.gnu.org/licenses/agpl-3.0.txt AGPL 3 or later
 * @link      https://www.mclibre.org
 */

require_once "biblioteca.php";

$pdo = conectaDb();

cabecera("Modificar 1", MENU_VOLVER);

$consulta  = "SELECT COUNT(*) FROM $cfg[dbPersonasTabla]";
$resultado = $pdo->query($consulta);

if (!$resultado) {
    print "    <p class=\"aviso\">Error en la consulta.</p>\n";
} elseif ($resultado->fetchColumn() == 0) {
    print "    <p class=\"aviso\">No se ha creado todavía ningún registro.</p>\n";
} else {
    $consulta  = "SELECT * FROM $cfg[dbPersonasTabla]";
    $resultado = $pdo->query($consulta);

    if (!$resultado) {
        print "    <p class=\"aviso\">Error al seleccionar todos los registros. SQLSTATE[{$pdo->errorCode()}]: {$pdo->errorInfo()[2]}</p>\n";
    } else {
        print "    <form action=\"modificar-2.php\" method=\"$cfg[formMethod]\">\n";
        print "      <p>Indique el registro que quiera modificar:</p>\n";
        print "\n";
        print "      <table class=\"conborde franjas\">\n";
        print "        <thead>\n";
        print "          <tr>\n";
        print "            <th>Modificar</th>\n";
        print "            <th>Nombre</th>\n";
        print "            <th>Apellidos</th>\n";
        print "          </tr>\n";
        print "        </thead>\n";
        print "        <tbody>\n";
        foreach ($resultado as $valor) {
            print "          <tr>\n";
            print "            <td class=\"centrado\"><input type=\"radio\" name=\"id\" value=\"$valor[id]\"></td>\n";
            print "            <td>$valor[nombre]</td>\n";
            print "            <td>$valor[apellidos]</td>\n";
            print "          </tr>\n";
        }
        print "        </tbody>\n";
        print "      </table>\n";
        print "\n";
        print "      <p>\n";
        print "        <input type=\"submit\" value=\"Modificar registro\">\n";
        print "        <input type=\"reset\" value=\"Reiniciar formulario\">\n";
        print "      </p>\n";
        print "    </form>\n";
    }
}

$pdo = null;

pie();
