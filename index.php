<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema de Votación</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
</head>

<body>

    <div class="container">


        <p class="h2">Formulario de votación:</p>

        <form id="registerForm" method="post" class="row g-3 needs-validation" novalidate>

            <div class="col-md-4">
                <label for="inputNombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="inputNombre" name="inputNombre" required>
                <div class="valid-feedback">
                    OK!
                </div>
            </div>
            <div class="col-md-4">
                <label for="inputApellido" class="form-label">Apellido</label>
                <input type="text" class="form-control" id="inputApellido" name="inputApellido" required>
                <div class="valid-feedback">
                    Ok!
                </div>
            </div>
            <div class="col-md-4">
                <label for="inputAlias" class="form-label">Alias</label>
                <input type="text" class="form-control" id="inputAlias" name="inputAlias" pattern="[A-Za-z0-9_]{5,50}" placeholder="Minimo 5 caracteres, letra y numeros" required>
                <div class="valid-feedback">
                    Ok!
                </div>
                <div class="invalid-feedback">
                    Alias no valido!
                </div>
            </div>
            <div class="col-md-6">
                <label for="rut" class="form-label">Rut</label>
                <input type="text" class="form-control" name="rut" id="rut" placeholder="12.345.678-8" required>
                <div class="valid-feedback">
                    Ok!
                </div>
                <div class="invalid-feedback">
                    Rut no valido!
                </div>
            </div>
            <div class="col-md-6">
            </div>
            <div class="col-md-6">
                <label for="inputEmail" class="form-label">Email</label>
                <input type="email" class="form-control" id="inputEmail" name="inputEmail" required>
                <div class="invalid-feedback">
                    Email no valido!
                </div>
            </div>
            <div class="col-md-6">
            </div>
            <div class="col-md-6">
                <label for="inputRegion" class="form-label">Región</label>
                <select class="form-select" id="inputRegion" name="inputRegion" required>
                    <option selected disabled value="">Seleccionar...</option>
                    <?php

                    include "db/regiones.php";



                    if ($result_regiones->num_rows > 0) {
                        // output data of each row
                        while ($row = $result_regiones->fetch_assoc()) {

                    ?>
                            <option value="<?php echo utf8_encode($row["region_id"]); ?>"><?php echo utf8_encode($row["regiones"]); ?></option>
                    <?php
                        }
                        CloseCon($conn);
                    }

                    ?>
                </select>
                <div class="invalid-feedback">
                    Porfavor seleccione una opción
                </div>
            </div>
            <div class="col-md-6">
                <label for="inputComuna" class="form-label">Comuna</label>
                <select class="form-select" id="inputComuna" name="inputComuna" required>
                    <option selected disabled value="">Seleccionar...</option>

                </select>
                <div class="invalid-feedback">
                    Porfavor seleccione una opción
                </div>
            </div>
            <div class="col-md-6">
                <label for="inputCandidato" class="form-label">Candidato</label>
                <select class="form-select" id="inputCandidato" name="inputCandidato" required>
                    <option selected disabled value="">Seleccionar...</option>
                    <?php

                    include "db/candidatos.php";



                    if ($result_candidatos->num_rows > 0) {
                        // output data of each row
                        while ($row = $result_candidatos->fetch_assoc()) {

                    ?>
                            <option value="<?php echo utf8_encode($row["id_candidato"]); ?>"><?php echo utf8_encode($row["candidato"]); ?></option>
                    <?php
                        }
                        CloseCon($conn);
                    }

                    ?>
                </select>
                <div class="invalid-feedback">
                    Porfavor seleccione una opción
                </div>
            </div>
            <div class="col-md-6">

            </div>
            <div class="col-12">
                <label id="titChecks" class="form-label">Cómo se enteró de nosotros:</label>
            </div>

            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Si" id="webCheck" name="webCheck">
                <label class="form-check-label" for="webCheck">
                    Web
                </label>
                <div class="invalid-feedback">
                    Selecionar almenos 2 opciones.
                </div>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Si" id="tvCheck" name="tvCheck">
                <label class="form-check-label" for="tvCheck">
                    TV
                </label>
                <div class="invalid-feedback">
                    Selecionar almenos 2 opciones.
                </div>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Si" id="rsCheck" name="rsCheck">
                <label class="form-check-label" for="rsCheck">
                    Redes Sociales
                </label>
                <div class="invalid-feedback">
                    Selecionar almenos 2 opciones.
                </div>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Si" id="amigoCheck" name="amigoCheck">
                <label class="form-check-label" for="amigoCheck">
                    Amigo
                </label>
                <div class="invalid-feedback">
                    Selecionar almenos 2 opciones.
                </div>
            </div>


            <div class="col-12">
                <button type="submit" class="btn btn-primary" name="votoBtn" id="votoBtn">Votar</button>
            </div>
            <div style="position: fixed; z-index: 1; left: 0;  top: 0; width: 50%; " id="liveAlertPlaceholder"></div>
    </div>

    </form>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>


    <script src="js/jquery.rut.js"></script>

    <script type="text/javascript">
        function rutValidation() {
            var result = false
            $("#rut").rut({
                formatOn: 'blur',
                validateOn: 'blur'
            }).on('rutInvalido',
                function() {
                    //rut.setCustomValidity("RUT Inválido");
                    $("#rut").addClass("is-invalid")
                    $("#rut").removeClass("is-valid")
                }).on('rutValido',
                function() {
                    $("#rut").removeClass("is-invalid")
                    $("#rut").addClass("is-valid")
                    result = false
                });

            return result
        }


        var countChecked = function() {
            var n = $("input:checked").length;
            var inputChks = $("input[type=checkbox]");
            var input_all = $('input:checked');

            if (n >= 2) {
                for (var i = 0; i < n; i++) {

                    $("#" + input_all[i].id).removeClass("is-invalid")
                    $("#" + input_all[i].id).addClass("is-valid")
                }
                return n
            } else if (n == 1) {
                for (var i = 0; i < n; i++) {
                    $("#" + input_all[i].id).addClass("is-invalid")
                    $("#" + input_all[i].id).removeClass("is-valid")
                }
                for (var i = 0; i < inputChks.length; i++) {
                    $("#" + inputChks[i].id).removeClass("is-valid")
                }
                return n
            }
        };

        $("input[type=checkbox]").on("click", countChecked);
    </script>

    <script type="text/javascript">
        const alertPlaceholder = document.getElementById('liveAlertPlaceholder')
        const appendAlert = (message, type) => {
            const wrapper = document.createElement('div')
            wrapper.innerHTML = [
                `<div class="alert alert-${type} alert-dismissible" role="alert">`,
                `   <div>${message}</div>`,
                '   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>',
                '</div>'
            ].join('')

            alertPlaceholder.append(wrapper)
        }

        $("#inputRegion").on("change", function(e) {
                var str = "";
                $("select option:selected").each(function() {
                    var region_id = $(this).val();
                    if (region_id != "") {
                        $('#inputComuna')
                            .find('option')
                            .remove();
                        e.preventDefault();
                        $.ajax({
                            type: "POST",
                            url: 'db/comunas.php',
                            data: 'select=' + region_id,
                            success: function(response) {

                                $('#inputComuna').append(response);

                            }
                        });
                    }
                });
            })
            .trigger("change");
    </script>


    <script type="text/javascript">
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (() => {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            const forms = document.querySelectorAll('.needs-validation')
            var myCheckValidation = false

            var myRutValidation = rutValidation()

            // Loop over them and prevent submission
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (countChecked() >= 2) {
                        myCheckValidation = true
                    }
                    myRutValidation = $.validateRut($("#rut").val())

                    if (!form.checkValidity() || !myCheckValidation || !myRutValidation) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated');
                }, false)
            })
        })()
    </script>

    <script>
        $('#registerForm').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: 'registrar.php',
                data: $("#registerForm").serialize(),
                success: function(response) {
                    var jsonData = JSON.parse(response);
                    // user is logged in successfully in the back-end 
                    // let's redirect 
                    if (jsonData.success == "1") {
                        appendAlert("Voto registrado con exito", 'success')

                        setTimeout(function() {
                            window.location.reload();
                        }, 3000);

                    } else {
                        appendAlert(jsonData.msg, 'danger')
                    }
                }
            });
        });
    </script>

</body>

</html>