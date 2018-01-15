<?php

// require __DIR__ . '/core/init.php';

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css">
        <link rel="stylesheet" href="/assets/css/main.css">
    </head>

    <body>
        <div id="wrapper" class="container-fluid flex">
            <h1 class="main-heading">dream planet earth</h1>
            <h2><a href="purchase">Purchase a Calendar</a></h2>
        </div>

        <!-- Instagram Insert -->
            <div class="iginsert">
                <?php 
                // Append a static string since not using form input
                $username = "dream_planet_earth";
                
                // Get the JSON
                try {
                    $json = file_get_contents("https://www.instagram.com/" .$username. "/?__a=1");
                } catch ( Exception $e ) {
                    // echo 
                    // '<h2>This profile does not exist :(</h2>';
                    // echo $e->getMessage();
                    die();
                }
                
                $json = json_decode($json, true);
                
                // Verify public profile
                if ( $json['user']['is_private'] == true ) {
                    echo 
                    '<h2>This profile is private :(</h2>';
                    die();
                }
                
                // Display pictures
                foreach ( $json['user']['media']['nodes'] as $node) {
                    $url = $node['thumbnail_src'];
                    
                    // Remove unnecessary information from url
                    // $url = str_replace('/s640x640', '', $url);
                    echo '<img src="'. $url .'" class="igimg">';
                }
                // Sample URL
                // https://scontent-syd2-1.cdninstagram.com/t51.2885-15/s640x640/sh0.08/e35/23498198_202436726957413_6414376486542770176_n.jpg 
                
                // Aim URL
                // https://scontent.cdninstagram.com/t51.2885-15/e35/23967411_502012043513677_2057498804633993216_n.jpg
                ?>
            </div>
        
        
        
    </body>
    </html>
    