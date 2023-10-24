<?php


$conn = OpenCon();

$sql = "SELECT id_candidato, concat(nombre, ' ' ,apellidos) as candidato FROM db_votacion.candidatos
order by apellidos";
$result_candidatos = $conn->query($sql);
