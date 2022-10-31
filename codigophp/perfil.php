<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Meme Generator</title>
</head>
<body>
    <header> 
        <a href="index.php"><img alt="Cambiar imagen al pasar el raton" onmouseout="this.src='img/xerez.png';" onmouseover="this.src='img/cadi.png';" src="img/xerez.png" id="logo"/></a>
        <h1 id="title">MEME GENERATOR</h1>
        <nav>
            <?php 
            require("logintest.php");
            $nombre = $_SESSION["nombre"];
            print("<a href='perfil.php'>$nombre</a>");
            ?>
            <a href="logout.php"><i class="fa-sharp fa-solid fa-power-off"></i></a>
        </nav>
    </header>
    <section>
        <article>
            <?php
                require("conecta.php");
                $sql = "SELECT * FROM meme WHERE idusuario = :idusuario";

                $stmt = $conn->prepare($sql);
                $stmt->bindParam(":idusuario",$_SESSION["id"]);
                $stmt->execute();
                $memes = $stmt->fetchAll();

                if($memes){
                    foreach($memes as $meme) {
                        $ruta = $meme["ruta"];
                        echo "<img src='$ruta'>";
                    }
                }
            ?>
            
        </article>
    </section>
</body>
</html>