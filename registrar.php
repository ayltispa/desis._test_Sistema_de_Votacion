<?php

include "db/db_connection.php";

try {


    if (isset($_POST['rut']) && $_POST['rut']) {
        // do user authentication as per your requirements 
        // ... 
        // ... 
        // based on successful authentication
        $inputNombre = $_POST['inputNombre'];
        $inputApellido = $_POST['inputApellido'];
        $inputAlias = $_POST['inputAlias'];
        $rut = $_POST['rut'];
        $inputEmail = $_POST['inputEmail'];
        $inputRegion = $_POST['inputRegion'];
        $inputComuna = $_POST['inputComuna'];
        $inputCandidato = $_POST['inputCandidato'];
        if (isset($_POST['webCheck']) && $_POST['webCheck']) {
            $webCheck = 1;
        } else {
            $webCheck = 0;
        }
        if (isset($_POST['tvCheck']) && $_POST['tvCheck']) {
            $tvCheck = 1;
        } else {
            $tvCheck = 0;
        }
        if (isset($_POST['rsCheck']) && $_POST['rsCheck']) {
            $rsCheck = 1;
        } else {
            $rsCheck = 0;
        }
        if (isset($_POST['amigoCheck']) && $_POST['amigoCheck']) {
            $amigoCheck = 1;
        } else {
            $amigoCheck = 0;
        }

        // Check connection
        $conn = OpenCon();

        $sql = "SELECT rut FROM db_votacion.registro_votaciones where rut ='" . $rut . "'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            echo json_encode(
                array(
                    'success' => 0,
                    'msg' => "El Rut ingrsado ya existe"
                )
            );
        } else {

            $sql = "INSERT INTO `db_votacion`.`registro_votaciones`
        (
        `rut`,
        `nombre`,
        `apellido`,
        `alias`,
        `email`,
        `region`,
        `comuna`,
        `candidato`,
        `op_web`,
        `op_tv`,
        `op_rs`,
        `op_amigo`)
        VALUES
        (
        '" . $rut . "',
        '" . $inputNombre . "',
        '" . $inputApellido . "',
        '" . $inputAlias . "',
        '" . $inputEmail . "',
        " . $inputRegion . ",
        " . $inputComuna . ",
        " . $inputCandidato . ",
        " . $webCheck . ",
        " . $tvCheck . ",
        " . $rsCheck . ",
        " . $amigoCheck . ")
        ";

            if ($conn->query($sql) == true) {
                echo json_encode(array('success' => 1));
            } else {
                echo json_encode(
                    array(
                        'success' => 0,
                        'msg' => "Error al ingrsar el voto. Error:" . $conn->error . "\n"
                    )
                );
            }
        }
        CloseCon($conn);
    } else {
        echo json_encode(
            array(
                'success' => 0,
                'msg' => "Error Inesperado."
            )
        );
    }
} catch (Exception $e) {
    echo json_encode(
        array(
            'success' => 0,
            'msg' => "Error: " . $e->getMessage() . "\n"
        )
    );
}
