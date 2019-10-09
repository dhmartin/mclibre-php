<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>
    Convertidor de temperaturas Celsius / Fahrenheit (Formulario).
    if ... elseif ... else ... Con formularios.
    Ejercicios. PHP. Bartolomé Sintes Marco. www.mclibre.org
  </title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="mclibre-php-ejercicios.css" title="Color">
</head>

<body>
  <h1>Convertidor de temperaturas Celsius / Fahrenheit (Formulario)</h1>

  <form action="if-else-6-2.php" method="get">
    <p>Escriba una temperatura en grados Celsius o Fahrenheit (-273.15 &le; Celsius &lt; 10.000;
      -459.67 &le; Fahrenheit &lt; 10.000) para convertila a la otra unidad (Fahrenheit o Celsius).</p>

    <table>
      <tbody>
        <tr>
          <td><strong>Temperatura:</strong></td>
          <td>
            <input type="number" name="temperatura" min="-500" max="10000" step="any">
            <select name="unidad">
              <option value="c" selected>Celsius</option>
              <option value="f">Fahrenheit</option>
            </select>
          </td>
        </tr>
      </tbody>
    </table>

    <p>
      <input type="submit" value="Convertir">
      <input type="reset" value="Borrar">
    </p>
  </form>

  <footer>
    <p class="ultmod">
      Última modificación de esta página:
      <time datetime="2018-10-23">23 de octubre de 2018</time>
    </p>

    <p class="licencia">
      Esta página forma parte del curso <a href="http://www.mclibre.org/consultar/php/">
      <cite>Programación web en PHP</cite></a> por <cite>Bartolomé Sintes Marco</cite>.<br>
      y se distribuye bajo una <a rel="license" href="https://creativecommons.org/licenses/by-sa/4.0/deed.es_ES">
      Licencia Creative Commons Reconocimiento-CompartirIgual 4.0 Internacional (CC BY-SA 4.0)</a>.</p>
  </footer>
</body>
</html>
