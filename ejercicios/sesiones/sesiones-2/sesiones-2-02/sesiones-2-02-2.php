<?php
/**
 * Sesiones (2) 01 - sesiones-2-02-2.php
 *
 * @author    Bartolomé Sintes Marco <bartolome.sintes+mclibre@gmail.com>
 * @copyright 2018 Bartolomé Sintes Marco
 * @license   http://www.gnu.org/licenses/agpl.txt AGPL 3 or later
 * @version   2018-11-15
 * @link      https://www.mclibre.org
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

session_name("sesiones-2-02");
session_start();

function recoge($var, $m = "")
{
    if (!isset($_REQUEST[$var])) {
        $tmp = is_array($m) ? [] : "";
    } elseif (!is_array($_REQUEST[$var])) {
        $tmp = trim(htmlspecialchars($_REQUEST[$var]));
    } else {
        $tmp = $_REQUEST[$var];
        array_walk_recursive($tmp, function (&$valor) {
            $valor = trim(htmlspecialchars($valor));
        });
    }
    return $tmp;
}

$palabra1 = recoge("palabra1");

if ($palabra1 == "") {
    $_SESSION["aviso1"] = "No ha escrito nada";
    header("Location:sesiones-2-02-1.php");
    exit;
} elseif (!ctype_alnum($palabra1)) {
    $_SESSION["aviso1"] = "No ha escrito una sola palabra con letras y números";
    header("Location:sesiones-2-02-1.php");
    exit;
} else {
    unset($_SESSION["aviso1"]);
    $_SESSION["palabra1"] = $palabra1;
    header("Location:sesiones-2-02-3.php");
    exit;
}
