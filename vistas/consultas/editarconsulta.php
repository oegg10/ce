<?php
include "../../conexion/conexionbd.php";

$id = $_GET['id'];

$sqlcons = "SELECT * FROM consultas WHERE idconsulta = '$id'";
$rsptacons = $conexion->query($sqlcons);
$filas = $rsptacons->fetch_assoc();

include "../header.php";

?>

    <h2 align="center">Modificar Consulta</h2>

    <form action="<?php $_SERVER["PHP_SELF"] ?>" method="POST" autocomplete="off">

        <input type="hidden" name="idconsulta" value="<?php echo $id; ?>">

        Nombre (*): <input type="text" name="nombre" value="<?php echo $filas['nombre']; ?>" placeholder="Nombre completo del paciente" maxlength="100" required>
        CURP: <input type="text" name="curp" value="<?php echo $filas['curp']; ?>" placeholder="CURP del paciente" maxlength="18">
        Expediente: <input type="text" name="expediente" value="<?php echo $filas['expediente']; ?>" placeholder="No. de expediente del paciente" maxlength="10">
        Edad (*): <input type="number" name="edad" value="<?php echo $filas['edad']; ?>" min="1" max="120" required>

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

        Diagnostico (*): <input type="text" name="diagnostico1" value="<?php echo $filas['diagnostico1']; ?>" placeholder="Nombre del paciente" maxlength="100" required>

        Primera vez (*)
        <select name="primvez2" required>
            <option value="" disabled selected>Primera vez</option>
            <option value="NO">NO</option>
            <option value="SI">SI</option>
        </select>

        Diagnostico (*): <input type="text" name="diagnostico2" value="<?php echo $filas['diagnostico2']; ?>" placeholder="Nombre del paciente" maxlength="100">

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

        <input type="submit" name="editar" value="Modificar">

    </form>

    <?php

        if (isset($_POST['editar'])) {
            
            $nombre = $_POST['nombre'];
            $curp = $_POST['curp'];
            $expediente = $_POST['expediente'];
            $edad = $_POST['edad'];
            $sexo = $_POST['sexo'];
            $spss = $_POST['spss'];
            $prospera = $_POST['prospera'];
            $migrante = $_POST['migrante'];
            $indigena = $_POST['indigena'];
            $discapacidad = $_POST['discapacidad'];
            $primvez1 = $_POST['nombre'];
            $diagnostico1 = $_POST['diagnostico1'];
            $primvez2 = $_POST['primvez2'];
            $diagnostico2 = $_POST['diagnostico2'];
            $referido = $_POST['referido'];
            $contrareferido = $_POST['contrareferido'];

            $id = $_POST['id'];

            $sqlmod = "UPDATE consultas SET nombre='$nombre',curp='$curp',expediente='$expediente',edad='$edad',sexo='$sexo',spss='$spss',prospera='$prospera',migrante='$migrante',indigena='$indigena',discapacidad='$discapacidad',primvez1='$primvez1',diagnostico1='$diagnostico1',primvez2='$primvez2',diagnostico2='$diagnostico2',referido='$referido',contrareferido='$contrareferido' WHERE idconsulta='$id'";

        }

    ?>
    
</body>
</html>