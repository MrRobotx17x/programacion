<?php
$comentario = $_POST['comentario'];
$imagen = $_FILES['archivo'];
$destino = "img/" . basename($_FILES['archivo']['name']);


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

$fecha = date("Y-m-d");
$hora = date("H:i:s");
session_start();
$usuario = $_SESSION['usuario'];
$img = basename($_FILES['archivo']['name']);

//subir imagen
if(move_uploaded_file($_FILES['archivo']['tmp_name'],$destino)){
    echo "FILE OK";
}
else{
    echo "ERROR";
}

mysqli_query($conn,"INSERT INTO comentarios VALUES(DEFAULT,'$comentario','$fecha','$hora','$usuario','$img')") or die(mysqli_error($conn));

header("Location:principal.php");