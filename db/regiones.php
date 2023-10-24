
<?php

include "db_connection.php";

$conn = OpenCon();

$sql = "SELECT region_id, CONCAT(region_ordinal , ' - ' , region_nombre) as regiones FROM db_votacion.regiones";
$result_regiones = $conn->query($sql);
