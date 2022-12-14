<?php 
    if(isset($_POST['nombre'])){
        require("conecta.php");

        $nombre = $_POST["nombre"];
        $clave = $_POST["clave"];

        $sql = "SELECT * FROM usuario WHERE nombre = :nombre AND clave = :clave";
        
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":nombre",$nombre);
        $stmt->bindParam(":clave",$clave);
        $stmt->execute();

        $datos = $stmt->fetch();
        
        if($datos){
            session_start();
            $_SESSION["nombre"] = $datos["nombre"];
            $_SESSION["id"] = $datos["id"];
            header("Location: index.php");
            exit(0);
        }
        header("Location: login.php");
        exit(0);
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
        <nav>
            <a href="registro.php" id="reg-button">Registro</a>
        </nav>
    </header>
    <form action="" method="post" enctype="multipart/form-data">
            <label for="nombre">Usuario: </label>
            <input type="text" name="nombre" required>
            <label for="clave">Contraseña: </label>
            <input type="password" name="clave" required>
            <input type="submit" value="Login">
    </form>
</body>
</html>