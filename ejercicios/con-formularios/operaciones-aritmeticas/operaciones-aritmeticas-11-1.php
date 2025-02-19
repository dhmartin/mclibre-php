<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>
    Reloj (Formulario).
    Operaciones aritméticas. Con formularios.
    Ejercicios. PHP. Bartolomé Sintes Marco. www.mclibre.org
  </title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="mclibre-php-ejercicios.css" title="Color">
</head>

<body>
  <h1>Reloj (Formulario)</h1>

  <form action="operaciones-aritmeticas-11-2.php" method="get">

  <table>
    <tr>
      <td><label for="horas">Horas:</label></td>
      <td><input type="number" name="horas" min="0" max="11" value="3" id="horas"></td>
    </tr>
    <tr>
      <td><label for="minutos">Minutos:</label></td>
      <td><input type="number" name="minutos" min="0" max="59" value="30" id="minutos"></td>
    </tr>
  </table>

    <p>
      <input type="submit" value="Mostrar">
      <input type="reset">
    </p>
  </form>

  <footer>
    <p class="ultmod">
      Última modificación de esta página:
      <time datetime="2019-10-24">24 de octubre de 2019</time>
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
