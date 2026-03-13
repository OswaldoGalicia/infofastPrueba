<?php
    include_once __DIR__ . "/env/GetEnv.php";
    
    try{
        GetEnv::getEnv();
    }catch(Exception $e){
        echo '
            <script>
                alert("'.$e -> getMessage().' | '.$e -> getCode() .'");
            </script>
        ';
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&family=Red+Hat+Mono:ital,wght@0,300..700;1,300..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./src/css/styles.css">
    <title>Venta de productos Infofast</title>
</head>
<body>
    <?php 
        include_once __DIR__ . "/src/utils/Nav.php";

        

        //agregar los clientes y productos separados en tarjetas Seccion de imagenes de las pruebas, bd y mensajes de errores o confirmaciones
        
        $credentials = ["user" => getenv("CREDENTIALS_USER"), "pwd" => getenv("CREDENTIALS_PWD")];
        $url = getenv("URL_PRODUCTOS");

        $curl = curl_init($url);

        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($credentials));
        curl_setopt($curl, CURLOPT_HTTPHEADER, ['Content-Type: application/x-www-form-urlencoded']);
        $response = curl_exec($curl);


    ?>
    <form action="">
        <?php 
            try{
                include_once __DIR__ . "/src/components/UserData.php"; 
            }catch(Exception $e){
                echo '
                    <script>
                        alert("'.$e -> getMessage().' | '.$e -> getCode() .'");
                    </script>
                ';
            }
            
        ?>

    </form>
</body>
</html>