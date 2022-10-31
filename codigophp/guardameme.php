<?php
require("conecta.php");
session_start();
$url = $_POST["url"];
$nombreimg = $_SESSION["nombre"]."_".date("dmyhis").".png";
$ruta = "memes/$nombreimg";
file_put_contents($ruta, file_get_contents($url));

$sql = "INSERT INTO meme ( ruta, idusuario) VALUES (:ruta,:idusuario)";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":ruta",$ruta);
    $stmt->bindParam(":idusuario",$_SESSION["id"]);

    if($stmt->execute()){
        header("Location: perfil.php");
        exit(0);
    }else{
        echo("No se ha podido guardar el meme");
    }
?>