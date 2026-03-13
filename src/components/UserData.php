<?php

    $credentials = ["user" => getenv("CREDENTIALS_USER"), "pwd" => getenv("CREDENTIALS_PWD")];
        $url = getenv("URL_CLIENTES");

        $curl = curl_init($url);

        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($credentials));
        curl_setopt($curl, CURLOPT_HTTPHEADER, ['Content-Type: application/x-www-form-urlencoded']);
        $response = curl_exec($curl);
        $clientes = json_decode($response, true);
        if(empty($clientes)){throw new Exception("Hubo un problema al consultar los clientes", 500);}
?>

<div class="container userData">
    <div class="field">
        <label for="cliente">Cliente: </label>
        <select id="cliente" name="cliente" type="text">
            <option selected disabled>--Seleccione un cliente--</option>
            <?php foreach($clientes as $cliente):?>
                <option value="<?= $cliente['id_cliente'] ?>"><?= $cliente['nombre'] ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="field">
        <label for="fecha">Fecha de entrega:</label>
        <input id="fecha" name="fecha" type="date">
    </div>
    <div class="field">
        <label for="hora">Hora de entrega</label>
        <input id="hora" name="hora" type="time">
    </div>
</div>