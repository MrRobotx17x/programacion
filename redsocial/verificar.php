<?php
//recibir variables del form
$usuario = $_POST['usuario'];
$contra = $_POST['contra'];

//conexion a base de datos
$servername = "localhost";
$username = "root";
$password = "root";
$database = "redsocial";

$conn = mysqli_connect($servername,$username,$password,$database);
if(!$conn){
    die("Conexion fallida: ". mysqli_connect_error());
}

$consulta = mysqli_query($conn,"SELECT * FROM usuarios WHERE usuario = '$usuario'") or die(mysqli_error($conn));
$res = mysqli_fetch_array($consulta);

//dejar pasar al usuario o regresarlo al index
if ($usuario == $res['usuario'] && $contra == $res['contra']) {
    session_start();
    $_SESSION['pass'] = "1x01";
    $_SESSION['usuario'] = $usuario;
    $_SESSION['avatar'] = $res['avatar'];
    header("Location:contenido/principal.php");
} else {
    header("Location:index.php");
}
