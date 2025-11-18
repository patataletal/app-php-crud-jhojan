<?php
session_start();
require 'config/db.php';
include 'includes/header.php';

//var_dump($productos);   

if ($_SERVER["REQUEST_METHOD"] === 'POST') {

    $correo = $_POST["correo"];
    $password = $_POST["password"];
    //var_dump($correo,$password);
    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE usuario = ?");
    $stmt->execute([$correo]);
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
    if($usuario && $password == $usuario['contraseña']){

        $_SESSION ['id_usuario'] = $usuario['id_usuario'] ; 
        $_SESSION ['Nombre'] ='Roy Jhojan' ;
        $_SESSION ['rol'] = $usuario['rol'];

        header('location: index.php');

        echo("Exelente Ingresaste con Exito 😎");
    }else{
        echo "Usuario o Contraseña Incorrecto weee Corrige Credenciales🤦‍♂️";
    }

}

?>

<h1>Login</h1>
<form method="POST">
    <div class="mb-3">
        <label for="correo" class="form-label">Correo</label>
        <input type="email" class="form-control" id="correo" name="correo">
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Contraseña</label>
        <input type="password" class="form-control" id="password" name="password">
    </div>

    <button type="submit" class="btn btn-outline-dark">Ingresar</button>
</form>


<?php
include 'includes/footer.php'
?>