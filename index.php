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

        

    ?>
</body>
</html>