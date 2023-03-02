<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/all.min.css">
    <link rel="stylesheet" type="text/css" href="css/mistyle.css">
   <link rel="shortcut icon" href="assets/img/UNJBG.png">
    <title>Caso Práctico - Apuestas deportivas</title>
</head>
<?php 
session_start();
if (!empty($_SESSION['us_tipo'])) {
	header('Location: controller/LoginController.php');
} else {
	session_destroy();
?>
<body>
	<img  class="wave" src="assets/img/wave.png" alt="">
    <div class="contenedor">
        <div class="img">
            <img src="assets/img/fontoapuestas.png" alt="">
        </div>
        <div class="contenido-login">
            <form action="controller/LoginController.php" method="post">
                <img src="assets/img/sales_promoters.jpg" alt="">
                <h2>Caso Práctico</h2>
                <div class="input-div dni">
                    <div class="i"><i class="fas fa-user"></i></div>
                    <div class="div">
                        <h5>Usuario</h5>
                        <input type="text" name="user" class="input">
                    </div>
                </div>
                <div class="input-div pass">
                    <div class="i"><i class="fas fa-lock"></i></div>
                    <div class="div">
                        <h5>Contraseña</h5>
                        <input type="password" name="pass" class="input">
                    </div>
                </div>
                <input type="submit" class="btn" value="Iniciar Sesión">
            </form>
        </div>
    </div>
</body>
<script src="js/login.js"></script>
</html>
<?php
}
?>