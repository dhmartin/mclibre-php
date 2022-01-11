<?php
/**
 * Siete y medio (1) - cartas-3-2.php
 *
 * @author    Bartolomé Sintes Marco <bartolome.sintes+mclibre@gmail.com>
 * @copyright 2021 Bartolomé Sintes Marco
 * @license   http://www.gnu.org/licenses/agpl.txt AGPL 3 or later
 * @version   2021-12-02
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

// Se accede a la sesión
session_name("cartas-3");
session_start();

if (!isset($_SESSION["baraja"])) {
    header("Location:cartas-3-1.php");
    exit;
}

function recoge($var, $m = "")
{
    if (!isset($_REQUEST[$var])) {
        $tmp = (is_array($m)) ? [] : "";
    } elseif (!is_array($_REQUEST[$var])) {
        $tmp = trim(htmlspecialchars($_REQUEST[$var], ENT_QUOTES, "UTF-8"));
    } else {
        $tmp = $_REQUEST[$var];
        array_walk_recursive($tmp, function (&$valor) {
            $valor = trim(htmlspecialchars($valor, ENT_QUOTES, "UTF-8"));
        });
    }
    return $tmp;
}

$accion = recoge("accion");
if ($accion == "otra" && $_SESSION["total"] < 7.5) {
    $carta = $_SESSION["baraja"][count($_SESSION["baraja"]) - 1];
    $_SESSION["jugador"][]  = $carta;
    unset($_SESSION["baraja"][count($_SESSION["baraja"]) - 1]);
    $tmp = substr($carta, 1);
    if ($tmp == "11" || $tmp == "12" || $tmp == "13") {
        $puntos = 0.5;
    } else {
        $puntos = $tmp;
    }
    $_SESSION["total"] += $puntos;
} elseif ($accion == "reiniciar") {
    session_destroy();
}

header("Location:cartas-3-1.php");