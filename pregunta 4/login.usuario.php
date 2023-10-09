<?php
    $user = $_POST["user"];
    $pswd = $_POST["password"];
    $nombre = "vacnom";
    $paterno = "vacape";
    session_start();

    include "conexion.inc.php";
    $resultado = mysqli_query($con, "SELECT * FROM usuario WHERE ci = '$user' AND contrasenia = '$pswd'");

    // Verificar si hay al menos una fila que cumple con la condición
    if (mysqli_num_rows($resultado) > 0) {
        // Obtener la primera fila como un array asociativo
        $fila = mysqli_fetch_assoc($resultado);

        // Asignar valores a variables
        $ci = $fila['ci'];
        $nombre = $fila['nombre'];
        $paterno = $fila['paterno'];
        $materia = "vacio";
        
        $alumno_rol = mysqli_query($con, "SELECT * FROM alumno WHERE ci_alumno = '$ci'");
        $docente_rol = mysqli_query($con, "SELECT * FROM docente WHERE ci_docente = '$ci'");
        if (mysqli_num_rows($alumno_rol) > 0) {
            $alumnofila = mysqli_fetch_assoc($alumno_rol);
            $_SESSION["rol"] = "Alumno";
            switch ($alumnofila['depto']) {
                case '01':
                    $_SESSION["depto"] = "Chuquisaca";
                    break;
                case '02':
                    $_SESSION["depto"] = "La Paz";
                    break;
                case '03':
                    $_SESSION["depto"] = "Cochabamba";
                    break;
                case '04':
                    $_SESSION["depto"] = "Oruro";
                    break;
                default:
                    $_SESSION["depto"] = "Otro";
                    break;
            }
            $_SESSION["promedio"] = $alumnofila['promedio'];
            $_SESSION["idmat"] = $alumnofila['idmat'];
        }
        if (mysqli_num_rows($docente_rol) > 0) {
            $docentefila = mysqli_fetch_assoc($docente_rol);
            $_SESSION["rol"] = "Docente";
            $_SESSION["idmat"] = $docentefila['idmat'];
        }

        $materia = $_SESSION["idmat"];
        $materia_consulta = mysqli_query($con, "SELECT * FROM materia WHERE idmat = '$materia'");
        $materiafila = mysqli_fetch_assoc($materia_consulta);
        $_SESSION["materia"] = $materiafila['descripcion'];

        $_SESSION["user"] = $nombre." ".$paterno;
        header("Location: index.php");
        exit;

        // Puedes usar las variables como necesites
        //echo "CI: $ci, Nombre: $nombre, Apellido: $paterno";
    } else {
        // No se encontraron filas que cumplan con la condición
        
        $_SESSION["user"] = "nohay";
        header("Location: login.php");
        exit;
    }
?>
