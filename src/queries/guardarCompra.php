<?php
    include_once __DIR__ . "/../../config/Connection.php";

    try{
        if($_SERVER['REQUEST_METHOD'] !== 'POST'){throw new Exception("No se acepta este tipo de peticion", 400);}
        $conn = (new Connection()) -> connect();
        $json = file_get_contents('php://input');
        $data = json_decode($json, true);
        if(
            empty($data['cliente']) || 
            empty($data['fecha']) || 
            empty($data['hora']) || 
            empty($data['productos']) || 
            empty($data['costo'])
        ){throw new Exception("Todos los campos son obligatorios.", 400);}

        $cliente = $data['cliente'];
        $fecha = $data['fecha'];
        $hora= $data['hora'];
        $productos= json_encode($data['productos']);
        $costo = $data['costo'];

        $sql = "INSERT INTO ventas (cliente, fechaEntrega, horaEntrega, carrito, costo) VALUES (:cliente, :fecha, :hora, :productos, :costo)";
        $stmt = $conn -> prepare($sql);
        $stmt -> execute([
            'cliente' => $cliente,
            "fecha" => $fecha,
            "hora" => $hora,
            "productos" => $productos,
            "costo" => $costo
        ]);

        if(!$stmt){throw new Exception("No fue posible hacer la compra", 500);}

        header('Content-Type: application/json');
        echo json_encode([
            "success" => true,
            "code" => 200,
            "message" => "OK"
        ]);
        exit;

    }catch(Exception $e){
        header('Content-Type: application/json');
        http_response_code(500);

        echo json_encode([
            "success" => false,
            "code" => $e->getCode(),
            "message" => $e->getMessage()
        ]);

        exit;
    }