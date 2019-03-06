<?php
include "../conexion/conexionbd.php";

//Si no esta vacío el formulario
if (!empty($_POST)) {
    
    $nombre = mysqli_real_escape_string($conexion,$_POST['nombre']);
    $curp = mysqli_real_escape_string($conexion,$_POST['curp']);
    $expediente = mysqli_real_escape_string($conexion,$_POST['expediente']);
    $edad = mysqli_real_escape_string($conexion,$_POST['edad']);
    $sexo = mysqli_real_escape_string($conexion,$_POST['sexo']);
    $spss = mysqli_real_escape_string($conexion,$_POST['spss']);
    $prospera = mysqli_real_escape_string($conexion,$_POST['prospera']);
    $migrante = mysqli_real_escape_string($conexion,$_POST['migrante']);
    $indigena = mysqli_real_escape_string($conexion,$_POST['indigena']);
    $discapacidad = mysqli_real_escape_string($conexion,$_POST['discapacidad']);
    $primvez1 = mysqli_real_escape_string($conexion,$_POST['nombre']);
    $diagnostico1 = mysqli_real_escape_string($conexion,$_POST['diagnostico1']);
    $primvez2 = mysqli_real_escape_string($conexion,$_POST['primvez2']);
    $diagnostico2 = mysqli_real_escape_string($conexion,$_POST['diagnostico2']);
    $referido = mysqli_real_escape_string($conexion,$_POST['referido']);
    $contrareferido = mysqli_real_escape_string($conexion,$_POST['contrareferido']);
    $idusuario = 1;

    //Consulta de inserción
    $sqlins = "INSERT INTO consultas (nombre,curp,expediente,edad,sexo,spss,prospera,migrante,indigena,discapacidad,primvez1,diagnostico1,primvez2,diagnostico2,referido,contrareferido,idusuario) VALUES ('$nombre','$curp','$expediente','$edad','$sexo','$spss','$prospera','$migrante','$indigena','$discapacidad','$primvez1','$diagnostico1','$primvez2','$diagnostico2','$referido','$contrareferido','$idusuario')";

    $rspta = $conexion->query($sqlins);

    if ($rspta > 0) {
        echo "<script>
              alert('Consulta guardada');
              window.location = 'index.php';
          </script>";
    }else{
        echo "<script>
              alert('Error al guardar');
              window.location = 'index.php';
          </script>";
    }

}

$cons = "SELECT * FROM consultas";
$rsptacons = $conexion->query($cons);

include "header.php";

?>

    <h2 align="center">Registro de Consulta Externa</h2>

    <form action="<?php $_SERVER["PHP_SELF"] ?>" method="POST" autocomplete="off">
    
        Nombre (*): <input type="text" name="nombre" placeholder="Nombre completo del paciente" maxlength="100" required>
        CURP: <input type="text" name="curp" placeholder="CURP del paciente" maxlength="18">
        Expediente: <input type="text" name="expediente" placeholder="No. de expediente del paciente" maxlength="10">
        Edad (*): <input type="number" name="edad" min="1" max="120" required>

        Sexo (*)
        <select name="sexo" required>
            <option value="" disabled selected>Sexo</option>
            <option value="M">Masculino</option>
            <option value="F">Femenino</option>
          </select>
        
        SPSS (*)
        <select name="spss" required>
            <option value="" disabled selected>SPSS</option>
            <option value="NO">NO</option>
            <option value="SI">SI</option>
        </select>

        Prospera (*)
        <select name="prospera" required>
            <option value="" disabled selected>Prospera</option>
            <option value="NO">NO</option>
            <option value="SI">SI</option>
        </select>

        Migrante (*)
        <select name="migrante" required>
            <option value="" disabled selected>Migrante</option>
            <option value="NO">NO</option>
            <option value="SI">SI</option>
        </select>

        Indigena (*)
        <select name="indigena" required>
            <option value="" disabled selected>Indigena</option>
            <option value="NO">NO</option>
            <option value="SI">SI</option>
        </select>

        Discapacidad (*)
        <select name="discapacidad" required>
            <option value="" disabled selected>Discapacidad</option>
            <option value="NO">NO</option>
            <option value="SI">SI</option>
        </select>

        Primera vez (*)
        <select name="primvez1" required>
            <option value="" disabled selected>Primera vez</option>
            <option value="NO">NO</option>
            <option value="SI">SI</option>
        </select>

        Diagnostico (*): <input type="text" name="diagnostico1" placeholder="Nombre del paciente" maxlength="100" required>

        Primera vez (*)
        <select name="primvez2" required>
            <option value="" disabled selected>Primera vez</option>
            <option value="NO">NO</option>
            <option value="SI">SI</option>
        </select>

        Diagnostico (*): <input type="text" name="diagnostico2" placeholder="Nombre del paciente" maxlength="100">

        Referido (*)
        <select name="referido" required>
            <option value="" disabled selected>Referido</option>
            <option value="NO">NO</option>
            <option value="SI">SI</option>
        </select>

        Contrareferido (*)
        <select name="contrareferido" required>
            <option value="" disabled selected>Contrareferido</option>
            <option value="NO">NO</option>
            <option value="SI">SI</option>
        </select>

        <input type="submit" name="guardar" value="Guardar">

    </form>

    <hr>

    <h4 align="center">Consultas</h4>

    <table border="1">
        <thead>
            <tr>
                <th>Fecha|Hora</th>
                <th>Nombre</th>
                <th>CURP</th>
                <th>Expediente</th>
                <th>Edad</th>
                <th>Sexo</th>
                <th>SPSS</th>
                <th>Prospera</th>
                <th>Migrante</th>
                <th>Indigena</th>
                <th>Discapacidad</th>
                <th>Prim. Vez</th>
                <th>Diagnostico</th>
                <th>Prim. Vez</th>
                <th>Diagnostico</th>
                <th>Referido</th>
                <th>Contrareferido</th>
                <th>Médico</th>
                <th>Editar</th>
            </tr>
        </thead>
        <tbody>
            
                <?php

                    while ($f = $rsptacons->fetch_array(MYSQLI_BOTH)) {
                       echo "<tr>
                            <td>".$f['fecha']."</td>
                            <td>".$f['nombre']."</td>
                            <td>".$f['curp']."</td>
                            <td>".$f['expediente']."</td>
                            <td>".$f['edad']."</td>
                            <td>".$f['sexo']."</td>
                            <td>".$f['spss']."</td>
                            <td>".$f['prospera']."</td>
                            <td>".$f['migrante']."</td>
                            <td>".$f['indigena']."</td>
                            <td>".$f['discapacidad']."</td>
                            <td>".$f['primvez1']."</td>
                            <td>".$f['diagnostico1']."</td>
                            <td>".$f['primvez2']."</td>
                            <td>".$f['diagnostico2']."</td>
                            <td>".$f['referido']."</td>
                            <td>".$f['contrareferido']."</td>
                            <td>".$f['idusuario']."</td>
                            <td><a href='consultas/editarconsulta.php?id=".$f['idconsulta']."'>Editar</a></td>
                       </tr>";
                    }

                ?>
            
        </tbody>
    </table>
    
</body>
</html>