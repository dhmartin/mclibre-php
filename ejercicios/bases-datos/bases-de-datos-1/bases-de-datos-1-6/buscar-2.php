<?php
/**
 * @author    Bartolomé Sintes Marco - bartolome.sintes+mclibre@gmail.com
 * @license   https://www.gnu.org/licenses/agpl-3.0.txt AGPL 3 or later
 * @link      https://www.mclibre.org
 */

require_once "biblioteca.php";

$pdo = conectaDb();

cabecera("Buscar 2", MENU_VOLVER);

$nombre    = recoge("nombre");
$apellidos = recoge("apellidos");

// Comprobamos los datos recibidos procedentes de un formulario
$nombreOk    = false;
$apellidosOk = false;

if (mb_strlen($nombre, "UTF-8") > $cfg["formPersonasMaxNombre"]) {
    print "    <p class=\"aviso\">El nombre no puede tener más de $cfg[formPersonasMaxNombre] caracteres.</p>\n";
    print "\n";
} else {
    $nombreOk = true;
}

if (mb_strlen($apellidos, "UTF-8") > $cfg["formPersonasMaxApellidos"]) {
    print "    <p class=\"aviso\">Los apellidos no pueden tener más de $cfg[formPersonasMaxApellidos] caracteres.</p>\n";
    print "\n";
} else {
    $apellidosOk = true;
}

if ($nombreOk && $apellidosOk) {
    $consulta = "SELECT * FROM $cfg[tablaPersonas]
                 WHERE nombre LIKE :nombre
                 AND apellidos LIKE :apellidos";

    $resultado = $pdo->prepare($consulta);
    if (!$resultado) {
        print "    <p class=\"aviso\">Error al preparar la consulta. SQLSTATE[{$pdo->errorCode()}]: {$pdo->errorInfo()[2]}</p>\n";
    } elseif (!$resultado->execute([":nombre" => "%$nombre%", ":apellidos" => "%$apellidos%"])) {
        print "    <p class=\"aviso\">Error al ejecutar la consulta. SQLSTATE[{$pdo->errorCode()}]: {$pdo->errorInfo()[2]}</p>\n";
    } else {
        print "    <p>Registros encontrados:</p>\n";
        print "\n";
        print "    <table class=\"conborde franjas\">\n";
        print "      <thead>\n";
        print "        <tr>\n";
        print "          <th>Nombre</th>\n";
        print "          <th>Apellidos</th>\n";
        print "        </tr>\n";
        print "      </thead>\n";
        foreach ($resultado as $registro) {
            print "      <tr>\n";
            print "        <td>$registro[nombre]</td>\n";
            print "        <td>$registro[apellidos]</td>\n";
            print "      </tr>\n";
        }
        print "    </table>\n";
    }
}

pie();
