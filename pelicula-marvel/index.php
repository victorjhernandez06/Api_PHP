<?php
const API_URL = 'https://whenisthenextmcufilm.com/api';
#inicializamos una nueva sesion de cURL = CURL handle
$ch = curl_init(API_URL);
//indicamos que queremos recibir el resultado de la peticion  y no mostrarla en pantalla
     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($ch);
$data = json_decode($result, true);
// una alternativa seria utilizar file_get_contents
// $result =file_get_contents(API_URL; // si solo quieres hacer un GET de una API
//Cerramos el proceso
curl_close($ch);
?>
<head>
    <meta charset="UTF-8"/>
    <title> La proxima pelicula de markel</title>
    <meta name="description"
    ="" content="La promima pelicula de marvel"/>
    <meta name="viewport" content="whit=device-width, initial-scale=1.0"/>

    <!-- Centered viewport -->
    <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css"
</head>

<main>

    <section>
        <img src="<?= $data["poster_url"];?>" width="300" alt="poster de <?= $data["title"];?>" style="border-radius: 16px"/>
    </section>

    <hgroup>
        <h3><?= $data["title"];?> se estrena en <?=$data["days_until"];?> dias</h3>
        <p class="estreno">Fecha de estreno: <?= $data["release_date"];?></p>
        <p>La siguiente pelicula es: <?= $data["following_production"]["title"];?></p>


        <!--<pre style="font-size: 12px; height: 500px; overflow: scroll"><?php var_dump($data);?></pre>-->
    </hgroup>
</main>


<style>
    :root {
        background-color: #4b0e0e;
    }

    body {
        display: grid;
        place-content: center;
    }
section {
    display: flex;
    justify-content: center;
    text-align: center;
}
.estreno{color:yellow;}
hgroup{
    display: flex;
    flex-direction: column;
    justify-content: center;
    text-align: center;
}
</style>
