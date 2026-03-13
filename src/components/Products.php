<?php 
    $credentials = ["user" => getenv("CREDENTIALS_USER"), "pwd" => getenv("CREDENTIALS_PWD")];
    $url = getenv("URL_PRODUCTOS");

    $curl = curl_init($url);

    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($credentials));
    curl_setopt($curl, CURLOPT_HTTPHEADER, ['Content-Type: application/x-www-form-urlencoded']);
    $response = curl_exec($curl);
    $productos = json_decode($response, true);
    if(empty($productos)){throw new Exception("Hubo un problema al consultar los clientes", 500);}
?>
<div class="seccionProductos">
    <h3>Productos</h3>
    <div class="products">
        <?php 
        foreach($productos as $producto){
            include __DIR__ . "/SmallModules/ProductCard.php";
            }
            ?>
    </div>
</div>