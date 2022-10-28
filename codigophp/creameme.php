<?php 
require("logintest.php");
$id = $_GET["id"];
$url = $_GET["url"];
$cajas = $_GET["cajas"]
?>

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
            print($_SESSION['nombre']);
            ?>
            <a href="logout.php"><i class="fa-sharp fa-solid fa-power-off"></i></a>
        </nav>
    </header>
    <section>
        <article>
        <form action="" method="post" enctype="multipart/form-data">
            <?php
            echo "<img width='250px' src='" . $url . "'>";
            for($i = 1; $i<=$cajas;$i++){
            echo "<br><label for='Name'>Texto $i</label><br>";
            echo "<input type='text' name='nombre' id='nombre'><br>";
            }
            echo "<input type='submit' value='Enviar'>"
            ?>
        </form>
        </article>
    </section>
</body>
</html>

<?php 
require("conecta.php");
?>