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
        
        $alumno_rol = mysqli_query($con, "SELECT * FROM alumno WHERE ci_alumno = '$ci'");
        $docente_rol = mysqli_query($con, "SELECT * FROM docente WHERE ci_docente = '$ci'");
        if (mysqli_num_rows($alumno_rol) > 0) {
            $_SESSION["rol"] = "Alumno";
        }
        if (mysqli_num_rows($docente_rol) > 0) {
            $_SESSION["rol"] = "Docente";
        }

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
