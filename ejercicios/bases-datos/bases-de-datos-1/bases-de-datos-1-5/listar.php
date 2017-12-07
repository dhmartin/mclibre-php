<?php
/**
 * Bases de datos 1-5 - listar.php
 *
 * @author    Bartolomé Sintes Marco <bartolome.sintes+mclibre@gmail.com>
 * @copyright 2017 Bartolomé Sintes Marco
 * @license   http://www.gnu.org/licenses/agpl.txt AGPL 3 or later
 * @version   2017-12-05
 * @link      http://www.mclibre.org
 *
 *  This program is free software: you can redistribute it and/or modify
 *  it under the terms of the GNU Affero General Public License as published by
 *  the Free Software Foundation, either version 3 of the License, or
 *  any later version.
 *
 *  This program is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU Affero General Public License for more details.
 *
 *  You should have received a copy of the GNU Affero General Public License
 *  along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

require_once "biblioteca.php";

$db = conectaDb();
cabecera("Listar", MENU_VOLVER);

$consulta = "SELECT * FROM $dbTabla";
$result = $db->query($consulta);

print "    <p>Listado completo de registros:</p>\n";
print "\n";
print "    <table class=\"conborde franjas\">\n";
print "      <thead>\n";
print "        <tr>\n";
print "          <th>Nombre</th>\n";
print "          <th>Apellidos</th>\n";
print "        </tr>\n";
print "      </thead>\n";
print "      <tbody>\n";
foreach ($result as $valor) {
    print "        <tr>\n";
    print "          <td>$valor[nombre]</td>\n";
    print "          <td>$valor[apellidos]</td>\n";
    print "        </tr>\n";
}
print "      </tbody>\n";
print "    </table>\n";

$db = null;
pie();
