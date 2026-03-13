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
    <div class="container">
        <form action="" class="form" id="pruebaTecnica">
            <?php 
                try{
                    include_once __DIR__ . "/src/components/UserData.php"; 
                    
            ?>
            <div class="seccionProductosResumen">
                
                <?php include_once __DIR__ . "/src/components/Products.php"; ?>
                
                <?php include_once __DIR__ . "/src/components/Cart.php"; ?>
                
            </div>
            <?php
                }catch(Exception $e){
                    echo '
                        <script>
                            alert("'.$e -> getMessage().' | '.$e -> getCode() .'");
                        </script>
                    ';
                }
            ?>

        </form>
    </div>
    <div class="separador"></div>
    <div class="container">
        <h2 id="Examenes">Imágenes de Exámenes</h2>
        <div class="examenes">
            <img src="./src/img/exam1.jpg" alt="ImgDeExamenes" class="examImg">
            <img src="./src/img/exam2.jpg" alt="ImgDeExamenes" class="examImg">
            <img src="./src/img/exam3.jpg" alt="ImgDeExamenes" class="examImg">
            <img src="./src/img/exam4.jpg" alt="ImgDeExamenes" class="examImg">
        </div>
        <h2>Imágenes de la Base de datos</h2>
        <div class="examenes">
            <img src="./src/img/BD1.png" alt="ImgDeBD" class="examImg">
            <img src="./src/img/BD2.png" alt="ImgDeBD" class="examImg">
        </div>
    </div>
    <div id="imgModal" class="modal">
        <span class="close">&times;</span>
        <img class="modalContent" id="modalImg">
    </div>

    <div class="separador"></div>

    <div class="FizzBuzz container">
        <h2 id="fizzBuzz">FizzBuzz</h2>
        <p>El codigo se encuentra directo en esta sección (en js con el inspector) y el resultado en la consola. :D</p>
        <script>
            for(let i = 1; i<=100 ; i++){
                if(i%3 == 0 && i%5 == 0){
                    console.log("FizzBuzz");
                }else if(i%5 ==0){
                    console.log("Buzz");
                }else if(i%3 == 0){
                    console.log("Fizz");
                }else{
                    console.log(i);
                }
            }
        </script>
    </div>
    <div class="separador"></div>
    <footer>
        <a target="_blank" href="https://github.com/OswaldoGalicia/infofastPrueba">
            <svg
                xmlns="http://www.w3.org/2000/svg"
                width="20"
                height="20"
                viewBox="0 0 24 24"
                fill="none"
                stroke="#000"
                stroke-width="1"
                stroke-linecap="round"
                stroke-linejoin="round"
                >
                <path d="M9 19c-4.3 1.4 -4.3 -2.5 -6 -3m12 5v-3.5c0 -1 .1 -1.4 -.5 -2c2.8 -.3 5.5 -1.4 5.5 -6a4.6 4.6 0 0 0 -1.3 -3.2a4.2 4.2 0 0 0 -.1 -3.2s-1.1 -.3 -3.5 1.3a12.3 12.3 0 0 0 -6.2 0c-2.4 -1.6 -3.5 -1.3 -3.5 -1.3a4.2 4.2 0 0 0 -.1 3.2a4.6 4.6 0 0 0 -1.3 3.2c0 4.6 2.7 5.7 5.5 6c-.6 .6 -.6 1.2 -.5 2v3.5" />
            </svg>
        Github de la prueba!
    </a>
    </footer>
    <script src="/src/js/app.js"></script>
    <script src="/src/js/examenes.js"></script>
</body>
</html>