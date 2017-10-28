<?php
/**
 * Cálculos estadísticos (Resultado 1) calculos-estadisticos-1-a.php
 *
 * @author    Bartolomé Sintes Marco <bartolome.sintes+mclibre@gmail.com>
 * @copyright 2011 Bartolomé Sintes Marco
 * @license   http://www.gnu.org/licenses/agpl.txt AGPL 3 or later
 * @version   2011-11-16
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

print "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
       "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Cálculos estadísticos (Resultado 1). Repaso 1.
  Ejercicios. PHP. Bartolomé Sintes Marco</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="mclibre-php-soluciones.css" rel="stylesheet" type="text/css"
  title="Color" />
</head>
<body>

<h1>Cálculos estadísticos (Resultado 1)</h1>
<?php

function recoge($var)
{
    $tmp = (isset($_REQUEST[$var])) ? strip_tags(trim(htmlspecialchars($_REQUEST[$var], ENT_QUOTES, "UTF-8"))) : "";
    if (get_magic_quotes_gpc()) {
        $tmp = stripslashes($tmp);
    }
    return $tmp;
}

define('FORM_METHOD', 'get');
define('NUM_MINIMO',  1);
define('NUM_MAXIMO',  20);

$numero       = recoge('numero');
$numeroOk     = false;

if ($numero=="") {
    print "<p class=\"aviso\">No ha escrito el número de valores.</p>\n";
} elseif (!is_numeric($numero)) {
    print "<p class=\"aviso\">No ha escrito el número de valores "
         ."como número.</p>\n";
} elseif (!ctype_digit($numero)) {
    print "<p class=\"aviso\">No ha escrito el número de valores "
         ."como número entero positivo.</p>\n";
} elseif (($numero<NUM_MINIMO)||($numero>NUM_MAXIMO)) {
    print "<p class=\"aviso\">El número de valores debe estar entre "
         .NUM_MINIMO." y ".NUM_MAXIMO.".</p>\n";
} else {
    $numeroOk = true;
}

if ($numeroOk) {
    print "<p>Escriba todos los valores y marque las casillas correspondientes "
        ."a los cálculos que quiere.</p>\n";
    print "<form action=\"calculos-estadisticos-1-b.php\" method=\"".FORM_METHOD."\">\n";
    print "  <table>\n    <tbody>\n";
    for ($i=1; $i<=$numero; $i++) {
        print "      <tr>\n        <td><strong>Número $i</strong>:</td>
        <td><input type=\"text\" name=\"n[$i]\" size=\"6\" maxlength=\"4\" /></td>\n";
        print "      </tr>\n";
    }
    print "    </tbody>\n  </table>
  <p><input type=\"checkbox\" name=\"suma\" />Suma - <input type=\"checkbox\"
    name=\"media\" />Media - <input type=\"checkbox\" name=\"maximo\" />Máximo
    - <input type=\"checkbox\" name=\"minimo\" />Mínimo</p>
  <p class=\"der\">
    <input type=\"submit\" value=\"Contar\" />
    <input type=\"reset\" value=\"Borrar\" />\n</form>\n";
}

print "<p><a href=\"calculos-estadisticos-1.html\">Volver al formulario.</a></p>\n";
?>

<address>
  Esta página forma parte del curso "Páginas web con PHP" disponible en <a
  href="http://www.mclibre.org/">http://www.mclibre.org</a><br />
  Autor: Bartolomé Sintes Marco<br />
  Última modificación de esta página: 16 de noviembre de 2011
</address>
<p class="licencia">El programa PHP que genera esta página está bajo
<a rel="license" href="http://www.gnu.org/licenses/agpl.txt">licencia AGPL 3 o
posterior</a>.</p>
</body>
</html>