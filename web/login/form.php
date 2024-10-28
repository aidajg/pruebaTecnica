<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Centro "Blue Lagoon"</title>
    <link rel="stylesheet" href="../css/form.css">
</head>
<body>

<div>
<h2>Registrar a un alumno</h2>
<form action="registro.php" method="post">

    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" id="nombre"><br>

    <label for="correo">Correo electrónico:</label>
    <input type="email" name="correo" id="correo"><br>

    <label for="telefono">Teléfono:</label>
    <input type="number" name="telefono" id="telefono"><br>

    <button type="submit">Registrar</button>

</form>
</div>
</body>
</html>