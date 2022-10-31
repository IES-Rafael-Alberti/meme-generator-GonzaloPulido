<?php
require("logintest.php");

//url for meme creation
$url = 'https://api.imgflip.com/caption_image';
$id = $_GET['id'];
$box = $_GET['box'];
$textos = array();
for($i=1;$i<=$box;$i++){
      array_push($textos, array("text"=> $_POST["texto$i"]));
}
//The data you want to send via POST
$fields = array(
        "template_id" => $id,
        "username" => "fjortegan",
        "password" => "pestillo",
        "boxes" => $textos);


//url-ify the data for the POST
$fields_string = http_build_query($fields);

//open connection
$ch = curl_init();

//set the url, number of POST vars, POST data
curl_setopt($ch,CURLOPT_URL, $url);
curl_setopt($ch,CURLOPT_POST, true);
curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);

//So that curl_exec returns the contents of the cURL; rather than echoing it
curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 

//execute post
$result = curl_exec($ch);

//decode response
$data = json_decode($result, true);

//if success show image

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
            if($data["success"]) {
                echo "<img src='" . $data["data"]["url"] . "'>";

            }
            ?>
            <form action='guardameme.php'  method='post' enctype='multipart/form-data'>
            <input type="hidden" value="<?php echo($data["data"]["url"])?>" id="url" name="url">
            <input type="submit" value="Guardar Meme" id="save"> 
            <form>
        </article>
    </section>
</body>
</html>
