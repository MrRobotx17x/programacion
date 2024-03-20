<?php
session_start();
session_destroy();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LARED</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>

<body class="w3-black">
    <form action="verificar.php" method="post">
        <input type="text" name="usuario" required placeholder="usuario"> <br>
        <input type="password" name="contra" required placeholder="contraseña">
        <button type="submit">INGRESAR</button>
    </form>
</body>

</html>