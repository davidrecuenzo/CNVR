<?php

echo "<h4>SERVIDOR 1</h4>";

// Parámetros de conexión a la base de datos
$host = "10.1.2.%";
$db = "cnvr";
$user = "s1";
$pass = "xxxx";
$link = "";

// Conectar al servidor MySQL
if (!$link = mysql_connect($host,$user,$pass)) {
    exit("Imposible conectar a la base de datos.");
}

// Seleccionar base de datos
if (!mysql_select_db($db,$link)) {
    exit("Imposible seleccionar base de datos: ".mysql_error($link));
}

// Seleccionar datos de la tabla "servers"
$query = "SELECT * FROM servers;";
if (!$result = mysql_query($query,$link)) {
    exit("Error al seleccionar datos de la base de datos: ".mysql_error($link));
}

// Imprimir tabla
?>
<p>Ultimos Accesos:</p>
<table style="border: 1px solid #fff;">
<tr><th>ID</th><th>Nombre</th></tr>
<?php

while ($row = mysql_fetch_array($result)) {
    echo "<tr><td>" . $row['id'] . "</td><td>" . $row['nombre_server'] . "</td></tr>";
}

?>
</table>
<?php

// Cerrar conexión MySQL
mysql_close();

?>
<p>-- FIN --</p>