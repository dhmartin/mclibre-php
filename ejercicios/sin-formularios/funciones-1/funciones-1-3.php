<?php
/**
 * funciones (1) 3 - funciones-1-03.php
 *
 * @author    Bartolomé Sintes Marco <bartolome.sintes+mclibre@gmail.com>
 * @copyright 2024 Bartolomé Sintes Marco
 * @license   http://www.gnu.org/licenses/agpl.txt AGPL 3 or later
 * @version   2024-11-28
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
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>
    Dos filas de cartas.
    Funciones (1). Sin formularios.
    Ejercicios. PHP. Bartolomé Sintes Marco. www.mclibre.org
  </title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="mclibre-php-ejercicios.css" title="Color">
</head>

<body>
  <h1>Dos filas de cartas</h1>

  <p>Actualice la página para mostrar dos nuevas filas de cartas.</p>

<?php

function generaCartasRand(int $n)
{
    $palos = ["c", "d", "p", "t"];
    $m = [];
    for ($i = 0; $i < $n; $i++) {
        $m[] = $palos[rand(0, 3)] . rand(1, 13);
    }
    return $m;
}

function pintaCartas(array $cartas)
{
    print "  <p>\n";
    foreach ($cartas as $carta) {
        print "    <img src=\"img/cartas/$carta.svg\" alt=\"$carta\" width=\"70\">\n";

    }
    print "  </p>\n";
    print "\n";
}

$n       = rand(5, 10);

$valores = generaCartasRand($n, 1, 6);
print "<h2>$n cartas</h2>\n";
print "\n";
pintaCartas($valores);

$valores = generaCartasRand($n, 1, 6);
print "<h2>$n cartas más</h2>\n";
print "\n";
pintaCartas($valores);
?>

  <footer>
    <p class="ultmod">
      Última modificación de esta página:
      <time datetime="2024-11-28">28 de noviembre de 2024</time>
    </p>

    <p class="licencia">
      Este programa forma parte del curso <strong><a href="https://www.mclibre.org/consultar/php/">Programación
      web en PHP</a></strong> de <a href="https://www.mclibre.org/" rel="author">Bartolomé Sintes Marco</a>.<br>
      El programa PHP que genera esta página se distribuye bajo
      <a rel="license" href="http://www.gnu.org/licenses/agpl.txt">licencia AGPL 3 o posterior</a>.
    </p>
  </footer>
</body>
</html>
