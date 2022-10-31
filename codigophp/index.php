<?php 
require("logintest.php");
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
                $nombre = $_SESSION["nombre"];
                print("<a href='perfil.php'>$nombre</a>");
            ?>
            <a href="logout.php"><i class="fa-sharp fa-solid fa-power-off"></i></a>
        </nav>
    </header>
    <section>
        <article>
            <?php
            //url for meme list
            $url = 'https://api.imgflip.com/get_memes';
            
            //open connection
            $ch = curl_init();
            
            //set the url
            curl_setopt($ch,CURLOPT_URL, $url);
            
            //So that curl_exec returns the contents of the cURL; rather than echoing it
            curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 
            
            //receive url content 
            $result = curl_exec($ch);
            
            //decode content (assoc array)
            $data = json_decode($result, true);
            
            //if success shows images
            if($data["success"]) {
                //iterates over memes array
                foreach($data["data"]["memes"] as $meme) {
                    //show meme image
                    echo "<a href='creameme.php?id=". $meme['id']."&url=".$meme['url']."&cajas=".$meme['box_count']."'><img width='100px' src='" . $meme["url"] ."'>";
                }
            }
            ?>
        </article>
    </section>
</body>
</html>

<?php 
require("conecta.php");
?>