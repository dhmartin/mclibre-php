<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>
    Convertidor de centímetros a kilómetros, metros y centímetros (Formulario)
    if ... elseif ... else ... Con formularios.
    Ejercicios. PHP. Bartolomé Sintes Marco. www.mclibre.org
  </title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="mclibre-php-ejercicios.css" title="Color">
</head>

<body>
  <h1>Convertidor de centímetros a kilómetros, metros y centímetros (Formulario)</h1>

  <form action="if-else-7-2.php" method="get">
    <p>Escriba una distancia en centímetros (0 &le; distancia &lt; 1.000.000.000)
      para convertirla a kilómetros, metros y centímetros.
    </p>

    <p><label>Distancia: <input type="number" name="distancia" min="0" max="999999999"> cm</label></p>

    <p>
      <input type="submit" value="Convertir">
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
