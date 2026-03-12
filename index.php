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
    <title>Venta de productos Infofast</title>
</head>
<body>
    <?php 
    
    ?>
</body>
</html>