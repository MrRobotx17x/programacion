<?php
session_start();
if ($_SESSION['pass'] != "1x01") {
    header("Location:../");
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REDSOCIAL</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>

<body>
    <div class="w3-top">
        <div class="w3-bar w3-blue">
            <a href="" class="w3-bar-item"><?php echo $_SESSION['usuario'] ?></a>
            <a href="principal.php" class="w3-bar-item w3-button">Home</a>
            <a href="salir.php" class="w3-bar-item w3-button w3-right">Salir</a>
        </div>
    </div><br> <br>
    <div class="w3-center">
        <button onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-black w3-round w3-border">Open Animated Modal</button>
    </div>
    <div id="id01" class="w3-modal">
        <div class="w3-modal-content w3-animate-zoom w3-card-6">
            <header class="w3-container w3-teal">
                <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                <h2>Modal Header</h2>
            </header>
            <div class="w3-container">
                <form action="comentar.php" method="post" enctype="multipart/form-data">
                    <textarea name="comentario" id="comentario" cols="90" rows="10" placeholder="Qué estás pensando?..."></textarea>
                    <input type="file" name="archivo" id="archivo">
                    <button type="submit" class="w3-btn w3-blue ">Publicar</button>
                </form>
            </div>
            <footer class="w3-container w3-teal">
                <p>Publica algo</p>
            </footer>
        </div>
    </div>

    <?php
    //conexion a base de datos
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $database = "redsocial";

    $conn = mysqli_connect($servername, $username, $password, $database);
    if (!$conn) {
        die("Conexion fallida: " . mysqli_connect_error());
    }
    date_default_timezone_set("America/Mexico_City");
    //fin conexion
    $consulta = mysqli_query($conn, "SELECT * FROM comentarios");
    while ($res = mysqli_fetch_array($consulta)) {
        $us = $res['usuario'];
        $user = mysqli_query($conn,"SELECT avatar FROM usuarios WHERE usuario = '$us' ");
        $avatar = mysqli_fetch_array($user);
    ?>
        <div class="w3-card-4">
            <header class="w3-container w3-light-grey">
                <h3> <?php echo $res['usuario']; ?>  </h3>
            </header>
            <div class="w3-container">
                <p>1 new friend request</p>
                <hr>
                <img width="100px" src="avatar/<?php echo $avatar['avatar']; ?>" alt="Avatar" class="w3-left w3-circle">
                <p><?php echo $res['comentario']; ?></p>
            </div>
            <button class="w3-button w3-block w3-dark-grey">+ Connect</button>
            <button class="w3-button w3-block w3-dark-grey">+ Connect</button>
        </div>
    <?php
    }
    ?>
</body>

</html>