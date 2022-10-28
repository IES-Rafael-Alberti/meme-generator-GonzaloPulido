<?php
if(isset($_POST['nombre'])) {
    require("conecta.php");
    
    // recupera los datos del formulario
    $nombre = $_POST["nombre"];
    $clave = $_POST["clave"];
    //$foto = $_FILES["foto"]["name"];

    // copia el archivo temporal en fotos con su nombre original
    //file_put_contents("fotos/$foto", file_get_contents($_FILES["foto"]["tmp_name"]));

    // inyectable
    //$sql = "INSERT INTO usuario (nombre, edad, foto) values ('$nombre', $edad, '$foto')";
    
    // prepara la sentencia SQL. Le doy un nombre a cada dato del formulario 
    $sql = "INSERT INTO usuario (nombre, clave) values (:nombre, :clave)";
    // asocia valores a esos nombres
    $datos = array("nombre" => $nombre,
                   "clave" => $clave
                  );
    // comprueba que la sentencia SQL preparada está bien 
    $stmt = $conn->prepare($sql);
    // ejecuta la sentencia usando los valores
    if($stmt->execute($datos) != 1) {
        print("No se pudo dar de alta");
        exit(0);
    }
    //print_r($_POST);
    //print_r($_FILES);
    //file_put_contents("fotos/perroooo", file_get_contents($_FILES["foto"]["tmp_name"]));
    
    // muestra la foto usando HTML
    header("Location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/styles.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <title>Meme Generator</title>
</head>
<body>
    <header> 
    <a href="index.php"><img alt="Cambiar imagen al pasar el raton" onmouseout="this.src='img/xerez.png';" onmouseover="this.src='img/cadi.png';" src="img/xerez.png" id="logo"/></a>
        <h1 id="title">MEME GENERATOR</h1>
        <p>Pagina de registro</p>
    </header>
    <form action="" method="post" enctype="multipart/form-data">
            <label for="nombre">Usuario: </label>
            <input type="text" name="nombre" required>
            <label for="clave">Contraseña: </label>
            <input type="password" name="clave" required>
            <input type="submit" value="Registrarse">
    </form>
</body>
</html>