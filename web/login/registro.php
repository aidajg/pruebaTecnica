<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Centro "Blue Lagoon"</title>
    <link rel="stylesheet" href="../css/registro.css">
</head>
<body>

<?php
require_once 'conexion.php';


if($_SERVER['REQUEST_METHOD'] == 'POST'){

    try{
        //validación de datos vacíos
        if (!empty($_POST['nombre']) && !empty($_POST['correo']) && !empty($_POST['telefono'])) {
           //se valida el formato del correo electrónico
            if (!filter_var($_POST['correo'], FILTER_VALIDATE_EMAIL)){
                echo "<p style='color:red;' id='error'>Correo electrónico inválido. </p>";
                echo "<msg2>Prueba con los siguientes formatos:</msg2>";
                echo "<ul>";
                echo "<li>ejemplo@gmail.com</li>";
                echo "<li><td>ejemplo@outlook.es</li>";
                echo "<li><td>ejemplo@hotmail.com</li>";
                echo "</ul>";
                echo "<br><button type='submit'><a href='form.php'>Volver atrás</a></button><br>";
            }else if(strlen($_POST['telefono']) < 9 || strlen($_POST['telefono']) > 9 ){
                //se valida la longitud del teléfono
                echo "<p style='color:red;' id='tlf'>Teléfono no válido. </p>";
                echo "<msg>Debe contener 9 dígitos.</msg>";
                echo "<br><button type='submit'><a href='form.php'>Volver atrás</a></button><br>";
        
            }else{
            $nombre = htmlspecialchars($_POST['nombre']);
            $correo = htmlspecialchars($_POST['correo']);
            $telefono = htmlspecialchars($_POST['telefono']);

            // Comprobación de registros ya existentes en bd
            $repetidoQuery = $conexion->prepare('SELECT * FROM alumnado WHERE correo = :correo');
            $repetidoQuery->bindParam(':correo', $correo);
            $repetidoQuery->execute();

            $alumnoRepetido = $repetidoQuery->fetchAll(PDO::FETCH_ASSOC);
            
            if($alumnoRepetido){
                //registro ya existe
                echo '<br><p id="repetido"> Alumno ya registrado.</p>';
                echo "<br><button type='submit'><a href='form.php'>Volver atrás</a></button><br>";
            }else{
                //se inserta el alumno nuevo
                $consulta = $conexion->prepare('INSERT INTO alumnado (nombre, correo, telefono) values (:nombre, :correo, :telefono)');
                $consulta->bindParam(':nombre', $nombre);
                $consulta->bindParam(':correo', $correo);
                $consulta->bindParam(':telefono', $telefono);
                $consulta->execute();
    
                echo '<br><p id="exito"> Alumno <txt style="color:rgb(234, 206, 84);">' . $nombre . '</txt> registrado correctamente!</p>';
    
                $selectQuery = $conexion->prepare('SELECT * FROM alumnado');
                $selectQuery->execute();
    
                $datos = $selectQuery->fetchAll(PDO::FETCH_ASSOC); //capturar datos en array
    
                //recuperar la tabla con los registros de alumnos
                if($datos){
                    echo '<table border="1">';
                    echo '<tr><th>CÓDIGO</th><th>NOMBRE</th><th>CORREO ELECTRÓNICO</th><th>TELÉFONO</th></tr>';
                        
                    foreach($datos as $alumno){
                        echo '<tr>';
                        echo '<td>' . htmlspecialchars($alumno['cod']) . '</td>';
                        echo '<td>' . htmlspecialchars($alumno['nombre']) . '</td>';
                        echo '<td>' . htmlspecialchars($alumno['correo']) . '</td>';
                        echo '<td>' . htmlspecialchars($alumno['telefono']) . '</td>';
                        echo '<tr>';
                    }
                    echo '</table>';
                    echo '<br><button type="submit"><a href="form.php">Volver Atrás</a></button><br>';
                }
            }

        }
    }else{
        //validar caso de campos vacíos
        echo "<p>Es necesario completar todos los campos.</p>";
        echo "<br><button type='submit'><a href='form.php'>Volver atrás</a></button><br>";
    }

    }catch(PDOException $e){
        echo 'Error: ' . $e->getMessage();

    }catch(YaRegistrado $yr){
        echo 'Error: ' . $yr->getMessage();

    }finally{
        $conexion = null;
    }
}else{
    echo 'Se ha denegado el acceso.';
}



?>


</body>
</html>
