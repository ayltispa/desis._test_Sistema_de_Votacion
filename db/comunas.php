<?php

include "db_connection.php";

if (isset($_POST['select'])) {

    $select = $_POST['select'];

    $conn = OpenCon();

    $sql = "SELECT 
comuna_id,
comuna_nombre AS comuna, 
region_nombre AS region 
FROM comunas
INNER JOIN provincias ON 
comunas.provincia_id = provincias.provincia_id
INNER JOIN regiones ON
provincias.region_id = regiones.region_id
WHERE regiones.region_id  =" . $select;

    $result_comunas = $conn->query($sql);

    echo "<option selected disabled value=''>Seleccionar...</option>";

    while ($row = $result_comunas->fetch_assoc()) {

        echo "<option value = '" . utf8_encode($row['comuna_id']) . "'>" . utf8_encode($row['comuna']) . "</option>";
    }

    CloseCon($conn);
}
