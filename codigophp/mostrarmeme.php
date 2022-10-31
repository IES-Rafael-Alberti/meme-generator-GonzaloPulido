<?php
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
if($data["success"]) {
    echo "<img src='" . $data["data"]["url"] . "'>";
}