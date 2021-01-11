<!DOCTYPE html>
<html>
<head>
<h1>Proyecto final de la segunda parte de CNVR</h1>
</head>
<body>
<?php
echo "<h2>Servidor 2 </h2>\n";
echo "<h4>Listado de la tabla Servers de la base de datos CNVR</h4>\n";
// Conectarse a y seleccionar una base de datos de MySQL llamada cnvr
// Nombre de host: 10.1.2.17, nombre de usuario: tu_usuario, contraseña: tu_contraseña, bd: cnvr
$mysqli = new mysqli('10.1.2.17', 's2', 'xxxx', 'cnvr');

// ¡Oh, no! Existe un error 'connect_errno', fallando así el intento de conexión
if ($mysqli->connect_errno) {
    // La conexión falló. ¿Que vamos a hacer? 
    // Se podría contactar con uno mismo (¿email?), registrar el error, mostrar una bonita página, etc.
    // No se debe revelar información delicada

    // Probemos esto:
    echo "Lo sentimos, este sitio web está experimentando problemas.";

    // Algo que no se debería de hacer en un sitio público, aunque este ejemplo lo mostrará
    // de todas formas, es imprimir información relacionada con errores de MySQL -- se podría registrar
    echo "Error: Fallo al conectarse a MySQL debido a: \n";
    echo "Errno: " . $mysqli->connect_errno . "\n";
    echo "Error: " . $mysqli->connect_error . "\n";
    
    // Podría ser conveniente mostrar algo interesante, aunque nosotros simplemente saldremos
    exit;
}

// Realizar una consulta SQL
$sql = "SELECT * FROM servers";
if (!$resultado = $mysqli->query($sql)) {
    // ¡Oh, no! La consulta falló. 
    echo "Lo sentimos, este sitio web está experimentando problemas.";

    // De nuevo, no hacer esto en un sitio público, aunque nosotros mostraremos
    // cómo obtener información del error
    echo "Error: La ejecución de la consulta falló debido a: \n";
    echo "Query: " . $sql . "\n";
    echo "Errno: " . $mysqli->errno . "\n";
    echo "Error: " . $mysqli->error . "\n";
    exit;
}
// Imprimir la tabla
echo "<ul>\n";
while ($server = $resultado->fetch_assoc()) {
    echo "<li>";
    echo $server['id'] . ' ' . $server['nombre_server'];
    echo "</li>\n";
}
echo "</ul>\n";

// El script automáticamente liberará el resultado y cerrará la conexión
// a MySQL cuando finalice, aunque aquí lo vamos a hacer nostros mismos
$resultado->free();
$mysqli->close();
?>
</body>
</html>
